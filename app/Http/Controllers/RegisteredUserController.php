<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'unique:users,name' checks if the username exists
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            // Password::min(6) ensures length
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('unity_device')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }
}