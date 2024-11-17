<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function evaluate(Request $request)
    {
        $studentId = $request->input('student_id'); // Assume student_id is sent from the frontend
        $studentAnswers = $request->input('answers');
        $score = 0;
        $results = [];
        $totalQuestions = count($studentAnswers);
    
        foreach ($studentAnswers as $studentAnswer) {
            $quiz = Quiz::find($studentAnswer['question_id']);
            if ($quiz) {
                $isCorrect = $quiz->correct_answer === $studentAnswer['answer'];
                if ($isCorrect) {
                    $score++;
                }
                $results[] = [
                    'question' => $quiz->question,
                    'student_answer' => $studentAnswer['answer'],
                    'correct_answer' => $quiz->correct_answer,
                    'is_correct' => $isCorrect,
                ];
            }
        }
    
        // Calculate percentage or marks
        $percentage = ($score / $totalQuestions) * 100;
    
        // Store result in the database
        \DB::table('quiz_results')->insert([
            'student_id' => $studentId,
            'quiz_id' => null, // Add quiz_id if you have multiple quizzes
            'total_questions' => $totalQuestions,
            'correct_answers' => $score,
            'score' => $percentage,
            'created_at' => now(),
        ]);
    
        return response()->json([
            'score' => $score,
            'total_questions' => $totalQuestions,
            'results' => $results,
            'percentage' => $percentage,
        ]);
    }
    
    public function results()
{
    $results = \DB::table('quiz_results')->get();

    return response()->json($results);
}
}
