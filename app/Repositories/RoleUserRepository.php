<?php

namespace App\Repositories;

use App\RoleUser;

class RoleUserRepository extends Repository
{
    /**
     * Create new instance of role user repository.
     *
     * @param RoleUser $roleUser RoleUser model
     */
    public function __construct(RoleUser $roleUser)
    {
        parent::__construct($roleUser);
        $this->roleUser = $roleUser;
    }
}
