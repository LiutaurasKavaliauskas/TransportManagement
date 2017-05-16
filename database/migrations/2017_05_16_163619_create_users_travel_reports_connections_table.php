<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTravelReportsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_travel_reports_connections', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_users_trave_reports_connections_users_idx');
			$table->integer('tm_travel_reports_id')->index('fk_users_travel_reports_connections_tm_travel_reports1_idx');
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
		Schema::drop('users_travel_reports_connections');
	}

}
