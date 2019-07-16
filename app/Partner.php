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
        'user_id', 'name', 'description',
        'csv_url', 'csv_delimiter'
    ];

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
     * The partner belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}