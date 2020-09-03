<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\Localization\Localization;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("Localization", Localization::class);
    }
}
