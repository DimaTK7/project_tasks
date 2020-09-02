<?php

namespace App\Http\Queries\Admin;

use App\Model\Admin\Project;

class ProjectQuery extends AbstractQuery
{
    public function __construct(Project $tasks)
    {
        parent::__construct($tasks);
    }
}
