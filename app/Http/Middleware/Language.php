<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

class Language
{
    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }

    public function handle($request, Closure $next)
    {
        Session::put('item', 'first');
        Session::all();
        var_dump(Session::all());dd();
        if(in_array($request->segment(1), config('app.locales'))){
            $this->app->setLocale($request->segment(1));
        }else{
            $this->app->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
