<?php

namespace App\Http\Controllers\Api;

use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class TransportController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Transport::get();
        return $this->sendResponse($data,"Transport list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=Transport::create($request->all());
        return $this->sendResponse($data,"Transport created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        return $this->sendResponse($transport,"Transport data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transport=Transport::where('id',$id)->update($request->all());
        return $this->sendResponse($transport,"Transport updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        $package=$package->delete();
        return $this->sendResponse($transport,"Transport deleted successfully");
    }
}
