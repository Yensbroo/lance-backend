<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
        
    return [
        'user_id' => App\User::all()->random()->id,
        'category_id' => App\Category::all()->random()->id,
        'project_start' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
        'project_end' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
        'published_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years'),
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'budget' => $faker->numberBetween($min = 50, $max = 5000),
    ];
});
