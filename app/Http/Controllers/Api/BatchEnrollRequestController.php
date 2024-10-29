<?php

namespace App\Http\Controllers\Api;

use App\Models\batchEnrollRequest;
use App\Models\batchEnroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;


class BatchEnrollRequestController extends BaseController
{
    public function index(){
        $data=BatchEnrollRequest::with('batch','course','student')->get();
        return $this->sendResponse($data,"Batch Enroll Request data");
    }

    public function store(Request $request){
        $input=$request->all();
        $input['enroll_date']=date('Y-m-d');
        $data=BatchEnrollRequest::create($input);
        return $this->sendResponse($data,"Batch Enroll Request created successfully");
    }
    public function show(BatchEnrollRequest $batchEnrollRequest){
        return $this->sendResponse($batchEnrollRequest,"Batch Enroll Request data");
    }

    public function update(Request $request,$id){

        $data=BatchEnrollRequest::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Batch Enroll Request updated successfully");
    }

    public function destroy(BatchEnrollRequest $batchEnrollRequest)
    {
        $batchEnrollRequest=$batchEnrollRequest->delete();
        return $this->sendResponse($batchEnrollRequest,"Batch Enroll Request deleted successfully");
    }

    public function approve(BatchEnrollRequest $batchEnrollRequest)
    {
        $data=$batchEnrollRequest->toArray();
        if(batchEnroll::create($data)){
            $batchEnrollRequest=$batchEnrollRequest->delete();
        }
        return $this->sendResponse($data,"Batch Enroll Request approved successfully");
    }
}
