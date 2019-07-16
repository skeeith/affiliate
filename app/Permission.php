<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Permissions table.
     *
     * @var string
     */
    protected $table = 'permissions';

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
     * The permission belongs to many role users.
     *
     * @return array object
     */
    public function roleUsers()
    {
        return $this->belongsToMany(RoleUser::class)->withTimestamps();
    }
}
