<?php

namespace App\Model\Managerial;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
