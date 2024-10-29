<?php

namespace App\Http\Controllers\Api;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class CertificateController extends BaseController
{
    public function index(){
        $data=Syllabus::with('student','course','instructor')->get();
        return $this->sendResponse($data,"Certificate data");
    }

    public function store(Request $request){
        $data=Certificate::create($request->all());
        return $this->sendResponse($data,"Certificate created successfully");
    }
    public function show(Certificate $certificate){
        return $this->sendResponse($certificate,"Certificate data");
    }

    public function update(Request $request,$id){

        $data=Certificate::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Certificate updated successfully");
    }

    public function destroy(Certificate $certificate)
    {
        $certificate=$certificate->delete();
        return $this->sendResponse($certificate,"Certificate deleted successfully");
    }
}
