<?php

namespace App\Http\Controllers\Api;

use App\Models\batchLectureSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class BatchLectureSheetController extends BaseController
{
    public function index(){
        $data=BatchLectureSheet::with('course','batch','subject','batch')->get();
        if($r->batch_id){
            $data=$data->where('batch_id',$r->batch_id);
        }
        
        $data=$data->get();
        return $this->sendResponse($data,"BatchLectureSheet data");
    }

    public function store(Request $request){
        $data=BatchLectureSheet::create($request->all());
        return $this->sendResponse($data,"BatchLectureSheet created successfully");
    }
    public function show(BatchLectureSheet $batchLectureSheet){
        return $this->sendResponse($batchLectureSheet,"BatchLectureSheet data");
    }

    public function update(Request $request,$id){

        $data=BatchLectureSheet::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"BatchLectureSheet updated successfully");
    }

    public function destroy(BatchLectureSheet $batchLectureSheet)
    {
        $batchLectureSheet=$batchLectureSheet->delete();
        return $this->sendResponse($batchLectureSheet,"BatchLectureSheet deleted successfully");
    }
}