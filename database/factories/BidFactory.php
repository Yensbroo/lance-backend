<?php

use Faker\Generator as Faker;

$factory->define(App\Bid::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'project_id' => App\Project::all()->random()->id,
        'price' => $faker->numberBetween($min = 50, $max = 5000)
    ];
});
