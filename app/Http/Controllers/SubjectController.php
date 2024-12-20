<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject; // Assuming you have a Subject model.
use App\Models\Enrollment;

class SubjectController extends Controller
{
    public function store(Request $request)
    {
        // Step 1: Validate the request
        $validatedData = $request->validate([
            'units' => 'required|integer|max:50',
            'faculty_name' => 'nullable', // Ensure the user_id is valid if provided
            'description' => 'required|string|max:50',
            'subjectCode' => 'nullable|string|max:220|unique:subjects,subjectCode',
            'room' => 'required|string|max:220',
        ]);

        try {
            // Step 2: Create a new subject record
            $subject = Subject::create([
                'units' => $validatedData['units'],
                'description' => $validatedData['description'],
                'subjectCode' => $validatedData['subjectCode'], // Optional field
                'room' => $validatedData['room'],
                'faculty_name' => $validatedData['faculty_name'] ?? null, // This will be null if not provided
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

    public function index($id)
    {
        $enrolledSubjects = Enrollment::with('subject')
                                        ->where('user_id', $id)
                                        ->get();
        
        if ($enrolledSubjects->isEmpty) {
            return response()->json(['message' => 'No Subject Enrolled'],404);
        }

        return response()->json($enrolledSubjects,200);
    }

    public function show($id) {
        $book = Subject::find($id);
    
        if ($book) {
            return response()->json($book, 200);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }    
}
