<?php

namespace App\Http\Controllers\Api;

use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class StudentController extends BaseController
{
    public function index(){
        $data=student::get();
        return $this->sendResponse($data,"Student data");
    }

    public function store(Request $request){
        $input=$request->all();
         /* for files */
         $files=[];
         if($request->hasFile('files')){
            foreach($request->file('files') as $f){
                $photoname=time().rand(1111,9999).".".$f->extension();
                $photoPath=public_path().'/studentadd';
                if($f->move($photoPath,$photoname)){
                    array_push($files,$photoname);
                }
            }
        }

        $input['photo']=implode(',',$files);
         /* /for files */
        $data=Student::create($input);
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
                $photoname=time().rand(1111,9999).".".$f->extension();
                $photoPath=public_path().'/studentadd';
                if($f->move($photoPath,$photoname)){
                    array_push($files,$photoname);
                }
            }
            $input['photo']=implode(',',$files);
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

    public function _login(Request $r)
    {
        $data=Student::where('contact_number',$r->contact_number)
                ->where('password',$r->password)
                ->first()?->toArray();
        if($data){
            $d['token']=$data['id'];
            $d['data']=$data;
            return $this->sendResponse($d,"User login successfully");
        }else{
            return $this->sendError(['error'=>'contact number or password is not correct'],"Unauthorized",400);
        }
    }

}

