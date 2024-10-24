<?php

namespace App\Http\Controllers\Api;

use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class StudentController extends BaseController
{
    public function index(){
        $data=Student::get();
        return $this->sendResponse($data,"Student data");
    }

    public function store(Request $request){
        $data=Student::create($request->all());
         /* for files */
         $files=[];
         if($request->hasFile('files')){
             foreach($request->file('files') as $f){
                 $imagename=time().rand(1111,9999).".".$f->extension();
                 $imagePath=public_path().'/employe';
                 if($f->move($imagePath,$imagename)){
                     array_push($files,$imagename);
                 }
             }
         }
         $input['image']=implode(',',$files);
         /* /for files */
        return $this->sendResponse($data,"Student created successfully");
    }
    public function show(Student $student){
        return $this->sendResponse($student,"Student data");
    }

    public function update(Request $request,$id){
        $input=$request->all();
        /* for files */
        $files=[];
        if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $imagename=time().rand(1111,9999).".".$f->extension();
                $imagePath=public_path().'/student';
                if($f->move($imagePath,$imagename)){
                    array_push($files,$imagename);
                }
            }
            $input['image']=implode(',',$files);
        }
        unset($input['files']);

        /* /for files */

        $data=Student::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Student updated successfully");
    }

    public function destroy(Student $student)
    {
        $student=$student->delete();
        return $this->sendResponse($student,"Student deleted successfully");
    }
}

