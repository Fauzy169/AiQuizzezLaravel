<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::post('/quiz/generate', [QuizController::class, 'generateQuiz']);


