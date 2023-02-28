<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    
    class AuthController extends Controller
    {
        public function register(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|min:6|confirmed',
            ]);
    
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            $token = $user->createToken('authToken')->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    
        public function login(Request $request)
        {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if (!Auth::attempt($validatedData)) {
                return response()->json([
                    'message' => 'Invalid credentials',
                ], 401);
            }
    
            $user = User::where('email', $validatedData['email'])->first();
            $token = $user->createToken('authToken')->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    
        public function logout(Request $request)
        {
            $request->user()->tokens()->delete();
    
            return response()->json([
                'message' => 'Logged out',
            ]);
        }
    }
    

