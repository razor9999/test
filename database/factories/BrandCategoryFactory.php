<?php

$factory->define(App\BrandCategory::class, function (Faker\Generator $faker) {
    return [
        "category_id" => factory('App\Category')->create(),
        "brand_id" => factory('App\Brand')->create(),
        "status" => $faker->randomNumber(2),
    ];
});
