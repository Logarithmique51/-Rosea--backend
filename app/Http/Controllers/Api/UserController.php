<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name'=>'required|string|min:3|max:20',
            'last_name'=>'required|string|min:3|max:30',
            'birthdate'=>'required|date_format:d/m/Y',
            'gender'=>'required|boolean',
            'phone'=>'required|integer|digits:9|unique:users,phone',
            'email'=>'required|email|unique:users,email',
            'password'=> ['required','string',Password::min(8)->numbers()->mixedCase()->symbols(),'confirmed']
        ]);

        $user = new User($validated);
        $isSuccess = $user->save();
        if ($isSuccess) {



            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to save the user.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(['data'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
    }
}
