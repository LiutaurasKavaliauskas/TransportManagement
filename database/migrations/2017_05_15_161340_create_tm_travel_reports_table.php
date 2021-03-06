<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmTravelReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tm_travel_reports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('date');
			$table->text('route', 65535);
			$table->time('terminal_left');
			$table->time('terminal_arrived');
			$table->string('speedometer_readings_1');
			$table->time('client_arrived');
			$table->time('client_left');
			$table->string('speedometer_readings_2');
			$table->float('time_unloading', 10, 0);
			$table->float('distance', 10, 0);
			$table->float('fuel', 10, 0);
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
		Schema::dropIfExists('tm_travel_reports');
	}

}
