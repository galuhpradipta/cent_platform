<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sales_order_id')->nullable()->change();
            $table->unsignedInteger('purchase_request_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->decimal('quantity', 16, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_order_details');
    }
}
