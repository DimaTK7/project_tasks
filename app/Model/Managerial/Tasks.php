<?php

namespace App\Model\Managerial;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'title', 'status', 'description', 'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
