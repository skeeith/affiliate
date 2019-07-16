<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * Role user table.
     *
     * @var string
     */
    protected $table = 'role_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'user_id'
    ];

    /**
     * Eager load the relationships
     *
     * @var array
     */
    protected $with = [
        'permissions'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The role user belongs to many permissions.
     *
     * @return array object
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * The role user belongs to a role.
     *
     * @return object
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * The role user belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
