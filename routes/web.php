<?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompanyController;
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

Route::get('/coba', function () {
    return view('admin.index');
});


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('job', JobController::class);
        Route::resource('apply', ApplyController::class);
        Route::resource('company', CompanyController::class);
        Route::resource('education', EducationController::class);

        // user
        Route::get('user/create', [UserController::class, 'create'])->name('users.create');


        Route::get('company/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::get('job/create', [JobController::class, 'create'])->name('jobs.create');

        Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])->name('transactions.changeStatus');
        Route::resource('transactions', TransactionController::class);
        Route::get('download/{file}', [ApplyController::class, 'download']);
        Route::get('cv/{id}', [ApplyController::class, 'opencv'])->name('apply.opencv');
        Route::get('apply/{id}/status/{status}', [ApplyController::class, 'changeStatus'])->name('apply.changeStatus');
    });