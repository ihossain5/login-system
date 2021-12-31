<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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


Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/sing-in',[LoginController::class,'signIn'])->name('sign.in');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/sing-up',[RegisterController::class,'signUp'])->name('sign.up');


Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/verify-email/{user}',[DashboardController::class,'verifyEmail'])->name('verify.email');


Route::get('/forgot-password',[ForgotPasswordController::class,'index'])->name('forgot.password');
Route::post('/reset-password',[ForgotPasswordController::class,'sendForgotPasswordNotification'])->name('forgot.password.notify');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/recover-password',[ForgotPasswordController::class,'recoverPassword'])->name('password.reset');