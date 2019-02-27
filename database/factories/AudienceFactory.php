<?php

$factory->define(App\Audience::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "gender" => $faker->name,
        "location" => $faker->name,
        "from_age" => $faker->randomNumber(2),
        "to_age" => $faker->randomNumber(2),
        "competence" => $faker->name,
        "social_network_id" => factory('App\SocialNetwork')->create(),
    ];
});
