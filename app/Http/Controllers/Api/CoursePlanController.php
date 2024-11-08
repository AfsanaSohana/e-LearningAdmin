<?php

namespace App\Http\Controllers\Api;

use App\Models\CoursePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class CoursePlanController extends BaseController
{
    public function index(){
        $data=CoursePlan::with('course','subject')->get();
        return $this->sendResponse($data,"CoursePlan data");
    }
    // // for DOCUMENT 
    // public function uploadDocument(Request $request)  
    // {
    //     $request->validate([
    //         'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     // Store the file
    //     if ($request->file('document')) {
    //         $filePath = $request->file('document')->store('documents', 'public');
    //         return response()->json(['file_path' => $filePath], 201);
    //     }

    //     return response()->json(['message' => 'File not uploaded'], 400);
    // }
    // //
    public function store(Request $request){
        $data=CoursePlan::create($request->all());
        return $this->sendResponse($data,"CoursePlan created successfully");
    }
    public function show(CoursePlan $coursePlan){
        return $this->sendResponse($coursePlan,"CoursePlan data");
    }

    public function update(Request $request,$id){

        $data=CoursePlan::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"CoursePlan updated successfully");
    }

    public function destroy(CoursePlan $coursePlan)
    {
        $coursePlan=$coursePlan->delete();
        return $this->sendResponse($coursePlan,"CoursePlan deleted successfully");
    }
   
}

