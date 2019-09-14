<?php

namespace App\Providers;

use App\Expense;
use App\Goods;
use App\Others;
use App\Shops;
use App\Shopping;
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
        $expenses = Expense::all();

        $categoryCollection = [
          '',
          'Transportation',
          'Shopping',
          'Others'
        ];
        $view->with('category_list', $categoryCollection);
        $view->with('others_list', Others::all());

        $shoppings = Shopping::all();
        $view->with('shoppings_list', $shoppings->whereNotIn('id', $expenses->pluck('shoppingId')));

        $others = Others::all();
        $view->with('others_list', $others->whereNotIn('id', $expenses->pluck('othersId')));

        $view->with('transportation_list', Transportation::all());
      });

      view()->composer('shopping/form', function($view){
        $view->with('goods_list', Goods::all());
        $view->with('shops_list', Shops::all());
      });

      view()->composer('transportation/form', function($view){
        $view->with('vehicle_type_list', Vehicle_Type::all());
      });
    }
}
