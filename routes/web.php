<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::controller(UserController::class)->group(function() {
    Route::get('/', 'login')->name('login');
    Route::post('/process/login', function(Request $request) {
        return app()->call('App\Http\Controllers\UserController@processLogin', ['request' => $request, 'role' => 1]);
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::controller(UserController::class)->group(function() {
        Route::get('/admin', 'admin.index');
    });

    Route::get('/admin', function () {
        $firstName = Auth::user()->first_name;

        Alert::toast('Welcome, ' . $firstName . '!', 'Toast Type');
        return view('admin.index');
    });
});