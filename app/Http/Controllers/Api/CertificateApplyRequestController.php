<?php

namespace App\Http\Controllers\Api;

use App\Models\CertificateApplyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class CertificateApplyRequestController extends BaseController
{
    public function index(){
        $data=CertificateApplyRequest::with('batchEnroll')->get();
        return $this->sendResponse($data,"Certificate Apply Request data");
    }

    public function store(Request $request){
        $input=$request->all();
        $input['enroll_date']=date('Y-m-d');
        $data=CertificateApplyRequest::create($input);
        return $this->sendResponse($data,"Certificate Apply Request created successfully");
    }
    public function show(CertificateApplyRequest $certificateApplyRequest){
        return $this->sendResponse($certificateApplyRequest,"Certificate Apply Request data");
    }

    public function update(Request $request,$id){

        $data=CertificateApplyRequest::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Certificate Apply Request updated successfully");
    }

    public function destroy(CertificateApplyRequest $certificateApplyRequest)
    {
        $certificateApplyRequest=$certificateApplyRequest->delete();
        return $this->sendResponse($certificateApplyRequest,"Certificate Apply Request deleted successfully");
    }

    public function approve(CertificateApplyRequest $certificateApplyRequest)
    {
        $data=$certificateApplyRequest->toArray();
        if(batchEnroll::create($data)){
            $certificateApplyRequest=$certificateApplyRequest->delete();
        }
        return $this->sendResponse($data,"Certificate Apply Request approved successfully");
    }
}
