<?php

namespace App\Model\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const STATUS_WAIT = 'wait';
    const STATUS_ACTIVE = 'active';

    protected $fillable = [
        'name', 'email', 'password', 'status', 'verify_token',
    ];

    protected $hidden = [
        'password', 'remember_token', ''
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
