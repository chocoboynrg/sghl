<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Examen;
use App\Patient;
use App\Type_examen;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    View::composer(['examens.profile','examens.all'] ,function($view){
        $facture = Examen::where('id',138)
        ->with('type_examen')->first()
        ->with('patient')->first();
        $view->with('facture', $facture);

        //$view->with('type', Type_examen::orderBy('created_at')->get());
        // $patient = Patient::where('id',2)
        // ->with('examen')->first();
        // $view->with('patient', $patient);
        
    });
    }

 
    
    // 'App\Http\ViewComposers\ProfileComposer'
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
