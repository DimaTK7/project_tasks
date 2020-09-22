<?php

namespace App\Http\Services\Role;

use App\Model\Role;

class RoleService
{
    public function create(array $fields)
    {
        return Role::create($fields);
    }

    public function update($id, array $fields)
    {
        return Role::find($id)->update($fields);
    }

    public function delete($id)
    {
        return Role::find($id)->delete();
    }
}
