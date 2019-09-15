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
			$table->unsignedInteger('account_id');
			$table->unsignedInteger('company_id');
			$table->string('name');
			$table->string('code');
			$table->decimal('price', 16);
			$table->string('unit');
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
