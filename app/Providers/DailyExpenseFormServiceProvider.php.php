<?php

namespace App\Providers;

use App\Vehicle_Type;
use Illuminate\Support\ServiceProvider;

class DailyExpenseFormServiceProvider extends ServiceProvider
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
        view()->composer('transportation/form', function($view){
          $view->with('vehicle_type_list', Vehicle_Type::all());
        });
    }
}
