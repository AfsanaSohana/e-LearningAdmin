<?php

namespace App\Http\Controllers\Api;

use App\Models\instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class InstructorController extends BaseController
{
    public function index(){
        $data=Instructor::get();
        return $this->sendResponse($data,"Instructor data");
    }

    public function store(Request $request){
        $input=$request->all();
         /* for files */
         $files=[];
         if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $photoname=time().rand(1111,9999).".".$f->extension();
                $photoPath=public_path().'/instructoradd';
                if($f->move($photoPath,$photoname)){
                    array_push($files,$photoname);
                }
            }
        }

        $input['photo']=implode(',',$files);
         /* /for files */
        $data=Instructor::create($input);
        return $this->sendResponse($data,"Instructor created successfully");
    }
    public function show(Instructor $instructor){
        return $this->sendResponse($instructor,"Instructor data");
    }

    public function update(Request $request,$id){
        $input=$request->all();
        /* for files */
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $photoname=time().rand(1111,9999).".".$f->extension();
                $photoPath=public_path().'/instructoradd';
                if($f->move($photoPath,$photoname)){
                    array_push($files,$photoname);
                }
            }
            $input['photo']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */


        $data=Instructor::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Instructor updated successfully");
    }

    public function destroy(Instructor $instructor)
    {
        $instructor=$instructor->delete();
        return $this->sendResponse($instructor,"Instructor deleted successfully");
    }
}

