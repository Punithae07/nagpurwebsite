<?php

namespace App\Providers;

use App\Support\SiteCms;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('site.*', function ($view) {
            $view->with(SiteCms::shared());
        });
    }
}