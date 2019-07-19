<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'name'              => $faker->domainWord,
        'slug'              => Str::slug($faker->domainWord, '-'),
        'body'              => $faker->text($maxNbChars = 5000),
        'number'            => $faker->numerify('####????'),
        'deep_link'         => $faker->url,
        'short_description' => $faker->text($maxNbChars = 250),
        'long_description'  => $faker->text($maxNbChars = 500),
        'price'             => rand(1, 1000),
        'price_old'         => rand(1, 1000),
        'sale'              => rand(1, 99),
        'sex'               => rand(0, 1),
        'color'             => $faker->rgbCssColor,
        'extra1'            => $faker->text($maxNbChars = 250),
        'extra2'            => $faker->text($maxNbChars = 250),
        'extra3'            => $faker->text($maxNbChars = 250)
    ];
});
