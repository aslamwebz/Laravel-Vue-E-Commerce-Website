<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(Supplier $suppliers)
    {
        return view ('suppliers.index', ['suppliers' => $suppliers->paginate(10)]);
    }

    public function indexApi(Request $request)
    {
        $query = $request->q;
        $suppliers = Supplier::where('supplier_name', 'LIKE', '%'.$query.'%')->get();
        return $suppliers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'supplier_email' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());

        if($request->type = "supplier"){
            return redirect()->route('suppliers.create');
        }
        
        return redirect()->route('suppliers.index')->with('success', 'Supplier has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_email' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // $supplier->delete();
        // return redirect()->route('suppliers.index')->with('success', 'Supplier has been deleted');
    }
}
