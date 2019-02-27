<?php

$factory->define(App\AudienceInteresting::class, function (Faker\Generator $faker) {
    return [
        "audience_id" => factory('App\Audience')->create(),
        "interesting_id" => factory('App\Interesting')->create(),
        "weight" => $faker->randomFloat(2, 1, 100),
    ];
});
