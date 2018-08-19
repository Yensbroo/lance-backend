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
        \View::composer('projects.create', function($view) {
            $view->with('categories', \App\Category::all());
        });

        \View::composer('users.index', function($view) {
            $view->with('roles', \App\Role::all());
        });

        \View::composer('users.create', function($view) {
            $view->with('roles', \App\Role::all());
        });

        \View::composer('users.show', function($view) {
            $view->with('roles', \App\Role::all());
        });
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
