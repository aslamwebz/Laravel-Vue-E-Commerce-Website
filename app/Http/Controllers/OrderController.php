<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $orders)
    {
        return view ('orders.index', ['orders' => $orders->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
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
            'order_to' => 'required|string|max:255',
            'order_detail' => 'required|string|max:255',
            'order_date' => 'required|string|max:255',
            'due_date' => 'required|string|max:255',
            'order_status' => 'required|string|max:255',
        ]);

        Order::save($request->all());

        return redirect()->route('orders.index')->with('success', 'Order has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_to' => 'required|string|max:255',
            'order_detail' => 'required|string|max:255',
            'order_date' => 'required|string|max:255',
            'due_date' => 'required|string|max:255',
            'order_status' => 'required|string|max:255',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // $customer->delete();
        // return redirect()->route('orders.index')->with('success', 'Order has been deleted');
    }
}
