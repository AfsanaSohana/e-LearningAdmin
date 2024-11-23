<?php

namespace App\Http\Controllers\Api;

use App\Models\ResultDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class ResultDetailsController extends BaseController
{
    public function index(){
        $data=ResultDetails::with('student','quiz')->get();
        return $this->sendResponse($data,"ResultDetails data");
    }

    public function store(Request $request){
        $data=ResultDetails::create($request->all());
        return $this->sendResponse($data,"ResultDetails created successfully");
    }
    public function show(ResultDetails $resultDetails){
        return $this->sendResponse($resultDetails,"ResultDetails data");
    }

    public function update(Request $request,$id){

        $data=ResultDetails::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"ResultDetails updated successfully");
    }

    public function destroy(ResultDetails $resultDetails)
    {
        $resultDetails=$resultDetails->delete();
        return $this->sendResponse($resultDetails,"ResultDetails deleted successfully");
    }
}
