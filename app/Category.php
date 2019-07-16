<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Categories table.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'parent_id', 'name', 'description', 'active'
    ];

    /**
     * The categories has many articles.
     *
     * @return array object
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The cateogry belongs to a project.
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Partner::class);
    }
}
