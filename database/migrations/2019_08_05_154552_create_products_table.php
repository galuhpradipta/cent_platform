<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigInteger('product_id', true)->unsigned();
			$table->unsignedInteger('product_category_id');
			$table->unsignedInteger('product_unit_id');
			$table->unsignedInteger('product_type_id');
			$table->unsignedInteger('company_id');
			$table->unsignedInteger('sales_account_id')->nullable();
			$table->unsignedInteger('purchase_account_id')->nullable();
			$table->string('product_code');
			$table->decimal('average_price')->default(0);
			$table->decimal('last_price', 16, 2)->default(0);
			$table->decimal('sales_price', 16, 2)->default(0);
			$table->decimal('purchase_price', 16, 2)->default(0);
            $table->decimal('ppn', 16, 2);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
