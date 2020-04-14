<?php

namespace App\Providers;
use View;
use Carbon\Carbon;
use Auth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        $age = Carbon::createFromDate(1993,9,22)->age;
        View::share('age', $age);
        View::share('monNom', 'Stephane');
        // // View::composer('*', function($view){
        // //     $view->with('auth', Auth::user());
        // });


        Schema::defaultStringLength(191);
    }
}

