<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

//Route::controller(JobController::class)
Route::get('/', [JobController::class,'index']);
