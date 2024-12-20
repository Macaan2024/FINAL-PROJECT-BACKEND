<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Subject;
use App\Models\User;


class EnrollmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'faculty_name' => 'required|string|max:255',
            'semester' => 'required|string|max:50',
            'schoolYear' => 'required|string|max:50',
        ]);

        try {
            $enrolled = Enrollment::create([
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'],
                'faculty_name' => $validated['faculty_name'],
                'semester' => $validated['semester'],
                'schoolYear' => $validated['schoolYear'],
            ]);

            return response()->json([
                'message' => 'Enrollment created successfully',
                'enrollment' => $enrolled,
            ], 201);

        } catch (\Exception $e) {

            \Log::error($e->getMessage());

            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }

    public function index($id)
    {
        $enrolledSubjects = Enrollment::with('subject')
                                        ->where('user_id', $id)
                                        ->get();
        
        if (!$enrolledSubjects) {
            return response()->json(['message' => 'No Subject Enrolled'],404);
        }

        return response()->json($enrolledSubjects,200);
    }

    public function show($id)
    {
        $enrolledSubject = Enrollment::with('subject')->findOrFail($id);
        
        if (!$enrolledSubject->subject) {
            return response()->json(['message' => 'No Subject Enrolled'], 404);
        }

        return response()->json($enrolledSubject,200);
    }
}
