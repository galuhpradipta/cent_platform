<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banks', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('company_id')->unsigned();
			$table->string('name');
			$table->string('code');
			$table->decimal('initial_balance', 16);
			$table->decimal('balance', 16);
			$table->timestamps();
			$table->string('category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banks');
	}

}
