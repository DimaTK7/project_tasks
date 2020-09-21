<?php

namespace App\Model\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Traits\HasRolesAndPermissions;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string status
 * @property string password
 */
class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    protected $fillable = [
        'name', 'email', 'password', 'status', 'verify_token'
    ];

    protected $hidden = [
        'password', 'remember_token', ''
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'verify_token' => Str::uuid(),
            'status' => User::STATUS_WAIT,
        ]);
    }

    public static function new(string $name, string $email): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => Str::random(),
            'status' => User::STATUS_WAIT,
        ]);
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function verify(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already verified');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
    }

}
