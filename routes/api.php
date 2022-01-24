<?php

use App\Http\Controllers\API\ApplyController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\KostController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\FacilitiesController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('checkout', [TransactionController::class, 'checkout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
});


Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);
Route::post('signup', [UserController::class, 'signup']);




Route::get('kost', [KostController::class, 'all']);
Route::get('room', [RoomController::class, 'all']);
Route::get('facilities', [FacilitiesController::class, 'all']);
