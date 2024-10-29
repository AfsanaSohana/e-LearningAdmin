<?php

namespace App\Http\Controllers\Api;

use App\Models\subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;


class SubjectController extends BaseController
{
    public function index(){
        $data=Subject::get();
        return $this->sendResponse($data,"Subject data");
    }

    public function store(Request $request){
        $data=Subject::create($request->all());
        return $this->sendResponse($data,"Subject created successfully");
    }
    public function show(Subject $subject){
        return $this->sendResponse($subject,"Subject data");
    }

    public function update(Request $request,$id){

        $data=Subject::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Subject updated successfully");
    }

    public function destroy(Subject $subject)
    {
        $subject=$subject->delete();
        return $this->sendResponse($subject,"Subject deleted successfully");
    }
}
