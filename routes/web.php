<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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

Route::controller(LoginController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });
    Route::get('/logout', 'logout')->middleware('auth');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/dashboard/profile', 'index')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('/dashboard/users', UserController::class);
        Route::get('/users/export/excel', 'exportExcel');
        Route::get('/users/export/pdf', 'exportPDF');
    });
});

Route::controller(LogUserController::class)->group(function () {
    Route::get('/dashboard/log-users', 'index')->middleware('auth', 'admin');
});

Route::controller(MenuController::class)->group(function () {
    Route::middleware(['auth', 'manager'])->group(function () {
        Route::resource('/dashboard/menu', MenuController::class);
        Route::get('/menu/export/excel', 'exportExcel');
        Route::get('/menu/export/pdf', 'exportPDF');
        Route::get('/dashboard/transaksi', 'transaksi');
        Route::get('/transaksi/export/excel', 'transaksiExcel');
        Route::get('/transaksi/export/pdf', 'transaksiPDF');
    });
});

Route::controller(TransaksiController::class)->group(function () {
    Route::middleware(['auth', 'cashier'])->group(function () {
        Route::resource('/dashboard/cashier', TransaksiController::class);
        Route::get('/cashier/export/excel', 'exportExcel');
        Route::get('/cashier/export/pdf', 'exportPDF');
    });
});