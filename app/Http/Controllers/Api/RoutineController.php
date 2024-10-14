<?php

// namespace App\Http\Controllers;

// use App\Models\routine;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Api\BaseController;

// class RoutineController extends BaseController
// {
//     public function index(){
//         $data=Routine::get();
//         return $this->sendResponse($data,"Routine data");
//     }

//     public function store(Request $request){
//         $data=Routine::create($request->all());
//         return $this->sendResponse($data,"Routine created successfully");
//     }
//     public function show(Routine $routine){
//         return $this->sendResponse($routine,"Routine data");
//     }

//     public function update(Request $request,$id){

//         $data=Routine::where('id',$id)->update($request->all());
//         return $this->sendResponse($id,"Routine updated successfully");
//     }

//     public function destroy(Routine $routine)
//     {
//         $routine=$routine->delete();
//         return $this->sendResponse($routine,"Routine deleted successfully");
//     }
// }