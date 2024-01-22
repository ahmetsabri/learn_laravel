<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return User::search($request->query('q'))->get();
});

