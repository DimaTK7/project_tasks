<?php

namespace App\Http\Services\Managerial;

use App\Http\Queries\Managerial\ProjectQuery;
use App\Model\Managerial\Projects;

class ProjectServices
{
    private $projects;
    private $projectQuery;

    public function __construct(
        Projects $projects,
        ProjectQuery $projectQuery
    )
    {
        $this->projects = $projects;
        $this->projectQuery = $projectQuery;
    }

    /**
     * Сохраняем проект в БД
     * @param array $fields миссив данных
     */
    public function create(array $fields)
    {
        $this->projects->fill($fields)->save();
    }

    /**
     * Изменить проект
     * @param $id
     * @param array $fields новые данные
     */
    public function update($id, array $fields)
    {
        $this->projectQuery->one($id)->fill($fields)->save();
    }

    /**
     * Удалить проект
     * @param $id
     */
    public function delete($id)
    {
       $this->projectQuery->one($id)->delete();
    }
}
