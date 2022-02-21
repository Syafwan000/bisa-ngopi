<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/users', UserController::class);
Route::get('/dashboard/log-users', [LogUserController::class, 'index']);
Route::get('/users/export', [UserController::class, 'export'])->middleware('auth');

// Manager
Route::resource('/dashboard/menu', MenuController::class);
Route::get('/menu/export', [MenuController::class, 'export'])->middleware('auth');

// Profile
Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware('auth');
