<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sales $sales)
    {
        return view('sales.index', ['sales' => $sales->paginate(10)]);
    }

    public function test(Request $request){
        // dd($request);
        // dd($request->dataArray);
        $data = $request->dataArray;
        $dataCount = count($request->dataArray);
        $count=0;
        foreach($data as $d){
            $data[$count++] = $d;
            // array_push($data,$d);
        }
        // return $dataCount;
        // for ($i=0; $i < $dataCount ; $i++) { 
        //     $data = array($i => $request->dataArray[$i]);
        // }
        // dd($request->dataArray);
        // $data = serialize($data);
        // $udata = unserialize($data);
        // $udata = $request->dataArray;
        // dd($data);
        foreach($data as $k => $v){
            echo $k . $v;
        }
        // return $data[1];
        
    }

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
        $count = 0;
        $sale_array = [];
        $name_array = $request->nameArray;
        $quantity_array = $request->quantityArray;
        // dd($quantity_array);
        // foreach($name_array as $a){
        //    array_push($sale_array,$a,$quantity_array[$count++]);
        // }

        foreach($name_array as $a => $b){
            $sale_array[$b] = $quantity_array[$a]; 
        }

        dd($sale_array);
        // $request->validate([
        //     'sold_to' => 'required|string|max:255',
        //     'payment_method' => 'required|string|max:255',
        //     'quantity' => 'required|numeric|between:0,9999.99',
        //     'description' => 'required|string',
        //     'unit_price' => 'required|numeric|between:0,9999.99',
        //     'discount' => 'required|numeric|between:0,9999.99',
        //     'sold_by' => 'required|string|max:255',
        //     'total' =>  'required|numeric',
        // ]);


        // $date = date('Y:m:d');

        // $request->merge(['date' => $date]);

        // Sales::create($request->all());

        // return redirect()->route('sales.index')->with('success', "Invoice added successfully");
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
            'sold_to' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'quantity' => 'required|numeric|between:0,9999.99',
            'description' => 'required|string',
            'unit_price' => 'required|numeric|between:0,9999.99',
            'discount' => 'required|numeric|between:0,9999.99',
            'sold_by' => 'required|string|max:255',
            'total' =>  'required|numeric',

        ]);

        $date = date('Y:m:d');

        $request->merge(['date' => $date]);

        $sale::update($request->all());

        return redirect()->route('sales.index')->with('success', "Invoice updated successfully");
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
