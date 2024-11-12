<?php

namespace App\Http\Controllers\Api;

use App\Models\batchEnroll;
use Illuminate\Http\Request;
use App\Models\BatchEnrollRequest;
use App\Http\Controllers\Api\BaseController;
class BatchEnrollController extends BaseController
{
    public function index(Request $r){
        $data=BatchEnroll::with('batch','course','student');
         if($r->student_id){
            $data=$data->where('student_id',$r->student_id);
        }
        $data=$data->get();

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
    public function approve($id){
        $b=batchEnrollRequest::find($id)->toArray();

        $data=BatchEnroll::create($b);
        if($data){
           batchEnrollRequest::where('id',$id)->delete();
        }
        return $this->sendResponse($id,"Batch Enroll successfully");
    }
    public function moveAndFetchData()
{
    // Fetch all records from BatchEnrollRequest
    $requests = BatchEnrollRequest::all();

    // Loop through each request and insert into BatchEnroll
    foreach ($requests as $request) {
    BatchEnroll::create([
        'batch_id' => $request->batch_id,
        'course_id' => $request->course_id,
        'student_id' => $request->student_id,
        'enroll_date' => $request->enroll_date,
        'fees' => $request->fees,
        'trans_number' => $request->trans_number,
        'trans_id' => $request->trans_id,
        'payment_method' => $request->payment_method,
        
        ]);
    }
    // Delete all records from BatchEnrollRequest
    BatchEnrollRequest::truncate();

    // Fetch updated data from BatchEnroll to return to the front end
    $batchEnrolls = BatchEnroll::all();

    return response()->json($batchEnrolls);
}


}