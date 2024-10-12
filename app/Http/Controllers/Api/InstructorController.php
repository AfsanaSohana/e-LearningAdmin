<?php

namespace App\Http\Controllers\Api;

use App\Models\instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class InstructorController extends BaseController
{
    public function index(){
        $data=Instructor::get();
        return $this->sendResponse($data,"Instructor data");
    }

    public function store(Request $request){
        $data=Instructor::create($request->all());
        return $this->sendResponse($data,"Instructor created successfully");
    }
    public function show(Instructor $instructor){
        return $this->sendResponse($instructor,"Instructor data");
    }

    public function update(Request $request,$id){

        $data=Instructor::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Instructor updated successfully");
    }

    public function destroy(Instructor $instructor)
    {
        $instructor=$instructor->delete();
        return $this->sendResponse($instructor,"Instructor deleted successfully");
    }
}

