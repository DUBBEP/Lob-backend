<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'     => ['required'], // You must include the name!
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('unity_session')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function destroy(Request $request)
    {
        $token = $request->user()->currentAccessToken();
        
        if (method_exists($token, 'delete')) {
                $token->delete();
        }
        
        return response()->json(['message' => 'Logged out successfully']);
    }   
}