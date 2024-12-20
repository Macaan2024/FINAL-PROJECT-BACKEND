<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'unique_id' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt([
            'unique_id' => $credentials['unique_id'],
            'password' => $credentials['password'],
        ])) {
            $user = Auth::user();
    
            return response()->json([
                'message' => 'Login Successful',
                'user' => [
                    'id' => $user->id,
                    'unique_id' => $user->unique_id,
                    'role_id' => $user->role_id,
                ]
            ], 200);
        }
    
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }


    public function register(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'role_id' => 'nullable',
            'unique_id' => [
                'required', 'string','regex:/^\d{4}-\d{5}$/', 'unique:users,unique_id'
            ],
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'age' => 'required|numeric',
            'status' => 'required|string',
            'gender' => 'required|string',
            'course' => 'required|string',
            'year' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ],
            'password_confirmation' => 'required|same:password',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'role_id' => $validated['role_id'],
                'unique_id' => $validated['unique_id'],
                'lastname' => $validated['lastname'],
                'firstname' => $validated['firstname'],
                'middlename' => $validated['middlename'],
                'gender' => $validated['gender'],
                'course' => $validated['course'],
                'department' => $validated['department'],
                'year' => $validated['year'],
                'age' => $validated['age'],
                'status' => $validated['status'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Return a response or redirect on success
            return response()->json(['message' => 'User created successfully',
        'user' => $user],201);

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e->getMessage());

            // Return a generic error message to the client
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    
}
