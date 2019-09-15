<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountReceiveablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account_receiveables', function(Blueprint $table)
		{
			$table->bigInteger('account_receivable_id', true)->unsigned();
			$table->integer('sales_order_id')->unsigned()->nullable();
			$table->integer('delivery_order_id')->unsigned()->nullable();
			$table->integer('invoice_id')->unsigned()->nullable();
			$table->integer('income_id')->unsigned()->nullable();
			$table->integer('status');
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
		Schema::drop('account_receiveables');
	}

}
