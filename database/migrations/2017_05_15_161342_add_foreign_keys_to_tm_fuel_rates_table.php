<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTmFuelRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tm_fuel_rates', function(Blueprint $table)
		{
			$table->foreign('tm_vehicles_id', 'fk_tm_fuel_rates_tm_vehicles1')->references('id')->on('tm_vehicles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tm_fuel_rates', function(Blueprint $table)
		{
			$table->dropForeign('fk_tm_fuel_rates_tm_vehicles1');
		});
	}

}
