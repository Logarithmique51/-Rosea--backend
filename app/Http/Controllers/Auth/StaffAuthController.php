<?php

namespace App\Http\Controllers\Auth;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StaffAuthController
{
    /**
     * Create a new staff member.
     *
     * This method validates the incoming request to ensure that the required
     * fields (username, password, and email) are present and meet the specified
     * criteria. After validation, it creates a new staff member and saves it to
     * the database.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming request containing
     *                                             the staff member's details.
     * @return JsonResponse Return 201 & created staff if success and 405
     */
    public function create(Request $request)
    {
        $request = $request->validate([
            'username' => 'required|string|unique:staffs,username',
            'password' => 'required',
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
     * Log a staff member via username/password
     *
     * @param Request $request
     * @return JsonResponse Return token if success
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('staff')->attempt($credentials)) {
            $staff = Staff::where('username', $request->username)->first();
            $token = $staff->createToken('tk');
            return response()
            ->json([
                'token' => $token->plainTextToken
            ]);
        } else {
            return response()
            ->json([
                'error' => [
                    'message' => "Nom d'utilisateur/Mot de passe incorrect"
                ]
            ])->setStatusCode(401);
        }
    }

    public function index(Request $request)
    {
        return Staff::first();
    }
}
