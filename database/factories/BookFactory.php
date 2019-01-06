<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'price'     => $faker->numberBetween($min = 10000, $max = 90000),
        'desc_book' => $faker->text,
    ];
});
