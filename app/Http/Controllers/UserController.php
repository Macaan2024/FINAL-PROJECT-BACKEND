<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function show(string $id) {

        return User::find($id);
    }

    public function register(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'usertype' => 'required|string',
            'unique_id' => [
                'required', 'string', 'regex:/^\d{4}-\d{5}      $/', 'unique:users,unique_id'
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
            'degree' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ],
            'password_confirmation' => 'required|same:password'

        ]);

        try {
            // Create a new user
            User::create([
                'usertype' => $validated['usertype'],
                'unique_id' => $validated['unique_id'],
                'lastname' => $validated['lastname'],
                'firstname' => $validated['firstname'],
                'middlename' => $validated['middlename'],
                'gender' => $validated['gender'],
                'course' => $validated['course'],
                'year' => $validated['year'],
                'department' => $validated['department'],
                'degree' => $validated['degree'],
                'age' => $validated['age'],
                'status' => $validated['status'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);

            // Return a response or redirect on success
            return response()->json(['message' => 'User created successfully'], 201);

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e->getMessage());

            // Return a generic error message to the client
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
