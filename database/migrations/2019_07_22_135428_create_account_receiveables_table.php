<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountReceiveablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('account_receiveables', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nama_pelanggan');
        //     $table->bigInteger('id_pelanggan');
        //     $table->string('email_pelanggan');
        //     $table->string('alamat_penagihan');
        //     $table->bigInteger('nomor_so');
        //     $table->date('tanggal_order');
        //     $table->string('nama_barang');
        //     $table->integer('kuantitas');
        //     $table->decimal('harga_satuan', 8, 2);
        //     $table->decimal('sub_total_nilai', 8, 2);
        //     $table->decimal('discount', 8, 2);
        //     $table->decimal('uang_muka', 8, 2);
        //     $table->decimal('kasbank', 8, 2);
        //     $table->decimal('ppn', 8, 2);
        //     $table->decimal('total', 8, 2);
        //     $table->string('attachment_url');
        //     $table->integer('status_approve');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_receiveables');
    }
}
