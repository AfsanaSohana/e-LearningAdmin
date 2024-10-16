<?php

namespace App\Http\Controllers;

use App\Models\syllabus;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class SyllabusController extends BaseController
{
    public function index(){
        $data=Syllabus::with('subject','course')->get();
        return $this->sendResponse($data,"Syllabus data");
    }

    public function store(Request $request){
        $data=Syllabus::create($request->all());
        return $this->sendResponse($data,"Syllabus created successfully");
    }
    public function show(Syllabus $syllabus){
        return $this->sendResponse($syllabus,"Syllabus data");
    }

    public function update(Request $request,$id){

        $data=Syllabus::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Syllabus updated successfully");
    }

    public function destroy(Syllabus $syllabus)
    {
        $syllabus=$syllabus->delete();
        return $this->sendResponse($syllabus,"Syllabus deleted successfully");
    }
}


