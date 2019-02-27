<?php

$factory->define(App\CompanySize::class, function (Faker\Generator $faker) {
    return [
        "text" => $faker->name,
        "min" => $faker->randomNumber(2),
        "max" => $faker->name,
    ];
});
