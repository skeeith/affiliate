<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Articles table.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'partner_id', 'category_id', 'brand_id',
        'title', 'image', 'image_detail', 'name', 'slug', 'body',
        'number', 'deep_link', 'short_description', 'long_description',
        'price', 'price_old', 'sale', 'sex', 'color', 'extra1', 'extra2',
        'extra3'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
     * The article belongs to a category.
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The article belongs to a partner.
     *
     * @return object
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * The article belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
