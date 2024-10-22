<?php

namespace App\Http\Controllers\Api;

use App\Models\examResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ExamResultController extends BaseController
{
    public function index(){
        $data=ExamResult::with('exam','course','subject',)->get();
        return $this->sendResponse($data,"Exam Result data");
    }

    public function store(Request $request){
        $data=ExamResult::create($request->all());
        return $this->sendResponse($data,"Exam Result created successfully");
    }
    public function show(ExamResult $examResult){
        return $this->sendResponse($examResult,"Exam Result data");
    }

    public function update(Request $request,$id){

        $data=ExamResult::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Exam Result updated successfully");
    }

    public function destroy(ExamResult $examResult)
    {
        $examResult=$examResult->delete();
        return $this->sendResponse($examResult,"Exam Result deleted successfully");
    }

}
