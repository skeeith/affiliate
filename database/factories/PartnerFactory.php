<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name'          => $faker->domainWord,
        'description'   => $faker->text($maxNbChars = 200),
        'csv_url'       => $faker->url,
        'csv_delimiter' => '>'
    ];
});
