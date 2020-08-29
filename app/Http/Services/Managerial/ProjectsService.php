<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Projects;

class ProjectsService
{
    /**
     * Save data in database
     *
     * @param array $fields array with data
     */
    public function create(array $fields)
    {
        return Projects::create($fields);
    }

    /**
     * Change data
     *
     * @param $id
     * @param array $fields array with data
     */
    public function update($id, array $fields)
    {
        return Projects::find($id)->update($fields);
    }

    /**
     * Delete data
     *
     * @param $id
     */
    public function delete($id)
    {
        return Projects::find($id)->delete();
    }
}
