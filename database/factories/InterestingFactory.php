<?php

$factory->define(App\Interesting::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
        "hashtag" => $faker->name,
    ];
});
