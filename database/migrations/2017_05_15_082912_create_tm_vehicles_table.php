<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tm_vehicles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 45);
			$table->integer('tm_fuel_rates_id')->index('fk_tm_vehicles_tm_fuel_rates_idx')->nullable();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tm_vehicles');
	}

}
