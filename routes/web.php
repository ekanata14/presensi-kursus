<?php

use App\Models\Students;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SearchController;
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
    return view('dashboard.index',[
        'title' => 'Home'
    ]);
})->middleware('auth');

// Dashboard Student Route
Route::resource('/dashboard/students', StudentsController::class);
// Dashboard Course Route
Route::get('/dashboard/course/{course:id_students}', [CourseController::class, 'show']);
// Route::get('/dashboard/course/{course:id}/edit', [CourseController::class], 'edit');
Route::resource('/dashboard/course' , CourseController::class);

// Dashboard Search Route
Route::get('/dashboard/search', [SearchController::class, 'index']);

// Auth Routes
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});
 