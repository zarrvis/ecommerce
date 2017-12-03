<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence(3),
        'price' => $faker->numberBetween(100,100000),
        'image' => 'uploads/products/book.png',
        'description' => $faker->paragraph(4),
    ];
});
