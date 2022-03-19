<?php

use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', [UserController::class, 'index'])->middleware('auth:api');
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth:api');
Route::post('/users', [UserController::class, 'create'])->middleware('auth:api');
Route::put('/users', [UserController::class, 'update'])->middleware('auth:api');
Route::delete('/users/{id}', [UserController::class, 'delete'])->middleware('auth:api');

Route::get('/announcements', [AnnouncementController::class, 'index'])->middleware('auth:api');
Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->middleware('auth:api');
Route::post('/announcements', [AnnouncementController::class, 'create'])->middleware('auth:api');
Route::put('/announcements', [AnnouncementController::class, 'update'])->middleware('auth:api');
Route::delete('/announcements/{id}', [AnnouncementController::class, 'delete'])->middleware('auth:api');

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->middleware('auth:api');
