<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            'Admin',
            'User'
        ];

        foreach ($list as $key => $value)
            \App\Models\Roles::create(['name' => $value]);
    }
}
