<?php

namespace App\Http\Controllers\Api;

use App\Models\attendence;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class AttendenceController extends BaseController
{
    public function index(){
        $data=Attendence::get();
        return $this->sendResponse($data,"Attendence data");
    }

    public function store(Request $request){
        $data=Attendence::create($request->all());
        return $this->sendResponse($data,"Attendence created successfully");
    }
    public function show(Attendence $attendence){
        return $this->sendResponse($attendence,"Attendence data");
    }

    public function update(Request $request,$id){

        $data=Attendence::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Attendence updated successfully");
    }

    public function destroy(Attendence $attendence)
    {
        $attendence=$attendence->delete();
        return $this->sendResponse($attendence,"Attendence deleted successfully");
    }
}
