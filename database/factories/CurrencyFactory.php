<?php

use Faker\Generator as Faker;

$factory->define(\App\Currency::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'short_name' => $faker->currencyCode,
        'logo_url' => $faker->imageUrl(),
        'price' => $faker->randomFloat(2, 0, 100000),
    ];
});
