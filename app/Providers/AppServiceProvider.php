<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\NiceAction;
use DB;

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
        // $actions = NiceAction::orderBy('niceness', 'desc')->get();
        // $actions = DB::table('nice_actions')->get();
        // $actions = NiceAction::where('name', 'Greet')->get();
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
