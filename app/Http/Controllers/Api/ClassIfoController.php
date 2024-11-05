<?php

namespace App\Http\Controllers\Api;

use App\Models\classIfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class ClassIfoController extends BaseController
{
    public function index(){
        $data=ClassIfo::with('course','instructor','batch','subject','routine')->get();
        return $this->sendResponse($data,"ClassIfo data");
    }

    public function store(Request $request){
        $data=ClassIfo::create($request->all());
        return $this->sendResponse($data,"ClassIfo created successfully");
    }
    public function show(ClassIfo $classIfo){
        return $this->sendResponse($classIfo,"ClassIfo data");
    }

    public function update(Request $request,$id){

        $data=ClassIfo::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"ClassIfo updated successfully");
    }

    public function destroy(ClassIfo $classIfo)
    {
        $classIfo=$classIfo->delete();
        return $this->sendResponse($classIfo,"ClassIfo deleted successfully");
    }
}