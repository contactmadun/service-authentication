<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

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

// Route::get('/user', [UserController::class, 'index']);
Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);
Route::apiResource('/role', App\Http\Controllers\Api\RoleController::class);
