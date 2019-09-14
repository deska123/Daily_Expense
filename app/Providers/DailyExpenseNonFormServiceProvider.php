<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DailyExpenseNonFormServiceProvider extends ServiceProvider
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
        view()->composer('expense/summary', function($view){
          $years = array();
          $years[] = '';
          for($year = date("Y"); $year >= (date("Y") - 10); $year--) {
              $years[$year] = $year;
          }

          $months = array(
              "" => "",
              "01" => "January",
              "02" => "February",
              "03" => "March",
              "04" => "April",
              "05" => "May",
              "06" => "June",
              "07" => "July",
              "08" => "August",
              "09" => "September",
              "10" => "October",
              "11" => "November",
              "12" => "December",
          );

          $view->with('years', $years);
          $view->with('months', $months);
        });
    }
}
