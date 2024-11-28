<?php

namespace App\Http\Controllers\Api;
use App\Models\QuizResult;
use App\Models\ResultDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class QuizResultController extends BaseController
{
 public function index(){
        $data=QuizResult::with('student','quiz')->get();
        return $this->sendResponse($data,"QuizResult data");
    }

    public function store(Request $request){

        $result['student_id']=$request->student_id;
        $result['course_id']=$request->course_id;
        $result['total_questions']=count($request->userAnswers);
        $result['correct_answers']=$request->countResult;
        $data=QuizResult::create($result);
        if(count($request->userAnswers) > 0){
            foreach($request->userAnswers as $k=>$v){
                foreach($v as $q=>$a){
                    $rsd['student_id']=$request->student_id;
                    $rsd['question_id']=$q;
                    $rsd['answer']=$a;
                    ResultDetails::create($rsd);
                }
            }
        }
        

        return $this->sendResponse($data,"QuizResult created successfully");
    }
    public function show(QuizResult $quizResult){
        return $this->sendResponse($quizResult,"QuizResult data");
    }

    public function update(Request $request,$id){

        $data=QuizResult::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"QuizResult updated successfully");
    }

    public function destroy(QuizResult $quizResult)
    {
        $quizResult=$quizResult->delete();
        return $this->sendResponse($quizResult,"QuizResult deleted successfully");
    }
}


//     public function evaluate(Request $request)
//     {
//         $studentId = $request->input('student_id'); // Assume student_id is sent from the frontend
//         $studentAnswers = $request->input('answers');
//         $score = 0;
//         $results = [];
//         $totalQuestions = count($studentAnswers);
    
//         foreach ($studentAnswers as $studentAnswer) {
//             $quiz = Quiz::find($studentAnswer['question_id']);
//             if ($quiz) {
//                 $isCorrect = $quiz->correct_answer === $studentAnswer['answer'];
//                 if ($isCorrect) {
//                     $score++;
//                 }
//                 $results[] = [
//                     'question' => $quiz->question,
//                     'student_answer' => $studentAnswer['answer'],
//                     'correct_answer' => $quiz->correct_answer,
//                     'is_correct' => $isCorrect,
//                 ];
//             }
//         }
    
//         // Calculate percentage or marks
//         $percentage = ($score / $totalQuestions) * 100;
    
//         // Store result in the database
//         \DB::table('quiz_results')->insert([
//             'student_id' => $studentId,
//             'quiz_id' => null, // Add quiz_id if you have multiple quizzes
//             'total_questions' => $totalQuestions,
//             'correct_answers' => $score,
//             'score' => $percentage,
//             'created_at' => now(),
//         ]);
    
//         return response()->json([
//             'score' => $score,
//             'total_questions' => $totalQuestions,
//             'results' => $results,
//             'percentage' => $percentage,
//         ]);
//     }
    
//     public function results()
// {
//     $results = \DB::table('quiz_results')->get();

//     return response()->json($results);
// }