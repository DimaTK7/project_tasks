<?php

namespace App\Model;

use App\Model\Admin\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsToMany(
            User::class,
            'role_user',
            'role_id',
            'user_id'
        );
    }

    public function isAdmin()
    {

    }

    public function isModerator()
    {

    }
}
