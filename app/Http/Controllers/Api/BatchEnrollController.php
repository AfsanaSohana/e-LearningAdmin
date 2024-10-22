<?php

namespace App\Http\Controllers\Api;

use App\Models\batchEnroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class BatchEnrollController extends BaseController
{
    public function index(){
        $data=BatchEnroll::with('batch','course','student')->get();
        return $this->sendResponse($data,"Batch Enroll data");
    }

    public function store(Request $request){
        $data=BatchEnroll::create($request->all());
        return $this->sendResponse($data,"Batch Enroll created successfully");
    }
    public function show(BatchEnroll $batchEnroll){
        return $this->sendResponse($batchEnroll,"Batch Enroll data");
    }

    public function update(Request $request,$id){

        $data=BatchEnroll::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Batch Enroll updated successfully");
    }

    public function destroy(BatchEnroll $batchEnroll)
    {
        $batchEnroll=$batchEnroll->delete();
        return $this->sendResponse($batchEnroll,"Batch Enroll deleted successfully");
    }
}