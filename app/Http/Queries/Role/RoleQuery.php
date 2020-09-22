<?php

namespace App\Http\Queries\Role;

use App\Model\Role;

class RoleQuery extends AbstractQuery
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
