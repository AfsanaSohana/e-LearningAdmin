<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ClassesController;
use App\Http\Controllers\Api\BatchController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\InstructorController;
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
Route::controller(ClassesController::class)->group(function(){
    Route::get('classes','index');
    Route::get('classes/{classes}','show');
    Route::post('classes/edit/{classes}','update');
    Route::delete('classes/{classes}','destroy');
    Route::post('classes/create','store');
});
Route::controller(BatchController::class)->group(function(){
    Route::get('batch','index');
    Route::get('batch/{batch}','show');
    Route::post('batch/edit/{batch}','update');
    Route::delete('batch/{batch}','destroy');
    Route::post('batch/create','store');
});
Route::controller(ExamController::class)->group(function(){
    Route::get('exam','index');
    Route::get('exam/{exam}','show');
    Route::post('exam/edit/{exam}','update');
    Route::delete('exam/{exam}','destroy');
    Route::post('exam/create','store');
});
Route::controller(InstructorController::class)->group(function(){
    Route::get('instructor','index');
    Route::get('instructor/{instructor}','show');
    Route::post('instructor/edit/{instructor}','update');
    Route::delete('instructor/{instructor}','destroy');
    Route::post('instructor/create','store');
});
Route::controller(StudentController::class)->group(function(){
    Route::get('student','index');
    Route::get('student/{instructor}','show');
    Route::post('student/edit/{student}','update');
    Route::delete('student/{student}','destroy');
    Route::post('student/create','store');
});