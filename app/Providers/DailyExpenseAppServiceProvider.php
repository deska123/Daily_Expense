<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class DailyExpenseAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $page = '';

        if(Request::segment(1) == 'expense') {
          $page = 'expense';
        }

        if(Request::segment(1) == 'transportation') {
          $page = 'transportation';
        }

        if(Request::segment(1) == 'users') {
          $page = 'users';
        }

        if(Request::segment(1) == 'vehicle_type') {
          $page = 'vehicle_type';
        }

        view()->share('page', $page);
    }
}
