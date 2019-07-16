<?php

namespace App\Repositories;

use App\Role;

class RoleRepository extends Repository
{
    /**
     * Create new instance of role repository.
     *
     * @param Role $role Role model
     */
    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->role = $role;
    }
}
