<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'status', 'description', 'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
