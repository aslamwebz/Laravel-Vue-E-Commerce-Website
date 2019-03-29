<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Purchase $purchases)
    {
        return view('purchases.index', ['purchases' => $purchases->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create');
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
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'grand_total' => 'required',
            'purchased_by' => 'required|string|max:255',
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
        }

        $date = date('Y:m:d');
        $purchases = serialize($products);
        $request->merge(['purchase_date' => $date]);
        $request->merge(['purchases' => $purchases]);

        if(Purchase::create($request->all())){
            foreach($name_array as $a => $b){
                $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
                $product[0]['product_quantity'] += $quantity_array[$a];
                $product[0]->save(['timestamps' => false]);
            }
            return redirect()->route('purchases.index')->with('success', "Purchase added successfully");
        } else {
            return redirect()->route('purchases.create')->with('error', "Purchase error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    { 
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'grand_total' => 'required',
            'purchased_by' => 'required|string|max:255',
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
        $purchases = serialize($products);
        $request->merge(['purchase_date' => $date]);
        $request->merge(['purchases' => $purchases]);


        
        $purchaseProducts = unserialize($purchase->purchases);
        // Remove older quantities again to Purchase quantity table to prevent mis calculated quantity reductions
        foreach ($purchaseProducts as $key => $value) {
            $product = Product::where('product_name', 'LIKE', '%'. $purchaseProducts[$key]['product_name'].'%')->get();
            $product[0]['product_quantity'] -= $purchaseProducts[$key]['quantity'];
            $product[0]->save(['timestamps' => false]);
        }

        if($purchase->update($request->all())){
            // If purchase does not pose any error add products to products table
            foreach($name_array as $a => $b){
                $product = Product::where('product_name', 'LIKE', '%'.$b.'%')->get();
                $product[0]['product_quantity'] += $quantity_array[$a];
                $product[0]->save(['timestamps' => false]);
            }
            return redirect()->route('purchases.index')->with('success', "Purchase updated successfully");
        } else {
            return redirect()->route('purchases.index')->with('error', "Purchase update failed");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        // $purchase->destroy();

        // return redirect()->route('purchases.index')->with('success', "Purchase deleted successfully");
    }
}
