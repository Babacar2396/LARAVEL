<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Views;

class AppServiceProvider extends ServiceProvider

{
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
        /// Déterminez ici la logique pour obtenir l'année scolaire en cours
    $anneeScolaireEnCours = '2021-2022';

    // Partager la variable avec toutes les vues
    // Views::share('anneeScolaireEnCours', $anneeScolaireEnCours);
    }
}
