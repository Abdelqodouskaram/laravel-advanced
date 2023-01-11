<?php

namespace App\Providers;

use App\Notifications\DummyEmailNotification;
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
        $this->app->bind(DummyEmailNotification::class, function ($app) {
            return new DummyEmailNotification('Hello World from service container');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
