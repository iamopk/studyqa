<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    $publishers = \App\User::query()->where('role', \App\User::ROLE_PUBLISHER)->get()->pluck('id');
    return [
        'title' => $faker->sentence(5),
        'pic' => $faker->imageUrl(640, 480),
        'body' => $faker->text(),
        'user_id' => array_random($publishers->toArray())
    ];
});
