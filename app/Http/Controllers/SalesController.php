<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Product;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sales $sales)
    {
        return view('sales.index',compact('product'), ['sales' => $sales->paginate(10)]);
    }

    // public function test(Request $request){
    //     // dd($request);
    //     // dd($request->dataArray);
    //     $data = $request->dataArray;
    //     $dataCount = count($request->dataArray);
    //     $count=0;
    //     foreach($data as $d){
    //         $data[$count++] = $d;
    //         // array_push($data,$d);
    //     }
    //     // return $dataCount;
    //     // for ($i=0; $i < $dataCount ; $i++) { 
    //     //     $data = array($i => $request->dataArray[$i]);
    //     // }
    //     // dd($request->dataArray);
    //     // $data = serialize($data);
    //     // $udata = unserialize($data);
    //     // $udata = $request->dataArray;
    //     // dd($data);
    //     foreach($data as $k => $v){
    //         echo $k . $v;
    //     }
    //     // return $data[1];
        // $items = json_encode($products);

        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'grand_total' => 'required',
            'sold_by' => 'required|string|max:255',
        ]);
      

        $name_array = $request->nameArray;
        $quantity_array = $request->quantityArray;
        $cost_array = $request->costArray;
        $price_array = $request->priceArray;
    

        foreach($name_array as $a => $b){
            $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
            $products[$a]['id'] = $product[0]['pid'];
            $products[$a]['product_name'] = $product[0]['product_name'];
            $products[$a]['quantity'] = $quantity_array[$a];
            $products[$a]['price'] = $price_array[$a];
            $products[$a]['cost'] = $cost_array[$a];
            // $sale_array[$b] = $quantity_array[$a]; 
        }

        $date = date('Y:m:d');
        $items = serialize($products);
        // $items = json_encode($products);
        $request->merge(['sale_date' => $date]);
        $request->merge(['items' => $items]);

        if(Sales::create($request->all())){
            foreach($name_array as $a => $b){
                $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
                $product[0]['product_quantity'] -= $quantity_array[$a];
                $product[0]->save(['timestamps' => false]);
            }
            return redirect()->route('sales.index')->with('success', "Invoice added successfully");
        } else {
            return redirect()->route('sales.create')->with('error', "Invoice error");
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sale)
    {

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'grand_total' => 'required',
            'sold_by' => 'required|string|max:255',
        ]);


        // Get all respected array info from request to new array
        $name_array = $request->nameArray;
        $quantity_array = $request->quantityArray;
        $cost_array = $request->costArray;
        $price_array = $request->priceArray;

        // assign values from the respected input arrays and create an array for serialization
        foreach($name_array as $a => $b){
            $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
            $products[$a]['id'] = $product[0]['pid'];
            $products[$a]['product_name'] = $product[0]['product_name'];
            $products[$a]['quantity'] = $quantity_array[$a];
            $products[$a]['price'] = $price_array[$a];
            $products[$a]['cost'] = $cost_array[$a];
        }

        $date = date('Y:m:d');
        // Serialize and merge the data to store in database
        $items = serialize($products);
        $request->merge(['sale_date' => $date]);
        $request->merge(['items' => $items]);


        
        $saleProducts = unserialize($sale->items);
        // Add older quantities again to product quantity table to prevent mis calculated quantity reductions
        foreach ($saleProducts as $key => $value) {
            $product = Product::where('product_name', 'LIKE', '%'. $saleProducts[$key]['product_name'].'%')->get();
            $product[0]['product_quantity'] += $saleProducts[$key]['quantity'];
            $product[0]->save(['timestamps' => false]);
        }


        if($sale->update($request->all())){
            // If sale does not pose any error reduce products form products table
            foreach($name_array as $a => $b){
                $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
                $product[0]['product_quantity'] -= $quantity_array[$a];
                $product[0]->save(['timestamps' => false]);
            }
            return redirect()->route('sales.index')->with('success', "Invoice updated successfully");
        } else {
            return redirect()->route('sales.index')->with('error', "Invoice update failed");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sale)
    {
        $sale->destroy();

        return redirect()->route('sales.index')->with('success', "Invoice deleted successfully");
    }
}
