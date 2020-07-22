<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(10000, 60000),
        'category_id' => function () {
            return \App\Category::query()->inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return \App\User::query()->inRandomOrder()->first()->id;
        }
    ];
});
