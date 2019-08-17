<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOnPurchaseRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_requests', function(Blueprint $table) {
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('account_id');
            $table->date('order_date');
            $table->decimal('discount', 16, 2);
            $table->decimal('down_payment', 16, 2);
            $table->decimal('ppn', 16, 2);
            $table->decimal('total', 16, 2);
            $table->string('attachment_url')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->unsignedInteger('approved_by')->nullable();
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
