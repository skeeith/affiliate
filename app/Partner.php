<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * Partners table.
     *
     * @var string
     */
    protected $table = 'partners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'name', 'description',
        'csv_url', 'csv_delimiter'
    ];

    /**
     * Eager load relationships.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * Run functions on boot.
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth('api')->check()) {
                $model->user_id = auth('api')->user()->id;
            } else {
                $model->user_id = request()->headers->get('USER-ID');
            }
        });
    }

    /**
     * The partner has many articles.
     *
     * @return array object
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The partner has many brands.
     *
     * @return array object
     */
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * The partner belongs to a project.
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * The partner belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
