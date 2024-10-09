<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ClassesController;
// use App\Http\Controllers\Api\DesignationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::post('register','_register');
    Route::post('login','_login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CourseController::class)->group(function(){
    Route::get('course','index');
    Route::get('course/{course}','show');
    Route::post('course/edit/{course}','update');
    Route::delete('course/{course}','destroy');
    Route::post('course/create','store');
});
Route::controller(CourseController::class)->group(function(){
    Route::get('classes','index');
    Route::get('classes/{classes}','show');
    Route::post('classes/edit/{classes}','update');
    Route::delete('classes/{classes}','destroy');
    Route::post('classes/create','store');
});