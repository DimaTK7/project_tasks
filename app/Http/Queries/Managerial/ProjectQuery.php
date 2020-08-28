<?php

namespace App\Http\Queries\Managerial;

use App\Model\Managerial\Projects;

class ProjectQuery
{
    public function get()
    {
        return Projects::paginate(10);
    }

    public function one($id)
    {
        return Projects::find($id);
    }
}
