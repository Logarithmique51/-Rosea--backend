<?php

namespace App\Http\Controllers\Api;

use App\Models\Products\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20|min:2'
        ]);

        $category = new Category($validated);
        $isSuccess = $category->save();
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to save the category.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $validated = $request->validate([
            'name' => 'required|max:20|min:2'
        ]);


        $isSuccess = $category->update($validated);
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to update the category.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();
    }
}
