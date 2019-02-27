<?php

$factory->define(App\Suggestion::class, function (Faker\Generator $faker) {
    return [
        "status" => $faker->randomNumber(2),
        "influencer_id" => factory('App\Influencer')->create(),
        "campaign_id" => factory('App\Campaign')->create(),
        "weight" => $faker->randomFloat(2, 1, 100),
    ];
});
