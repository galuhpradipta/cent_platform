<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->unsignedInteger('product_type_id');
            $table->string('type_name');
            $table->string('description');
        });

        DB::table('product_types')->insert(
            array(
                [
                    'product_type_id' => 1,
                    'type_name' => 'single',
                    'description' => 'Single',
                ],
                [
                    'product_type_id' => 2,
                    'type_name' => 'bundle',
                    'description' => 'Bundle',
                ]
            )
        ); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_types');
    }
}
