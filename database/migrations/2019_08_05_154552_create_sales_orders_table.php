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
			$table->bigInteger('id', true)->unsigned();
			$table->integer('company_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->date('order_date');
			$table->integer('quantity');
			$table->decimal('subtotal_price', 16);
			$table->decimal('discount', 16);
			$table->decimal('down_payment', 16);
			$table->decimal('ppn', 16);
			$table->decimal('total', 16);
			$table->string('attachment_url');
			$table->integer('status');
			$table->timestamps();
			$table->integer('bank_id')->unsigned();
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
