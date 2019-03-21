<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customers $customers)
    {
        return view ('customers.index', ['customers' => $customers->paginate(10)]);
    }

    public function indexApi(Request $request)
    {

        $query = $request->q;
        $customer = Customers::where('customer_name', 'LIKE', '%'.$query.'%')->get();
        return $customer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'customer_email' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
        ]);

        Customers::create($request->all());

        if($request->type = "sales"){
            return redirect()->route('sales.create');
        }
        
        return redirect()->route('customers.index')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        // $customer->delete();
        // return redirect()->route('customers.index')->with('success', 'Customer has been deleted');
    }
}
