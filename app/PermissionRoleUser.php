<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRoleUser extends Model
{
    /**
     * Permission role user table.
     *
     * @var string
     */
    protected $table = 'permission_role_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id', 'user_role_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The permission role user belongs to a permission.
     *
     * @return array object
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * The permission role user belongs to a role user.
     *
     * @return object
     */
    public function roleUser()
    {
        return $this->belongsTo(RoleUser::class);
    }
}
