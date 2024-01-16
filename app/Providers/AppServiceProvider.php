<?php

namespace App\Providers;

use Http;
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
        // Http::globalRequestMiddleware(function ($req) {
        //     return $req->withHeader('X-Token', '12345');
        // });

        // Http::globalResponseMiddleware(function ($res) {
        //     return $res->withHeader('X-Token', 'test in response header');
        // });
    }
}
