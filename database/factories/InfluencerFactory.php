<?php

$factory->define(App\Influencer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->name,
        "nick_name" => $faker->name,
        "phone" => $faker->name,
        "interactive" => $faker->randomNumber(2),
    ];
});
