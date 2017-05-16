<?php

namespace App\Providers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
////        Validator::extend('check_time', function ($attribute, $value, $parameters, $validator) {
////            if (strtotime($this->input('arrived_to_client_at') <= strtotime($this->input('left_terminal_at'))))
////                return false;
////
////            return true;
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
