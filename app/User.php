<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Users table.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The user has many articles.
     *
     * @return array object
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The user has many partners.
     *
     * @return array object
     */
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    /**
     * The user has many projects.
     *
     * @return array object
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * The user has many roles.
     *
     * @return array object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
