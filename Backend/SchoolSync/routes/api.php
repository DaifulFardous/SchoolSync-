<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\GuardianController;
use App\Http\Controllers\Auth\InstructorController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//user_routes
Route::post('registration',[UserController::class,'registration']);
Route::post('login',[UserController::class,'login']);
Route::group(['middleware' => ['auth:sanctum','abilities:user']], function() {
    Route::get('logout',[UserController::class,'logout']);
    Route::get('user/details',[UserController::class,'getDetails']);
    Route::get('enroll/course/{id}',[EnrollmentController::class,'enroll']);
});

//instructor_routes
Route::post('instructor/registration',[InstructorController::class,'registration']);
Route::post('instructor/login',[InstructorController::class,'login']);
Route::group(['middleware' => ['auth:sanctum','abilities:instructor']], function() {
    Route::get('instructor/details',[InstructorController::class,'getDetails']);
    Route::post('create/course',[CourseController::class,'create']);
});

//admin_routes
Route::post('admin/registration',[AdminController::class,'registration']);
Route::post('admin/login',[AdminController::class,'login']);
Route::group(['middleware' => ['auth:sanctum','abilities:admin']], function() {
    Route::get('admin/details',[AdminController::class,'getDetails']);
    Route::post('create/category',[CategoryController::class,'create']);
    Route::get('course/status/{id}',[CourseController::class,'status']);
});


//guardian_routes
Route::post('guardian/registration',[GuardianController::class,'registration']);
Route::post('guardian/login',[GuardianController::class,'login']);
Route::group(['middleware' => ['auth:sanctum','abilities:guardian']], function() {
    Route::get('guardian/details',[GuardianController::class,'getDetails']);
});