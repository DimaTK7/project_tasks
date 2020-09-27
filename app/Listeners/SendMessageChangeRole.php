<?php

namespace App\Listeners;

use App\Events\SendMessageRole;
use App\Mail\ChangeRole;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMessageChangeRole
{
    /**
     * Handle the event.
     *
     * @param  SendMessageRole  $event
     * @return void
     */
    public function handle(SendMessageRole $event)
    {
        Mail::to(Auth::user()->email)->send(new ChangeRole());
    }
}
