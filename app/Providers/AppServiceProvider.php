<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

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
//        Filament::serving(function () {
//            if (auth()->check() && auth()->user()->hasRole('admin')) {
//                // Admin dapat mengakses semuanya
//                return true;
//            } elseif (auth()->check() && auth()->user()->hasRole('guru')) {
//                // Guru hanya dapat mengakses panel tertentu
//                return true;
//            }
//
//            abort(403);
//        });
    }
}
