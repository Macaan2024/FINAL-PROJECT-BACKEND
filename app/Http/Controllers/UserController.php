<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{

    public function index() {

        $user = User::all();

        if (!$user) {

            return response()->json(['message' => 'No Users Found'],400);
        }
        return response()->json($user,200);
    }
    public function show($id) {

        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'No Profile Data Found'],404);
        }

        return response()->json($user, 200);
    }

    public function update(string $id, Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'unique_id' => 'required|string|regex:/^\d{4}-\d{5}$/|unique:users,unique_id,' . $id,
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'age' => 'required|numeric',
            'status' => 'required|string',
            'gender' => 'required|string',
            'course' => 'required|string',
            'year' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Find the user by ID
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the user data
        $user->update($validated);

        return response()->json($user, 200);
    }

    public function profile($id) {

        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'No Profile Data Found'],404);
        }

        return response()->json($user, 200);
    }      
}