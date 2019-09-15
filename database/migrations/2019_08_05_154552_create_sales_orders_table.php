<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_orders', function(Blueprint $table)
		{
			$table->bigInteger('sales_order_id', true)->unsigned();
			$table->unsignedInteger('account_id');
			$table->integer('company_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->string('invoice_number');
			$table->date('order_date');
			$table->decimal('discount', 16);
			$table->decimal('down_payment', 16);
			$table->decimal('total', 16);
			$table->string('attachment_url');
			$table->timestamps();
			$table->boolean('is_approved')->default(0);
			$table->integer('approved_by')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_orders');
	}

}
