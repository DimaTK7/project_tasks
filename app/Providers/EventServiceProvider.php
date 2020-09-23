<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\SendMessageRole;
use App\Listeners\SendMessageChangeRole;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendMessageRole::class => [
            SendMessageChangeRole::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
