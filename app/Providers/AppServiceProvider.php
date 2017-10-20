<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Needed on new versions of laravel with older versions of mysql
        // see https://github.com/laravel/docs/blob/5.4/migrations.md
        Schema::defaultStringLength(191);
    }
}
