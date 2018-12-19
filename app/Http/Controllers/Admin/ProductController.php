<?php

namespace Inventario\Http\Controllers\Admin;

use Inventario\{Product, Category};
use Inventario\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products', [
            'products' => Product::with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products-create', [
            'categories' =>  Category::all(['id', 'name AS category_name'])
        ]);
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
            'product_name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'product_price' => 'required|numeric|min:0'
        ]);

        $product = Product::create([
            'name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->product_price
        ]);

        return back()->with('message', 'El producto "' . $product->name . '" fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Inventario\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Inventario\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Inventario\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_price' => 'required|numeric|min:0'
        ]);

        Product::find($id)->update([
            'name' => $request->product_name,
            'price' => $request->product_price
        ]);

        return back()->with('message', 'El producto ha sido modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Inventario\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return back()->with('message', 'El producto ha sido eliminado con éxito');
    }
}
