<?php

namespace App\Model;

use App\Model\Admin\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function isAdmin()
    {
        return true;
    }

    public function isModerator()
    {

    }
}
