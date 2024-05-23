<?php

namespace App\Http\Controllers\Api;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Staff::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'username' => 'required|string|min:4|max:20,unique:staffs,username',
            'password' => 'required',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email|unique:staffs,email'
        ]);
        $staff = new Staff($request);
        if ($staff->save()) {
            return response()->json([
                'data' => $staff
            ])->setStatusCode(201);
        } else {
            return response()->json([
                'error' => "error can't create"
            ])->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return response()->json(['data'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        if($staff->delete()){
            return response()->json(["data"=>"ok"]);
        }else{
            return response()->json(["data"=>"ok"]);
        }
    }
}
