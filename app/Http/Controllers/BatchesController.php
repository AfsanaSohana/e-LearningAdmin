<?php

namespace App\Http\Controllers;

use App\Models\batches;
use Illuminate\Http\Request;

class BatchesController extends BaseController
{
    public function index(){
        $data=Batch::get();
        return $this->sendResponse($data,"Batch data");
    }

    public function store(Request $request){
        $data=Batch::create($request->all());
        return $this->sendResponse($data,"Batch created successfully");
    }
    public function show(Batch $batch){
        return $this->sendResponse($batch,"Batch data");
    }

    public function update(Request $request,$id){

        $data=Batch::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Batch updated successfully");
    }

    public function destroy(Batch $batch)
    {
        $batch=$batch->delete();
        return $this->sendResponse($batch,"Batch deleted successfully");
    }
}
