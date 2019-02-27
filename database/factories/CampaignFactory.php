<?php

$factory->define(App\Campaign::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "brief" => $faker->name,
        "status" => $faker->randomNumber(2),
        "start" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "end" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "budget" => $faker->randomNumber(2),
        "requirement" => $faker->name,
        "brand_id" => factory('App\Brand')->create(),
    ];
});
