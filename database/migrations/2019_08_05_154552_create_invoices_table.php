<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->bigInteger('invoice_id', true)->unsigned();
			$table->integer('sales_order_id')->unsigned();
			$table->integer('delivery_order_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->date('invoice_date')->nullable();
			$table->date('due_date')->nullable();
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
		Schema::drop('invoices');
	}

}
