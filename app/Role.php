<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Roles table.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The roles has many users.
     *
     * @return array object
     */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The role has many permissions.
     *
     * @return array object
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
