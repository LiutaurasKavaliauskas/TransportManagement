<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmVehiclesReportsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tm_vehicles_reports_connections', function(Blueprint $table)
		{
			$table->integer('tm_vehicles_id')->index('fk_tm_vehicles_reports_connections_tm_vehicles1_idx');
			$table->integer('tm_travel_reports_id')->index('fk_tm_vehicles_reports_connections_tm_travel_reports1_idx');
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
		Schema::dropIfExists('tm_vehicles_reports_connections');
	}

}
