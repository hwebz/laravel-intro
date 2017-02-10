<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\NiceAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $actions = NiceAction::all();
        view()->share('actions', $actions);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
