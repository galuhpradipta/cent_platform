<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->bigInteger('account_id', true)->unsigned();
			$table->unsignedInteger('account_category_id');
			$table->unsignedInteger('company_id');
			$table->string('name');
			$table->string('code');
			$table->decimal('initial_balance', 16);
			$table->decimal('balance', 16);
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
		Schema::drop('accounts');
	}

}
