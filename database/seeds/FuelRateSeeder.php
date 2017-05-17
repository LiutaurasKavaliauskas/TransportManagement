<?php

use Illuminate\Database\Seeder;

class FuelRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\FuelRates::class, 10)->create()->each(function ($u) {
            $u->make();
        });
    }
}
