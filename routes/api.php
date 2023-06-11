<?php

use App\Http\Controllers\LearnController;
use App\Http\Controllers\UploadFromUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [LearnController::class,'index']);
Route::post('/upload-from-url', UploadFromUrlController::class);
