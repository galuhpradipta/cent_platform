<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableSalesOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_orders', function(Blueprint $table) {
            $table->renameColumn('bank_id', 'account_id');
            $table->dropColumn('product_id');
            $table->dropColumn('quantity');
            $table->dropColumn('subtotal_price');
            $table->dropColumn('status');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
