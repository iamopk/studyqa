<?php

use Faker\Generator as Faker;

$factory->define(\App\Image::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'url' => $faker->imageUrl( 640,480),
    ];
});
