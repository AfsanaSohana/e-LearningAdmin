<?php

namespace App\Http\Controllers\Api;

use App\Models\exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ExamController extends  BaseController


{
    public function index(){
        $data=Exam::get();
        return $this->sendResponse($data,"Exam data");
    }

    public function store(Request $request){
        $data=Exam::create($request->all());
        return $this->sendResponse($data,"Exam created successfully");
    }
    public function show(Exam $exam){
        return $this->sendResponse($exam,"Exam data");
    }

    public function update(Request $request,$id){

        $data=Exam::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Exam updated successfully");
    }

    public function destroy(Exam $exam)
    {
        $exam=$exam->delete();
        return $this->sendResponse($exam,"Exam deleted successfully");
    }

}
