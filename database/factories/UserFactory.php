<?php

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$g0AamDdwynhTIccQD7gCMecIy6BkHpqSC/vaAVmicOUsSDtbHe9bS', //123
        'remember_token' => str_random(10),
        'role' => array_random([User::ROLE_USER,User::ROLE_ADMIN,User::ROLE_MODERATOR,User::ROLE_PUBLISHER]),
    ];
});
