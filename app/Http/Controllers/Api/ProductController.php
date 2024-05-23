<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category=$request->input('category');

        if($category){
            $products = Product::whereHas('category',function($q) use($category){
                $q->where('name', $category);
            })->get(['id','name','price','available','image']);
        }else{
            $products = Product::all(['id','name','price','available','image']);
        }

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:100|min:4',
            'price' => 'required|integer',
            'available' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image'
        ]);



        $product = new Product($validated);
        $isSuccess = $product->save();
        if ($isSuccess) {
            return response()->json([
                'data' => $product
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to save the product.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|min:4',
            'price' => 'required|integer',
            'available' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image'
        ]);

        $isSuccess = $product->update($validated);
        if ($isSuccess) {
            return response()->json([
                'data' => $product
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to update the product.'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();

    }
}
