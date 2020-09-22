<?php

namespace App\Http\Queries\Role;

use App\Model\Permission;

class PermissionQuery extends AbstractQuery
{
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }
}
