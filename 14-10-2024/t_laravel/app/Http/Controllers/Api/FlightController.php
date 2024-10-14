<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class FlightController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Flight::get();
        return $this->sendResponse($data,"Flight list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Flight::create($request->all());
        return $this->sendResponse($data,"Flight created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return $this->sendResponse($flight,"Flight data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $flight=Flight::where('id',$id)->update($request->all());
        return $this->sendResponse($flight,"Flight updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $package=$package->delete();
        return $this->sendResponse($flight,"Flight deleted successfully");
    }
}
