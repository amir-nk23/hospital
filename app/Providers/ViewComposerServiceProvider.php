<?php

namespace App\Providers;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//                View::share('logo',Helpers::setting('img'));
        View::composer('layout.aside',function ($view){

            $logo = Helpers::setting('img');

            $view->with(compact('logo'));

        });

    }
}
