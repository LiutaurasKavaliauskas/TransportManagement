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
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tm_fuel_rates');
	}

}
