<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }

    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'contact_number' => 'required',
        'province' => 'required',
        'municipality' => 'required',
        'postal_code' => 'required',
    ]);

    // Hash the password
    $validatedData['password'] = bcrypt($request->password);

    // Create the user
    $user = User::create($validatedData);

    // Generate a token
    $token = $user->createToken('AuthToken')->plainTextToken;

    // Return the token
    return response()->json(['token' => $token], 201);
}
}
