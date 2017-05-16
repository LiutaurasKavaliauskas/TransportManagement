<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmFuelRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tm_fuel_rates', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('idle_rate', 10, 0);
			$table->float('going_rate', 10, 0);
			$table->float('unloading_rate', 10, 0);
			$table->timestamps();
			$table->integer('tm_vehicles_id')->index('fk_tm_fuel_rates_tm_vehicles1_idx')->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tm_fuel_rates');
	}

}
