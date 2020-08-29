<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Projects;

class ProjectQuery extends AbstractQuery
{
    public function __construct(Projects $tasks)
    {
        parent::__construct($tasks);
    }
}
