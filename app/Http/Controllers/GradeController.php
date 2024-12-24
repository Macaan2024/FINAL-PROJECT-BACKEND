<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
class GradeController extends Controller
{
    public function store(Request $request) {
        
        $validated = $request->validate([
            'user_id' => 'required',
            'subject_id' => 'required',
            'period_id' => 'required',
            'enrollment_id' => 'required',
            'faculty_name' => 'required',
            'grade' => 'required',
            'status' => 'required',
        ]);

        try {

            $grade = Grade::create([
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'],
                'period_id' => $validated['period_id'],
                'enrollment_id' => $validated['enrollment_id'],
                'faculty_name' => $validated['faculty_name'],
                'grade' => $validated['grade'],
                'status' => $validated['status'],
            ]);

            return response()->json([
                'messages' => 'Successfully insert grade',
                'grade' => $grade,
            ]);

        }catch (e) {
            return response()->json([
                'messages' => 'Something went error',
                'error' => $e->getMessage(),
            ]);
        }
    }
    

    public function prelim($id, $userId, $period_id) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $prelimGrade = Grade::where('enrollment_id', $id)
                            ->where('user_id', $userId)
                            ->where('period_id', $period_id)
                            ->first();
    
        if (!$prelimGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($prelimGrade, 200);
    }

    public function midterm($id, $userId, $period_id) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $midtermGrade = Grade::where('enrollment_id', $id)
                            ->where('user_id', $userId)
                            ->where('period_id', $period_id)
                            ->first();
    
        if (!$midtermGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($midtermGrade, 200);
    }

    public function semifinal($id, $userId, $period_id) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $semifinalGrade = Grade::where('enrollment_id', $id)
                            ->where('user_id', $userId)
                            ->where('period_id', $period_id)
                            ->first();
    
        if (!$semifinalGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($semifinalGrade, 200);
    }

    public function final($id, $userId, $period_id) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $finalGrade = Grade::where('enrollment_id', $id)
                            ->where('user_id', $userId)
                            ->where('period_id', $period_id)
                            ->first();
    
        if (!$finalGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($finalGrade, 200);
    }

    public function fetchGrade($id, $period_id) {
        $grade = Grade::with('user')
                      ->where('enrollment_id', $id)
                      ->where('period_id', $period_id)
                      ->first();
    
        if (!$grade) {
            return response()->json(['message' => 'No Grades found'], 404);
        }
    
        return response()->json($grade, 200);
    }
    
    public function getGPA($id) {
        $grades = Grade::where('enrollment_id', $id)->get();        
    
        if ($grades->isEmpty()) {
            return response()->json(['message' => 'No grades available for computation'], 400);
        }
    
        // Extract the grades and calculate the GPA
        $totalGrades = $grades->pluck('grade')->sum(); // Sum all grades
        $numberOfSubjects = $grades->count(); // Count the number of subjects
        $finalGPA = $totalGrades / $numberOfSubjects; // Compute GPA
    
        return response()->json(['GPA' => round($finalGPA, 2)], 200); // Round GPA to 2 decimal places
    }
}
