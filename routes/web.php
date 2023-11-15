<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ->middleware('auth')
Route::get('error', function () {
    return view('Admin.error_page');
});

Route::prefix('backend')->middleware(['auth','checkSubscription'])->group(function () {

    Route::get('/', function () {
        return view('Backend.admin_layout');
    });

    Route::resource('classes', 'App\Http\Controllers\Backend\ClassController');
    Route::resource('marksheets', 'App\Http\Controllers\Backend\MarksSheetController');
    Route::get('get-subject-through-class/{class_id}', 'App\Http\Controllers\Backend\MarksSheetController@getSubjectThroughClass');
    Route::get('get-student-through-class/{class_id}', 'App\Http\Controllers\Backend\MarksSheetController@getStudentsThroughClass');
});




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('dashboard', function () {
    return view('Admin.Dashboard.dashboard');
});

Route::get('create-class', function () {
    return view('Admin.Class.create_class');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
