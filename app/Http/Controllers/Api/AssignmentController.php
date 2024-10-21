<?php

namespace App\Http\Controllers\Api;

use App\Models\assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class AssignmentController extends BaseController
{
    public function index(){
        $data=Assignment::get();
        return $this->sendResponse($data,"Assignment data");
    }

    public function store(Request $request){
        $data=Assignment::create($request->all());
        return $this->sendResponse($data,"Assignment created successfully");
    }
    public function show(Assignment $assignment){
        return $this->sendResponse($assignment,"Assignment data");
    }

    public function update(Request $request,$id){

        $data=Assignment::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Assignment updated successfully");
    }

    public function destroy(Assignment $assignment)
    {
        $assignment=$assignment->delete();
        return $this->sendResponse($assignment,"Assignment deleted successfully");
    }
}
