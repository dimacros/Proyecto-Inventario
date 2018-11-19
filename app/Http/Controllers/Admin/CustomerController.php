<?php

namespace Inventario\Http\Controllers\Admin;

use Inventario\Customer;
use Inventario\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers', ['customers' => Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers-create');
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
            'document' => 'required|in:dni,ruc',
            'document_number' => 'required|numeric',
            'full_name' => 'required|max:255',
            'phone' => 'nullable|max:12'
        ]);

        $customer = new Customer();
        $customer->document = $request->document;
        $customer->document_number = $request->document_number;
        $customer->full_name = $request->full_name;
        $customer->phone = $request->phone;
        $customer->save();
        return back()->with('status', 'El cliente "' . $product->full_name . '" fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
