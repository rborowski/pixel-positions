<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

//Route::controller(JobController::class)
Route::controller(JobController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::post('/jobs', 'store')->middleware('auth');
});

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class,'create']);
    Route::post('/register', [RegisteredUserController::class,'store']);

    Route::get('/login', [SessionController::class,'create']);
    Route::post('/login', [SessionController::class,'store'])->name('login');
});

Route::delete('/logout', [SessionController::class,'destroy'])->middleware('auth');
