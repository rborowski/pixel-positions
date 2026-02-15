<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/create', 'create')->middleware('auth', 'verified');
    Route::post('/jobs', 'store')->middleware('auth', 'verified');
    Route::get('/jobs/{job}', 'show');
});

Route::get('/tags', TagController::class);
Route::get('/salaries', SalaryController::class);
Route::get('/employers', EmployerController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class,'create']);
    Route::post('/register', [RegisteredUserController::class,'store']);

    Route::get('/login', [SessionController::class,'create']);
    Route::post('/login', [SessionController::class,'store'])->name('login');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
      ->name('verification.notice');
  Route::post('/email/verification-notification', [EmailVerificationController::class, 'send'])
      ->middleware(['throttle:6,1'])
      ->name('verification.send');
});
  Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
      ->middleware(['signed'])
      ->name('verification.verify');

Route::delete('/logout', [SessionController::class,'destroy'])->middleware('auth');
