<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Language
{
    // TODO:: prefix for url
    public static function getLocale()
    {
        $locale = session('my_locale');

        if (in_array($locale, config('app.locales'))) {
            return $locale;
        } else {
            return null;
        }
    }

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
