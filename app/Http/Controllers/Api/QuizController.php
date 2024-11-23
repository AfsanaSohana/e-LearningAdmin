<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class QuizController extends BaseController
{
     public function index(){
        $data=Quiz::with('subject','batch')->get();
        return $this->sendResponse($data,"Quiz data");
    }

    public function store(Request $request){
        $data=Quiz::create($request->all());
        return $this->sendResponse($data,"Quiz created successfully");
    }
    public function show(Quiz $quiz){
        return $this->sendResponse($quiz,"Quiz data");
    }

    public function update(Request $request,$id){

        $data=Quiz::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Quiz updated successfully");
    }

    public function destroy(Quiz $quiz)
    {
        $quiz=$quiz->delete();
        return $this->sendResponse($quiz,"Quiz deleted successfully");
    }

}
