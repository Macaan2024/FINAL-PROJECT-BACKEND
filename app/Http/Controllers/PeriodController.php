<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;

class PeriodController extends Controller
{
    public function store (Request $request) {

        $validated = $request->validate([
            'term' => 'required',
        ]);


        try {
            $period = Period::create([
                'term' => $validated['term'],
            ]);
            return response()->json(['messages' => 'Sucessfully Insert Period', $period],200);
        }catch(e) {
            return response()->json([
                'messages' => 'Something went wrong!',
                'error' => $e->getMessage(),
            ]);
        }

    }
}
