<?php

namespace App\Providers;

use App\Transportation;
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
      view()->composer('expense/form', function($view){
        $categoryCollection = [
          '',
          'Transportation',
          'Shopping',
          'Others'
        ];
        $view->with('category_list', $categoryCollection);
        $view->with('transportation_list', Transportation::all());
      });

      view()->composer('transportation/form', function($view){
        $view->with('vehicle_type_list', Vehicle_Type::all());
      });
    }
}
