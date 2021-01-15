<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/student', [App\Http\Controllers\HomeController::class, 'addNew']);
Route::get('/course/list/{id}', [App\Http\Controllers\HomeController::class, 'listcourses']);
Route::get('/course/{id}', [App\Http\Controllers\HomeController::class, 'addCourse']);
Route::get('/edit_student/{id}', [App\Http\Controllers\HomeController::class, 'editStudent']);
Route::get('/delete_student/{id}', [App\Http\Controllers\HomeController::class, 'deleteStudent']);
Route::get('/delete_course/{id}/{uid}', [App\Http\Controllers\HomeController::class, 'deleteCourse']);
// Route::get('/course', [App\Http\Controllers\HomeController::class, 'adCourse']);

Route::post('/add/Student', [App\Http\Controllers\HomeController::class, 'addStudent']);
Route::post('/update/Student', [App\Http\Controllers\HomeController::class, 'updateStudent']);
Route::post('/add/course', [App\Http\Controllers\HomeController::class, 'courseData']);
