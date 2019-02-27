<?php

$factory->define(App\SocialNetwork::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
        "logo" => $faker->name,
        "url" => $faker->name,
    ];
});
