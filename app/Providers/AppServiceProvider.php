<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Dil;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $categorys = Category::all();
//        View::composer(['front.layouts.include.header', 'back.layouts.include.main-sidebar'], function ($view) use ($categorys) {
//            $view->with('categorys', $categorys);
//        });


        $diller = Dil::all();
        $baskets = Cart::content();

        View::share([
            'langs' => $diller,
            'baskets' => $baskets,
            'categorys' => $categorys
        ]);

    }
}
