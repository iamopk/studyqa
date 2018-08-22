<?php

use Faker\Generator as Faker;

$factory->define(\App\Image::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'url' => $faker->imageUrl( array_random([320, 480, 640]), array_random([320, 480, 640])),
    ];
});
