<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('sales_order_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->date('delivery_date')->nullable();
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
		Schema::drop('delivery_orders');
	}

}
