<?php

$factory->define(App\InfluencerInteresting::class, function (Faker\Generator $faker) {
    return [
        "influencer_id" => factory('App\Influencer')->create(),
        "interesting_id" => factory('App\Interesting')->create(),
        "weight" => $faker->randomFloat(2, 1, 100),
    ];
});
