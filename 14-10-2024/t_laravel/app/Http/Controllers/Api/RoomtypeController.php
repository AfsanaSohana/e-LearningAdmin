<?php

namespace App\Http\Controllers\Api;

use App\Models\Roomtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class RoomtypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Roomtype::get();
        return $this->sendResponse($data,"Roomtype list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Roomtype::create($request->all());
        return $this->sendResponse($data,"Roomtype created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Roomtype $roomtype)
    {
        return $this->sendResponse($roomtype,"Roomtype data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roomtype=Roomtype::where('id',$id)->update($request->all());
        return $this->sendResponse($roomtype,"Roomtype updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roomtype $roomtype)
    {
        $package=$package->delete();
        return $this->sendResponse($roomtype,"Roomtype deleted successfully");
    }
}
