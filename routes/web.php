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



Route::resource('facility', 'App\Http\Controllers\FacilityController');


Route::resource('category', 'App\Http\Controllers\CategoryController');


Route::resource('role', 'App\Http\Controllers\RoleController');


Route::resource('utility', 'App\Http\Controllers\UtilityController');


Route::resource('material', 'App\Http\Controllers\MaterialController');


Route::resource('unit', 'App\Http\Controllers\UnitController');


Route::resource('room', 'App\Http\Controllers\RoomController');


Route::resource('complaint', 'App\Http\Controllers\ComplaintController');


require __DIR__.'/auth.php';
