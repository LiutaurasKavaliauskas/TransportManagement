<?php

use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Vehicles::class, 10)->create()->each(function ($u) {
            $u->make();
        });
    }
}
