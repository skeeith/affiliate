<?php

namespace App\Repositories;

use App\Permission;

class PermissionRepository extends Repository
{
    /**
     * Create new instance of permission repository.
     *
     * @param Permission $permission Permission model
     */
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
        $this->permission = $permission;
    }
}
