<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'unique_id' => 'required|string',
            'password' => 'required|string',
            'usertype' => 'required|string',
        ]);
    
        if (Auth::attempt([
            'unique_id' => $credentials['unique_id'],
            'password' => $credentials['password'],
            'usertype' => $credentials['usertype'],
        ])) {
            $user = Auth::user();
    
            return response()->json([
                'message' => 'Login Successful',
                'user' => [
                    'id' => $user->id,
                    'unique_id' => $user->unique_id,
                    'usertype' => $user->usertype,
                ]
            ], 200);
        }
    
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }
    
}
