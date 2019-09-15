<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_requests', function(Blueprint $table)
		{
			$table->bigInteger('purchase_request_id', true)->unsigned();
			$table->unsignedInteger('company_id');
            $table->unsignedInteger('supplier_id');
			$table->unsignedInteger('account_id');
			$table->string('invoice_number');
            $table->date('order_date');
            $table->decimal('discount', 16, 2);
            $table->decimal('down_payment', 16, 2);
            $table->decimal('ppn', 16, 2);
            $table->decimal('total', 16, 2);
            $table->string('attachment_url')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->unsignedInteger('approved_by')->nullable();
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
		Schema::drop('purchase_requests');
	}

}
