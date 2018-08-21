<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
        
    return [
        'user_id' => App\User::all()->random()->id,
        'category_id' => App\Category::all()->random()->id,
        'project_start' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        'project_end' => $faker->dateTimeBetween($startDate = 'now' ,$endDate = '+2 months'),
        'published_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now'),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now'),
        'title' => $faker->sentence,
        'body' => $faker->paragraphs($nb = 4, $asText = true),
        'budget' => $faker->numberBetween($min = 50, $max = 500),
    ];
});
