<?php

namespace App\Providers;

use App\Helpers\Helpers;
use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    private function responseMacros(){

        Response::macro('success', function ($message,array $data = null, $httpCode= 200) {
            return Response::json([
                'success'=>true,
                'message'=>$message,
                'data'=>$data
            ],$httpCode);
        });



        Response::macro('error', function ($message,array $data = null, $httpCode= 400) {
            return Response::json([
                'success'=>true,
                'message'=>$message,
                'data'=>$data
            ],$httpCode);
        });


    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->responseMacros();

    }
}

