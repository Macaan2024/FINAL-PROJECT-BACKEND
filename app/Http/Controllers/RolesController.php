<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;    
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RolesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'description' => 'required',
        ]);

        
        try {

            // Create a new user
            Role::create([
                'description' => $validated['description'],
            ]);

            // Return a response or redirect on success
            return response()->json(['message' => 'Role successfully assign'], 201);

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e->getMessage());

            // Return a generic error message to the client
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
