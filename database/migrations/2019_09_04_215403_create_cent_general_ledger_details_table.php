<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentGeneralLedgerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cent_general_ledger_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cent_general_ledger_id');
            $table->unsignedInteger('account_id');
            $table->string('description');
            $table->decimal('credit_amount', 16, 2);
            $table->decimal('debit_amount', 16, 2);
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
        Schema::dropIfExists('cent_general_ledger_details');
    }
}
