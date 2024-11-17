<?php

namespace App\Http\Controllers\aPI;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class QuizController extends BaseController
{
    public function getQuizzes()
    {
        $quizzes = Quiz::all(); // Fetch all quizzes
        return response()->json($quizzes);
    }

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
    // end

    public function store(Request $request){
        $data=Classes::create($request->all());
        return $this->sendResponse($data,"Classes created successfully");
    }
    public function show(Classes $quiz){
        return $this->sendResponse($quiz,"Classes data");
    }

    public function update(Request $request,$id){

        $data=Classes::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Classes updated successfully");
    }

    public function destroy(Classes $quiz)
    {
        $quiz=$quiz->delete();
        return $this->sendResponse($quiz,"Classes deleted successfully");
    }
}
