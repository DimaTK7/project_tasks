<?php

namespace App\Model\Managerial;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
