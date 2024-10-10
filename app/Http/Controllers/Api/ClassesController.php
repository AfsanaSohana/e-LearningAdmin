<?php

namespace App\Http\Controllers\Api;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ClassesController extends  BaseController
{
    public function index(){
        $data=Classes::get();
        return $this->sendResponse($data,"Classes data");
    }

    public function store(Request $request){
        $data=Classes::create($request->all());
        return $this->sendResponse($data,"Classes created successfully");
    }
    public function show(Classes $classes){
        return $this->sendResponse($classes,"Classes data");
    }

    public function update(Request $request,$id){

        $data=Classes::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Classes updated successfully");
    }

    public function destroy(Classes $classes)
    {
        $classes=$classes->delete();
        return $this->sendResponse($classes,"Classes deleted successfully");
    }
}

