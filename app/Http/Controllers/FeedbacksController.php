<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbacksController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
            'sender_name' => 'required|string',
            'reciever_name' => 'required|string',
            'statement' => 'required|string|max:255',
        ]);

        try {
            // Create the feedback record
            $feedback = Feedback::create([
                'user_id' => $validated['user_id'],
                'sender_name' => $validated['sender_name'],
                'reciever_name' => $validated['reciever_name'],
                'statement' => $validated['statement']
            ]);

            // Return a success response
            return response()->json([
                'message' => 'Feedback submitted successfully!',
                'feedback' => $feedback
            ], 201);
        } catch (\Exception $e) {
            // Handle errors during feedback creation
            return response()->json([
                'message' => 'Failed to submit feedback.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
