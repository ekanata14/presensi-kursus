<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});

// Dashboard Student Route
Route::resource('/dashboard/students', StudentsController::class);

// Dashboard Course Route
Route::resource('/dashboard/course' , CourseController::class);

// Auth Routes
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'index');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});
