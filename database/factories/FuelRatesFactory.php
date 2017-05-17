<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\FuelRates::class, function (Faker\Generator $faker) {
        return [
            'idle_rate'      => $faker->numberBetween(0, 100),
            'going_rate'     => $faker->numberBetween(0, 100),
            'unloading_rate' => $faker->numberBetween(0, 100),
            'tm_vehicles_id' => factory(\App\Models\Vehicles::class)->create()->id,
        ];
});