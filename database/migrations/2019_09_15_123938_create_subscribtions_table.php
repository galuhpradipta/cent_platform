<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribtionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribtions', function (Blueprint $table) {
            $table->unsignedInteger('subscribtion_id');
            $table->string('name');
            $table->string('description');
        });

        DB::table('subscribtions')->insert(
            array(
                [
                    'subscribtion_id' => 1,
                    'name' => 'sme',
                    'description' => 'SME',
                ],
                [
                    'subscribtion_id' => 2,
                    'name' => 'enterprise',
                    'description' => 'Enterprise',
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
        Schema::dropIfExists('subscribtions');
    }
}
