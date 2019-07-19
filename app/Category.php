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
     * The category has many articles.
     *
     * @return array object
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The category has many child categories.
     *
     * @return object
     */
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * The category has a parent category.
     *
     * @return object
     */
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
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
