<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('formatName', function (array $data) {

            $data = collect($data)->transform(function($value){
                $value['username'] = ucfirst($value['username']);
                return $value;
            });

            return Response::make($data);
        });
    }
}
