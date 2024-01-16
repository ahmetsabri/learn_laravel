<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ShowProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/post/{post:slug}', ShowPostController::class);
Route::get('/product/{product:url_slug}', ShowProductController::class);
