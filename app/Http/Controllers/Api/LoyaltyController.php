<?php

namespace App\Http\Controllers\Api;

use App\Models\Loyalty;
use Illuminate\Http\Request;

class LoyaltyController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data"=>Loyalty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'balance'=>'required|integer|gte:0',
            'user_id' => 'required|exists:users,id'
        ]);

        $loyalty = new Loyalty($request);
        $isSuccess = $loyalty->save();
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $loyalty
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to save the loyalty.'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Loyalty $loyalty)
    {
        return response()->json(['data'=>$loyalty]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loyalty $loyalty)
    {
        $request = $request->validate([
            'balance'=>'required|integer|gte:0',
            'user_id' => 'required|exists:users,id'
        ]);

        $loyalty = new Loyalty($request);
        $isSuccess = $loyalty->save();
        if ($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $loyalty
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to save the loyalty.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loyalty $loyalty)
    {
        //
    }
}
