<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function generateQuiz(Request $request) {
        $response = Gemini::chat([
            'prompt' => $request->input('prompt'),
            'model' => 'gemini-1',
        ]);
    
        $questions = $response['choices']; // Ambil pertanyaan yang dihasilkan
        
        // Simpan ke database
        $quiz = Quiz::create(['title' => $request->input('title')]);
        foreach ($questions as $q) {
            $quiz->questions()->create([
                'question_text' => $q['text'],
                'answers' => json_encode($q['options']),
                'correct_answer' => $q['answer'],
            ]);
        }
    
        return response()->json(['quiz' => $quiz]);
    }

     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
