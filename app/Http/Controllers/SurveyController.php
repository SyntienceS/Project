<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hear_about_us' => 'required|string',
            'country' => 'required|string',
            'age_range' => 'required|string',
            'message' => 'nullable|string',
        ]);

        Survey::create($validatedData);

        return redirect()->back()->with('success', 'Survey submitted successfully!');
    }
}
