<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Project;

class ProjectQuery extends AbstractQuery
{
    public function __construct(Project $tasks)
    {
        parent::__construct($tasks);
    }
}
