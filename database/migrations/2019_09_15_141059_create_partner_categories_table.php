<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_categories', function (Blueprint $table) {
            $table->unsignedInteger('partner_category_id');
            $table->string('name');
            $table->string('description');
        });

        DB::table('partner_categories')->insert(
            array(
                [
                    'partner_category_id' => 1,
                    'name' => 'customer',
                    'description' => 'Customer',
                ],
                [
                    'partner_category_id' => 2,
                    'name' => 'supplier',
                    'description' => 'Supplier',
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
        Schema::dropIfExists('partner_categories');
    }
}
