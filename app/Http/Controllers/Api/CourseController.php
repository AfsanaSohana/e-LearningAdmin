<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Controllers\Api\BaseController;

class CourseController extends BaseController
{
    public function index(){
        $data=Course::get();
        return $this->sendResponse($data,"Course data");
    }

    public function store(Request $request){
        $data=Course::create($request->all());
        return $this->sendResponse($data,"Course created successfully");
    }
    public function show(Course $course){
        return $this->sendResponse($course,"Course data");
    }

    public function update(Request $request,$id){

        $data=Course::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Course updated successfully");
    }

    public function destroy(Course $course)
    {
        $course=$course->delete();
        return $this->sendResponse($course,"Course deleted successfully");
    }
}
