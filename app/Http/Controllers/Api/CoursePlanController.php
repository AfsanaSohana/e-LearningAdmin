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
    
  
    public function store(Request $request){
        $input=$request->all();
          /* for files */
           /* for document*/ 
         if($request->hasFile('document')){
            $document=[];
            foreach($request->file('document') as $f){
                $docname=time().rand(1111,9999)."-".$f->getClientOriginalName();
                $docPath=public_path().'/studentadd';
                if($f->move($docPath,$docname)){
                    array_push($document,$docname);
                }
            }
            $input['document']=implode(',',$document);
        }
        /* for model sheet*/ 
         if($request->hasFile('model_sheet')){
            $model_sheet=[];
            foreach($request->file('model_sheet') as $f){
                $modeloname=time().rand(1111,9999)."-".$f->getClientOriginalName();
                $modelPath=public_path().'/studentadd';
                if($f->move($modelPath,$modeloname)){
                    array_push($model_sheet,$modeloname);
                }
            }
            $input['model_sheet']=implode(',',$model_sheet);
        }

        $data=CoursePlan::create($input);
        
         /* /for files */
        
        return $this->sendResponse($data,"CoursePlan created successfully");
    }
    public function show(CoursePlan $coursePlan){
        return $this->sendResponse($coursePlan,"CoursePlan data");
    }

    public function update(Request $request,$id){

        $data=CoursePlan::where('id',$id)->update($request->all());
          /* for files */
          if($request->hasFile('document')){
            $document=[];
            foreach($request->file('document') as $f){
                $docname=time().rand(1111,9999).".".$f->extension();
                $docPath=public_path().'/studentadd';
                if($f->move($docPath,$docname)){
                    array_push($document,$docname);
                }
            }
            $input['document']=implode(',',$document);
        }
         /* for model sheet*/ 
          if($request->hasFile('model_sheet')){
            $model_sheet=[];
            foreach($request->file('model_sheet') as $f){
                $modeloname=time().rand(1111,9999).".".$f->extension();
                $modelPath=public_path().'/studentadd';
                if($f->move($modelPath,$modeloname)){
                    array_push($model_sheet,$modeloname);
                }
            }
            $input['model_sheet']=implode(',',$model_sheet);
        }

        /* /for files */

        return $this->sendResponse($id,"CoursePlan updated successfully");
    }

    public function destroy(CoursePlan $coursePlan)
    {
        $coursePlan=$coursePlan->delete();
        return $this->sendResponse($coursePlan,"CoursePlan deleted successfully");
    }
   
}

