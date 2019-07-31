<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('product_id');
            $table->date('order_date');
            $table->integer('quantity');
            $table->decimal('subtotal_price', 16, 2);
            $table->decimal('discount', 16, 2);
            $table->decimal('down_payment', 16, 2);
            $table->decimal('bank', 16, 2);
            $table->decimal('ppn', 16, 2);
            $table->decimal('total', 16, 2);
            $table->string('attachment_url');
            $table->integer('status');
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
        Schema::dropIfExists('sales_orders');
    }
}
