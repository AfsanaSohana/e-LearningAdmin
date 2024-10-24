<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ClassesController;
use App\Http\Controllers\Api\BatchController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\InstructorController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\RoutineController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SyllabusController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\Api\ExamResultController;
use App\Http\Controllers\Api\BatchEnrollController;
use App\Http\Controllers\Api\BatchEnrollRequestController;
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
    Route::get('student/{student}','show');
    Route::post('student/edit/{student}','update');
    Route::delete('student/{student}','destroy');
    Route::post('student/create','store');
});
Route::controller(RoutineController::class)->group(function(){
    Route::get('routine','index');
    Route::get('routine/{routine}','show');
    Route::post('routine/edit/{routine}','update');
    Route::delete('routine/{routine}','destroy');
    Route::post('routine/create','store');
});
Route::controller(SubjectController::class)->group(function(){
    Route::get('subject','index');
    Route::get('subject/{subject}','show');
    Route::post('subject/edit/{subject}','update');
    Route::delete('subject/{subject}','destroy');
    Route::post('subject/create','store');
});
Route::controller(SyllabusController::class)->group(function(){
    Route::get('syllabus','index');
    Route::get('syllabus/{syllabus}','show');
    Route::post('syllabus/edit/{syllabus}','update');
    Route::delete('syllabus/{syllabus}','destroy');
    Route::post('syllabus/create','store');
});
Route::controller(AssignmentController::class)->group(function(){
    Route::get('assignment','index');
    Route::get('assignment/{assignment}','show');
    Route::post('assignment/edit/{assignment}','update');
    Route::delete('assignment/{assignment}','destroy');
    Route::post('assignment/create','store');
});
Route::controller(AttendenceController::class)->group(function(){
    Route::get('attendence','index');
    Route::get('attendence/{attendence}','show');
    Route::post('attendence/edit/{attendence}','update');
    Route::delete('attendence/{attendence}','destroy');
    Route::post('attendence/create','store');
});
Route::controller(ExamResultController::class)->group(function(){
    Route::get('examResult','index');
    Route::get('examResult/{examResult}','show');
    Route::post('examResult/edit/{examResult}','update');
    Route::delete('examResult/{examResult}','destroy');
    Route::post('examResult/create','store');
});
Route::controller(BatchEnrollController::class)->group(function(){
    Route::get('batchEnroll','index');
    Route::get('batchEnroll/{batchEnroll}','show');
    Route::post('batchEnroll/edit/{batchEnroll}','update');
    Route::delete('batchEnroll/{batchEnroll}','destroy');
    Route::post('batchEnroll/create','store');
});
Route::controller(BatchEnrollRequestController::class)->group(function(){
    Route::get('batchEnrollRequest','index');
    Route::get('batchEnrollRequest/{batchEnrollRequest}','show');
    Route::post('batchEnrollRequest/edit/{batchEnrollRequest}','update');
    Route::delete('batchEnrollRequest/{batchEnrollRequest}','destroy');
    Route::post('batchEnrollRequest/create','store');
});