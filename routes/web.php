<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CashierMiddleware;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/process/login/admin', function (Request $request) {
        return app()->call('App\Http\Controllers\UserController@processLogin', ['request' => $request, 'role' => 1]);
    });
    Route::post('/process/login/cashier', function (Request $request) {
        return app()->call('App\Http\Controllers\UserController@processLogin', ['request' => $request, 'role' => 2]);
    });
    Route::get('/process/logout', 'proccesLogout');
});

//make routes for admincontroller and cashier controller

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin', 'index');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/admin/products', 'index');
            Route::get('/admin/product/edit/{id}', 'edit');
            Route::put('/admin/product/update/{id}', 'update');
            Route::delete('/admin/product/destroy/{id}', 'destroy');
            Route::post('/admin/product/store', 'store');
        });

        Route::controller(SupplierController::class)->group(function () {
            Route::get('/admin/suppliers', 'index');
            Route::get('/admin/supplier/edit/{id}', 'edit');
            Route::post('/admin/supplier/store', 'store');
            Route::put('/admin/supplier/update/{id}', 'update');
            Route::delete('/admin/supplier/destroy/{id}', 'destroy');
        });

        Route::controller(TransactionsController::class)->group(function () {
            Route::get('/admin/transaction/show/{id}', 'show');
            Route::get('/admin/transactions', 'index');
            Route::get('/admin/transaction/edit/{id}', 'edit');
            Route::put('/admin/transaction/update/{id}', 'update');
            Route::delete('/admin/transaction/destroy/{id}', 'destroy');
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('/admin/users', 'index');
            Route::get('/admin/user/edit/{id}', 'edit');
            Route::put('/admin/user/update/{id}', 'update');
            Route::delete('/admin/user/destroy/{id}', 'destroy');
        });
    });
});


Route::group(['middleware' => 'auth'], function () {
    Route::middleware('cashier')->group(function () {
        Route::controller(CashierController::class)->group(function () {
            Route::get('/cashier', 'index');
            Route::put('/cashier/profile/update/{id}', 'update')->name('cashier.profile.update');
        });

        Route::controller(CartController::class)->group(function () {
            Route::post('/cashier/add-to-cart', 'store');
            Route::put('/cashier/edit-qty/{id}', 'update');
            Route::delete('/cashier/remove-item/{id}', 'destroy');
        });

        Route::controller(TransactionsController::class)->group(function () {
            Route::post('/cashier/create-transaction', 'store');
        });
    });
});
