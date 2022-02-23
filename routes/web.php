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

// Auth
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout']);

// Admin
Route::resource('/dashboard/users', UserController::class);
Route::get('/dashboard/log-users', [LogUserController::class, 'index']);
Route::get('/users/export/excel', [UserController::class, 'exportExcel'])->middleware('auth');
Route::get('/users/export/pdf', [UserController::class, 'exportPDF'])->middleware('auth');

// Manager
Route::resource('/dashboard/menu', MenuController::class);
Route::get('/menu/export/excel', [MenuController::class, 'exportExcel'])->middleware('auth');
Route::get('/menu/export/pdf', [MenuController::class, 'exportPDF'])->middleware('auth');
Route::get('/dashboard/transaksi', [MenuController::class, 'transaksi']);
Route::get('/transaksi/export/excel', [MenuController::class, 'transaksiExcel']);
Route::get('/transaksi/export/pdf', [MenuController::class, 'transaksiPDF']);

// Cashier
Route::resource('/dashboard/cashier', TransaksiController::class);
Route::get('/cashier/export/excel', [TransaksiController::class, 'exportExcel']);
Route::get('/cashier/export/pdf', [TransaksiController::class, 'exportPDF']);