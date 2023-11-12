<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAll();
        return view("products", compact('products'));
    }


    public function create()
    {
        return view('create');
    }
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product= new Product;     
        $product->create($request);      
        return redirect('/product/');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post){
      $Db = Product::findOrFail($post);
      $Db->delete();
      return redirect('/product/');
    }
}
