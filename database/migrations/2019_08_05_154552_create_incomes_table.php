<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incomes', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('sales_order_id')->unsigned();
			$table->integer('delivery_order_id')->unsigned();
			$table->integer('invoice_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->date('income_date')->nullable();
			$table->decimal('amount', 16)->nullable();
			$table->boolean('is_approved')->default(0);
			$table->integer('approved_by')->unsigned()->nullable();
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
		Schema::drop('incomes');
	}

}
