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
            'document' => 'required|in:DNI,RUC',
            'document_number' => 'required|numeric',
            'name' => 'required|max:255',
            'phone' => 'nullable|max:12'
        ]);

        $customer = Customer::create($request->all());

        return back()->with('message', 'El cliente "' . $customer->name . '" fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
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
    public function update(Request $request, int $id)
    {
        $request->validate([
            'document' => 'required|in:DNI,RUC',
            'document_number' => 'required|max:11',
            'name' => 'required|max:255',
            'phone' => 'nullable|max:15'
        ]);
        
        $customer = Customer::find($id)->update($request->all());

        return back()->with('message', 'El cliente ha sido modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Inventario\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Customer::find($id)->delete();

        return back()->with('message', 'El cliente ha sido eliminado con éxito');
    }
}
