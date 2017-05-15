<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTmVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tm_vehicles', function(Blueprint $table)
		{
			$table->foreign('tm_fuel_rates_id', 'fk_tm_vehicles_tm_fuel_rates')->references('id')->on('tm_fuel_rates')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tm_vehicles', function(Blueprint $table)
		{
			$table->dropForeign('fk_tm_vehicles_tm_fuel_rates');
		});
	}

}
