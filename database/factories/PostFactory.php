<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post_type'=>$faker->randomElement(['formation', 'stage']),
        'title'=>$faker->sentence(),
        'description'=>$faker->paragraph(),
        'started_at'=>$faker->dateTimeBetween('+1 month', '+6 months'),
        'ended_at'=>$faker->dateTimeBetween('+6 month', '+1 year'),
        'price'=>$faker->numberBetween($min = 1000, $max = 2500),
        'students_max'=>$faker->numberBetween($min = 10, $max = 30)
    ];
});
