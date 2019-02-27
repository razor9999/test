<?php

$factory->define(App\InfluencerSocialNetwork::class, function (Faker\Generator $faker) {
    return [
        "influencer_id" => factory('App\Influencer')->create(),
        "social_network_id" => factory('App\SocialNetwork')->create(),
        "status" => $faker->randomNumber(2),
    ];
});
