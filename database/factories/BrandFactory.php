<?php

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "address" => $faker->name,
        "email" => $faker->name,
        "phone" => $faker->name,
        "company_size_id" => factory('App\CompanySize')->create(),
    ];
});
