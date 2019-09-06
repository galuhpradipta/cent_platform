<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentGeneralLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cent_general_ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id');
            $table->string('transaction_number');
            $table->date('transaction_date');
            $table->decimal('debit_amount', 16, 2);
            $table->decimal('credit_amount', 16, 2);
            $table->string('tag');
            $table->string('memo')->nullable();
            $table->string('attachment_url');
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
        Schema::dropIfExists('cent_general_ledgers');
    }
}
