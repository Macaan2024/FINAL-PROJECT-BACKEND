<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; // Assuming you have a Subject model.

class SubjectController extends Controller
{
    public function store(Request $request)
    {
        // Step 1: Validate the request
        $validatedData = $request->validate([
            'units' => 'required|integer|max:50',
            'user_id' => 'nullable|exists:users,id', // Ensure the user_id is valid if provided
            'description' => 'required|string|max:50',
            'subjectCode' => 'nullable|string|max:220|unique:subjects,subjectCode',
            'room' => 'required|string|max:220',
        ]);

        try {
            // Step 2: Create a new subject record
            $subject = Subject::create([
                'units' => $validatedData['units'],
                'description' => $validatedData['description'],
                'subjectCode' => $validatedData['subjectCode'] ?? null, // Optional field
                'room' => $validatedData['room'],
                'user_id' => $validatedData['user_id'] ?? null, // This will be null if not provided
            ]);

            // Step 3: Return a success response
            return response()->json([
                'message' => 'Subject created successfully!',
                'subject' => $subject,
            ], 201);

        } catch (\Exception $e) {
            // Handle errors and return a failure response
            return response()->json([
                'message' => 'Failed to create subject.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
