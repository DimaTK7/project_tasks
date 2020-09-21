<?php

namespace App\Providers;

use App\Model\Admin\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Model\Permission;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
