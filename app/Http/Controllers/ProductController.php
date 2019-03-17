<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // return Hash::make('admin');
        
        $products = Product::all();
        return view('products.index', ['products' => $product->paginate(10)]);
        // return view('products.index', ['products' => $products]);
        // return view('products.index', compact('products'));
    }

    public function indexApi(Request $request)
    {

        $query = $request->q;
        // $query =  $request;

        // $product = Product::where('product_name', 'LIKE', '%'.$query.'%')->get()->pluck('product_name');
        $product = Product::where('product_name', 'LIKE', '%'.$query.'%')->get();

        // return \Response::json($product);

        return $product;
        // return $request;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'product_name'  => 'required|string|max:255',
            'product_cost' =>  'required|numeric|between:0,9999.99',
            'product_price' => 'required|numeric|between:0,9999.99',
            'product_quantity' => 'required|numeric|between:0,9999',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('product\images'), $imageName);

        $product = new Product();
        
        $product->product_name = $request->product_name;
        $product->product_cost = $request->product_cost;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->product_image = $imageName;

        $product->save();

        return redirect()->route('product.index')->with('success', 'New product added successfullly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'  => 'required|string|max:255',
            'product_cost' => 'required|numeric|between:0,9999.99',
            'product_price' => 'required|numeric|between:0,9999.99',
            'product_quantity' => 'required|integer',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product->product_name = $request->product_name;
        $product->product_cost = $request->product_cost;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->product_image = $imageName;

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
