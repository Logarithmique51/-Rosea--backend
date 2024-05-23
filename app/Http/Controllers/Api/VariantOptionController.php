<?php

namespace App\Http\Controllers\Api;

use App\Models\Variant;
use App\Models\VariantOption;
use Illuminate\Http\Request;

class VariantOptionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VariantOption::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_variant' => 'required|exists:variants,id',
            'value' => 'required|max:20|string',
            'price' => 'required|nullable|integer|gt:0'
        ]);

        $variant = Variant::findOr($validated['id_variant']);

        unset($validated['id_variant']);
        $variant_options = new VariantOption($validated);
        $variant->options()->save($variant_options);
    }

    /**
     * Display the specified resource.
     */
    public function show(VariantOption $variantOption)
    {

        return response()->json(['data'=>$variantOption]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VariantOption $variantOption)
    {

        $validated = $request->validate([
            'id_variant' => 'required|exists:variants,id',
            'value' => 'required|max:20|string',
            'price' => 'required|nullable|integer|gt:0'
        ]);


        $isSuccess = $variantOption->update($validated);
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $variantOption
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to update the variant option.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariantOption $variantOption)
    {
        $variantOption->deleteOrFail();
    }
}
