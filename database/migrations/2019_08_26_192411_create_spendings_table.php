<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->bigInteger('spending_id', true)->unsigned();
			$table->integer('purchase_request_id')->unsigned();
			$table->integer('purchase_order_id')->unsigned();
			$table->integer('receipt_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->date('spending_date')->nullable();
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
        Schema::dropIfExists('spendings');
    }
}
