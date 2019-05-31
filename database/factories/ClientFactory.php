<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'ci'=>$faker->PhoneNumber,
        'n_invoice'=>$faker->PhoneNumber
    ];
});
