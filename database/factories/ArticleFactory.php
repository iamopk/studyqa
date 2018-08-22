<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'pic' => $faker->imageUrl( 640,480),
        'body' => $faker->text(),
    ];
});
