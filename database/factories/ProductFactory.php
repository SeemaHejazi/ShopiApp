<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'         => $faker->catchPhrase,
        'author'        => $faker->name,
        'price'         => $faker->numberBetween($min = 1000, $max = 8000),
        'inventory_count' => $faker->randomDigit,
        'barcode'       => $faker->isbn10,
        'description'   => $faker->text,
        'img_src'       => $faker->imageUrl(640, 480, 'animals', true, 'Faker')
    ];
});
