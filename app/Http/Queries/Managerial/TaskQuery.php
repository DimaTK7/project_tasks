<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Tasks;

class TaskQuery extends AbstractQuery
{
    public function __construct(Tasks $tasks)
    {
        parent::__construct($tasks);
    }
}
