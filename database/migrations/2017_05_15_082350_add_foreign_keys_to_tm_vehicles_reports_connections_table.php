<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTmVehiclesReportsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tm_vehicles_reports_connections', function(Blueprint $table)
		{
			$table->foreign('tm_travel_reports_id', 'fk_tm_vehicles_reports_connections_tm_travel_reports1')->references('id')->on('tm_travel_reports')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tm_vehicles_id', 'fk_tm_vehicles_reports_connections_tm_vehicles1')->references('id')->on('tm_vehicles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tm_vehicles_reports_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_tm_vehicles_reports_connections_tm_travel_reports1');
			$table->dropForeign('fk_tm_vehicles_reports_connections_tm_vehicles1');
		});
	}

}
