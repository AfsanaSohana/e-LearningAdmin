<?php

namespace App\Http\Controllers\Api;

use App\Models\module;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ModuleController extends BaseController
{
  public function index(){
        $data=Module::with('batch','course')->get();
        return $this->sendResponse($data,"Module data");
    }

    public function store(Request $request){
        $data=Module::create($request->all());
        return $this->sendResponse($data,"Module Result created successfully");
    }
    public function show(Module $module){
        return $this->sendResponse($module,"Module data");
    }

    public function update(Request $request,$id){

        $data=Module::where('id',$id)->update($request->all());
        return $this->sendResponse($id,"Module updated successfully");
    }

    public function destroy(Module $module)
    {
        $module=$module->delete();
        return $this->sendResponse($module,"Module deleted successfully");
    }
}
