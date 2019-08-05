<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sales_order_id');
            $table->unsignedInteger('delivery_order_id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('company_id');
            $table->date('income_date');
            $table->decimal('amount', 16, 2);
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
        Schema::dropIfExists('incomes');
    }
}
