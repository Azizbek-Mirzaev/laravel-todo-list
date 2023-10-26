<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//for example use middleware('auth') or middleware('guest');
Route::get('admin',[MainController::class,'index'])->name('admin')
->middleware('auth');//Admin panelga Auth bo'lganlar kirish uchun ruxsat

Route::get('admin/user',[UserController::class,'index'])->name('admin.user.index')
->middleware('auth');
//registration users kimga dostup bor yoki yoq

Route::get('login',[LoginController::class,'showLoginForm'])->name('showLoginForm')
->middleware('guest');//Login panelga Auth bo'lganlarga kirish mumkin emas faqat Guest uchun ruxsat

Route::post('login',[LoginController::class,'login'])->name('login')
->middleware('guest');

Route::get('logout',[LoginController::class,'logout'])->name('logout')
->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////
Route::get('register',[RegisterController::class,'showRegisterForm'])->name('showRegisterForm')
->middleware('guest');
Route::post('register',[RegisterController::class,'register'])->name('registerUser')
->middleware('guest');

