<?php

namespace App\Http\Services\Role;

use App\Model\Permission;

class PermissionService
{
    public function create(array $fields)
    {
        return Permission::create($fields);
    }

    public function update($id, array $fields)
    {
        return Permission::find($id)->update($fields);
    }

    public function delete($id)
    {
        return Permission::find($id)->delete();
    }
}
