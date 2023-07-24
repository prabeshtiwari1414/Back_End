<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
 
/**
 * Bootstrap any application services.
 */

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    
    
}