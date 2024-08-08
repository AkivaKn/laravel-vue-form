<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = User::create($validatedUser);
        $token = $user->createToken($request->name);
        return ['user' => $user, 'token' => $token->plainTextToken];
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return ['errors' => ['email' => ['No such user.']]];

        } elseif (!Hash::check($request->password, $user->password)) {
            return ['errors' => ['password' => ['Password is incorrect.']]];
        }

        $token = $user->createToken($user->name);
        return ['user' => $user, 'token' => $token->plainTextToken];
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['message' => 'Logout successful.'];

    }
}
