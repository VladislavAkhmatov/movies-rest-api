<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'error' => 'User not found'
            ], 404);
        };

        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'token' => $user->createToken('api-token')->plainTextToken,
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    public function register(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ], 201);
    }

}
