<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

        $githubKey = config('services.github.api_key',function(){
            throw new Exception("Github key not found");

        });

        return $githubKey;

});
