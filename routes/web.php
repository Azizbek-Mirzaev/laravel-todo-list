<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Tasks\TaskController;

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
/////////////////////////////////////////////////////////////////////////////////////
Route::get('admin',[MainController::class,'index'])
->name('admin')
->middleware('auth');//Admin panelga Auth bo'lganlar kirish uchun ruxsat
/////////////////////////////////////////////////////////////////////////////////////
Route::get('tasks',[TaskController::class,'index'])
->name('tasks.index')
->middleware('auth');

Route::get('tasks/create',[TaskController::class,'create'])
->name('tasks.create')
->middleware('auth');

Route::post('tasks/store', [TaskController::class, 'store'])
->middleware('auth')
->name('tasks.store');

Route::post('tasks/update/{id}', [TaskController::class, 'update'])
->middleware('auth')
->name('tasks.update');

Route::get('tasks/edit/{id}', [TaskController::class, 'edit'])
->middleware('auth')
->name('tasks.edit');

Route::get('tasks/show/{id}', [TaskController::class, 'show'])
->middleware('auth')
->name('tasks.show');

Route::get('tasks/delete/{id}', [TaskController::class, 'delete'])
->middleware('auth')
->name('tasks.delete');

Route::post('tasks/done/{id}', [TaskController::class, 'done'])
->middleware('auth')
->name('tasks.done');

/////////////////////////////////////////////////////////////////////////////////////
Route::get('admin/user',[UserController::class,'index'])
->name('admin.user.index')
->middleware('auth');

Route::get('admin/user/edit/{id}',[UserController::class,'edit'])
->name('admin.user.edit')
->middleware('auth');

Route::post('admin/user/update/{id}',[UserController::class,'update'])
->name('admin.user.update')
->middleware('auth');

Route::get('admin/user/delete/{id}',[UserController:: class, 'delete'])
->name('admin.user.delete')
->middleware('auth');

Route::get('admin/user/show/{id}',[UserController:: class, 'show'])
->name('admin.user.show')
->middleware('auth');
//Route::get('admin/user/{id}',[UserController::class,'index'])->name('admin.user.edit')
//->middleware('auth');
//registration users kimga dostup bor yoki yoq
/////////////////////////////////////////////////////////////////////////////////////
Route::get('login',[LoginController::class,'showLoginForm'])
->name('showLoginForm')
->middleware('guest');//Login panelga Auth bo'lganlarga kirish mumkin emas faqat Guest uchun ruxsat

Route::post('login',[LoginController::class,'login'])
->name('login')
->middleware('guest');

Route::get('logout',[LoginController::class,'logout'])
->name('logout')
->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////
Route::get('register',[RegisterController::class,'showRegisterForm'])
->name('showRegisterForm')
->middleware('guest');

Route::post('register',[RegisterController::class,'register'])
->name('registerUser')
->middleware('guest');

