<?php

namespace App\Http\Services\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Model\Admin\User;
use Illuminate\Events\Dispatcher;
use App\Mail\Auth\VerifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Mail\Mailer;

class RegisterService
{
    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function register($data): void
    {
        $user = User::register(
            $data['name'],
            $data['email'],
            $data['password']
        );

        $this->mailer->to($user->email)->send(new VerifyMail($user));
        $this->dispatcher->dispatch(new Registered($user));
    }

    public function verify($id): void
    {
        $user = User::findOrFail($id);
        $user->verify();
    }
}
