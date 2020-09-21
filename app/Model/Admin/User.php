<?php

namespace App\Model\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string status
 * @property string password
 */
class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'status', 'verify_token', 'role'
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

    public function changeRole($role): void
    {
        if (!\in_array($role, [self::ROLE_USER, self::ROLE_ADMIN], true)) {
            throw new \InvalidArgumentException('Undefined role ' . $role);
        }
        if ($this->role === $role) {
            throw new \DomainException('Role is already assigned');
        }
        $this->update(['role' => $role]);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
