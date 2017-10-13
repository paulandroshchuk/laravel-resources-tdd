<?php

namespace App\Providers;

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
        $this->app->singleton(
            \App\Contracts\Interactions\Interaction\Interaction::class,
            \App\Interactions\Interaction\Interaction::class
        );

        $this->app->singleton(
            \App\Contracts\Interactions\Users\CreateUserInteraction::class,
            \App\Interactions\Users\CreateUserInteraction::class
        );

        $this->app->singleton(
            \App\Contracts\Interactions\Teams\CreateTeamInteraction::class,
            \App\Interactions\Teams\CreateTeamInteraction::class
        );
    }
}
