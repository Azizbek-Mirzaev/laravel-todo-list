<?php

use App\Http\Controllers\Api\TaskApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('tasks', [TaskApiController::class, 'index'])->name('api.tasks.index');
Route::post('tasks/store', [TaskApiController::class, 'store'])->name('api.tasks.store');
