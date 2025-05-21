<?php

use Illuminate\Http\Request;
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
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('/', [\App\Http\Controllers\CreateUserController::class, 'create']);
        Route::get('/', [\App\Http\Controllers\ListAllUsersController::class, 'listAllUsers']);
        Route::put('{id}', [\App\Http\Controllers\UpdateUserController::class, 'update']);
        Route::get('{id}', [\App\Http\Controllers\FindUserByIDController::class, 'findUserByID']);
        Route::delete('{id}', [\App\Http\Controllers\DeleteUserController::class, 'deleteUser']);
    });
});
