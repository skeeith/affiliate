<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Projects table.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The project has many categories.
     *
     * @return array object
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * The project belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
