<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;



Route::post('import', [CustomerController::class, 'import']);


