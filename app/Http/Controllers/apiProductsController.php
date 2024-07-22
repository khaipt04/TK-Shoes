<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiProductModel as Product;

class apiProductsController extends Controller
{
    
    public function index()
    {
        return Product::all();
    }

    public function products_lasted()
    {
        return Product::orderBy('id', 'desc')->limit(10)->get();
    }

    public function products_bestseller()
    {
        return Product::orderBy('sold', 'desc')->limit(10)->get();
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
