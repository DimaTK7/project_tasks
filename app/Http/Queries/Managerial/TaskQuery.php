<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Task;
use Illuminate\Support\Facades\DB;

class TaskQuery extends AbstractQuery
{
    public function __construct(Task $tasks)
    {
        parent::__construct($tasks);
    }

    public function status($project, $status)
    {
        return Task::where([
            ['status', $status],
            ['project_id', $project],
        ])->paginate(10);
    }

}
