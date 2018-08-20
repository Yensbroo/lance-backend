<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
    ];
});
