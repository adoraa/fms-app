<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::get('/my_complaints', 'App\Http\Controllers\ComplaintController@my_complaint')->middleware(['auth'])->name('my_complaint');

Route::get('/room_facility_complaints', 'App\Http\Controllers\ComplaintController@room_facility_complaint')->middleware(['auth'])->name('room_facility_complaint');
Route::get('/unit_complaints', 'App\Http\Controllers\ComplaintController@unit_complaints')->middleware(['auth'])->name('unit_complaints');


Route::resource('facility', 'App\Http\Controllers\FacilityController');


Route::resource('category', 'App\Http\Controllers\CategoryController');


Route::resource('role', 'App\Http\Controllers\RoleController');


Route::resource('utility', 'App\Http\Controllers\UtilityController');


Route::resource('material', 'App\Http\Controllers\MaterialController');


Route::resource('unit', 'App\Http\Controllers\UnitController');


Route::resource('job', 'App\Http\Controllers\JobController');


Route::resource('room', 'App\Http\Controllers\RoomController');


Route::resource('complaint', 'App\Http\Controllers\ComplaintController');


require __DIR__.'/auth.php';
