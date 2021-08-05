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
    if (Auth::check()) {
        return redirect(\route('home'));
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/teachers', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teachers');
Route::get('/teachers/create', [\App\Http\Controllers\CreateTeacherController::class, 'index'])->name('create-teacher');
Route::post('/teachers/create', [\App\Http\Controllers\CreateTeacherController::class, 'create'])->name('create-teacher-post');
Route::get('/teachers/{id}/update', [\App\Http\Controllers\UpdateTeacherController::class, 'index'])->name('update-teacher');
Route::post('/teachers/{id}/update', [\App\Http\Controllers\UpdateTeacherController::class, 'update'])->name('update-teacher-post');
