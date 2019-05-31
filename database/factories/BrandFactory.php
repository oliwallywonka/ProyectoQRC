<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'brand'=>$faker->word,
        'description'=>$faker->sentence
    ];
});
