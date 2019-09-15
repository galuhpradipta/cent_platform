<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('journal_id');
            $table->decimal('amount', 16);
            $table->date('date');
            $table->unsignedInteger('type');
            $table->unsignedInteger('sales_order_id')->nullable();
            $table->unsignedInteger('purchase_request_id')->nullable();
            $table->unsignedInteger('bank_id');
            $table->unsignedInteger('company_id');
            $table->string('description')->nullable();;
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
        Schema::dropIfExists('journals');
    }
}
