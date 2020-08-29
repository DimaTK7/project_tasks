<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Tasks;

class TaskQuery
{
    public function get()
    {
        return Tasks::paginate(10);
    }

    public function one($id)
    {
        return Tasks::find($id);
    }

    public function all()
    {
        return Tasks::all();
    }
}
