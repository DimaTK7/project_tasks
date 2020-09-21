<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Language
{
    public function handle($request, Closure $next)
    {
        if (in_array(session('my_locale'), config('app.locales'))) {
            App::setLocale(session('my_locale'));
        } else {
            App::setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
