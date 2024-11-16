<?php

namespace App\Http\Controllers\Api;

use App\Models\assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class AssignmentController extends BaseController
{
    public function index(){
        $data=Assignment::with('subject','course','batch')->get();
        return $this->sendResponse($data,"Assignment data");
    }

    public function store(Request $request){
          /* for files */
          $files=[];
          if($request->hasFile('files')){
             foreach($request->file('files') as $f){
                 $documentname=time().rand(1111,9999).".".$f->extension();
                 $documentPath=public_path().'/assignmentadd';
                 if($f->move($documentPath,$documentname)){
                     array_push($files,$documentname);
                 }
             }
         }
 
         $input['document']=implode(',',$files);
          /* /for files */
        $data=Assignment::create($request->all());
        return $this->sendResponse($data,"Assignment created successfully");
    }
    public function show(Assignment $assignment){
        return $this->sendResponse($assignment,"Assignment data");
    }

    public function update(Request $request,$id){
          /* for files */
          $files=[];
          if($request->hasFile('files')){
             foreach($request->file('files') as $f){
                 $documentname=time().rand(1111,9999).".".$f->extension();
                 $documentPath=public_path().'/assignmentadd';
                 if($f->move($documentPath,$documentname)){
                     array_push($files,$documentname);
                 }
             }
         }
 
         $input['document']=implode(',',$files);
          /* /for files */
        $data=Assignment::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Assignment updated successfully");
    }

    public function destroy(Assignment $assignment)
    {
        $assignment=$assignment->delete();
        return $this->sendResponse($assignment,"Assignment deleted successfully");
    }
}
