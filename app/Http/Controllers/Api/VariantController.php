<?php

namespace App\Http\Controllers\Api;

use App\Models\Products\Variant;
use Illuminate\Http\Request;

class VariantController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Variant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20|min:2',
        ]);

        $variant = new Variant($validated);
        $isSuccess = $variant->save();
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'variant' => $variant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to save the variant.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant)
    {
        return response()->json([
            'data' => $variant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variant $variant)
    {

        $validated = $request->validate([
            'name' => 'required|max:20|min:2',
        ]);


        $isSuccess = $variant->update($validated);
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'variant' => $variant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to update the variant.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant)
    {
        $variant->deleteOrFail();
    }
}
