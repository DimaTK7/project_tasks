<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Project;

class ProjectsService
{
    public function create(array $fields)
    {
        return Project::create($fields);
    }

    public function update($id, array $fields)
    {
        return Project::find($id)->update($fields);
    }

    public function delete($id)
    {
        return Project::find($id)->delete();
    }
}
