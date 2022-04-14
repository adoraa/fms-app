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

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('/my_complaints', 'App\Http\Controllers\ComplaintController@my_complaint')->name('my_complaint');

    Route::get('/room_complaints', 'App\Http\Controllers\ComplaintController@room_complaints')->name('room_complaint');
    Route::get('/facility_complaints', 'App\Http\Controllers\ComplaintController@facility_complaints')->name('facility_complaint');
    Route::get('/unit_complaints', 'App\Http\Controllers\ComplaintController@unit_complaints')->name('unit_complaints');
    Route::get('/assigned_complaints', 'App\Http\Controllers\ComplaintController@assigned_complaints')->name('assigned_complaints');
    Route::get('/job_assigned', 'App\Http\Controllers\ComplaintController@job_assigned')->name('job_assigned');

    Route::get('/approve_complaint/{id}', 'App\Http\Controllers\ComplaintController@approve_complaints')->name('complaint.approve');
    Route::get('/time_reached/{id}', 'App\Http\Controllers\ComplaintController@time_reached')->name('time_reached');
    Route::get('/job_completed/{id}', 'App\Http\Controllers\ComplaintController@job_completed')->name('job_completed');
    Route::get('/review/{id}', 'App\Http\Controllers\ComplaintController@review')->name('review');
    Route::get('/view_review/{id}', 'App\Http\Controllers\ComplaintController@view_review')->name('view_review');

    Route::get('/track_complaint/{id}', 'App\Http\Controllers\ComplaintController@track_complaints')->name('complaint.track');
    Route::get('/material_approval', 'App\Http\Controllers\ComplaintController@material_approval')->name('material_approval');
    Route::get('/approve_material/{id}', 'App\Http\Controllers\ComplaintController@approve_material')->name('approve_material');
    
    Route::get('/assign_technician_complaint/{id}', 'App\Http\Controllers\ComplaintController@assign_technician')->name('complaint.assign_technician');
    
    Route::get('/final_approval/{id}', 'App\Http\Controllers\ComplaintController@final_approval')->name('complaint.final_approval');

    Route::get('/assign_to_unit/{id}', 'App\Http\Controllers\ComplaintController@assign_to_unit')->name('complaint.assign_to_unit');
    Route::post('/post_to_unit/{id}', 'App\Http\Controllers\ComplaintController@post_to_unit')->name('complaint.post_to_unit');
    
    Route::post('/post_technician/{id}', 'App\Http\Controllers\ComplaintController@post_technician')->name('complaint.post_technician');
    Route::post('/post_material/{id}', 'App\Http\Controllers\ComplaintController@post_material')->name('complaint.post_material');
    Route::post('/post_review/{id}', 'App\Http\Controllers\ComplaintController@post_review')->name('complaint.post_review');

    Route::resource('facility', 'App\Http\Controllers\FacilityController');


    Route::resource('category', 'App\Http\Controllers\CategoryController');


    Route::resource('role', 'App\Http\Controllers\RoleController');


    Route::resource('utility', 'App\Http\Controllers\UtilityController');


    Route::resource('material', 'App\Http\Controllers\MaterialController');


    Route::resource('job', 'App\Http\Controllers\JobController');


    Route::resource('room', 'App\Http\Controllers\RoomController');


    Route::resource('complaint', 'App\Http\Controllers\ComplaintController');

});

require __DIR__.'/auth.php';
