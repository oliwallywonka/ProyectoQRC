<?php

use Faker\Generator as Faker;

$factory->define(App\Wholeseller::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'ci'=>$faker->PhoneNumber,
        'phone'=>$faker->PhoneNumber
    ];
});
