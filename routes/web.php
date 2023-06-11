<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavePropertyController;
use App\Models\Type;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $types = Type::all();
    return view('properties', compact('types'));
});

Route::post('save-property', SavePropertyController::class)->name('save_property');

