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
    return view('user.index');
});


Route::get('/alumni', 'App\Http\Controllers\User\AlumniController@index')->name('alumni');
Route::post('/alumni/save', [App\Http\Controllers\User\AlumniController::class, 'store'])->name('save.alumni');



Route::get('/employer', 'App\Http\Controllers\User\EmployerSurveyController@index')->name('employer');
Route::post('/employer/survey/save', [App\Http\Controllers\User\EmployerSurveyController::class, 'store'])->name('save.employer_survey');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('auth.login');
});


Route::get('/admin/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/alumni', [App\Http\Controllers\admin\AlumniController::class, 'index'])->name('alumni.index');
Route::post('/admin/alumni/get/report', [App\Http\Controllers\admin\AlumniController::class, 'getReport'])->name('get.report');

Route::get('/admin/employer', [App\Http\Controllers\admin\EmployerController::class, 'index'])->name('employer.index');
Route::post('/admin/employer/get/report', [App\Http\Controllers\admin\EmployerController::class, 'getReport'])->name('get.report');
