<?php

namespace App\Providers;

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
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        Blade::directive('role', function ($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) :";
        });

        Blade::directive('endrole', function ($role){
            return "<?php endif; ?>";
        });
    }
}
