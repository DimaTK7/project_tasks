<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Projects;

class ProjectServices
{
    private $projects;

    public function __construct(Projects $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Сохраняем проект в БД
     * @param array $fields миссив данных
     */
    public function create(array $fields)
    {
        $this->projects->fill($fields)->save();
    }

    public function update($id, array $fields)
    {

    }

    public function delete($id)
    {

    }
}
