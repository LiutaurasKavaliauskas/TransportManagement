<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Vehicles::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->colorName
    ];
});