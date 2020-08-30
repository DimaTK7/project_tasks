<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Tasks;
use Illuminate\Support\Facades\DB;

class TaskQuery extends AbstractQuery
{
    public function __construct(Tasks $tasks)
    {
        parent::__construct($tasks);
    }

    public function status($project, $status)
    {
        return Tasks::where([
            ['status', $status],
            ['project_id', $project],
        ])->paginate(10);
    }

    public function new()
    {
        return Tasks::where('status', 'new')->paginate(10);
    }

    public function progress()
    {
        return Tasks::where('status', 'progress')->paginate(10);
    }

    public function done()
    {
        return Tasks::where('status', 'done')->paginate(10);
    }
}
