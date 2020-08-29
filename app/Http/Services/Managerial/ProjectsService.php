<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Projects;

class ProjectsService
{
    public function create(array $fields)
    {
        return Projects::create($fields);
    }

    public function update($id, array $fields)
    {
        return Projects::find($id)->update($fields);
    }

    public function delete($id)
    {
        return Projects::find($id)->delete();
    }
}
