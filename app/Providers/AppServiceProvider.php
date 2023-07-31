<?php

namespace App\Providers;

use App\Http\Middleware\CheckUserRole;
use App\Role\RoleChecker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use PHPUnit\TextUI\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CheckUserRole::class, function (App $app){
            return new CheckUserRole($app->make(RoleChecker::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
