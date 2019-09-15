<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->unsignedInteger('sector_id');
            $table->string('name');
            $table->string('description');
        });
    
        DB::table('sectors')->insert(
            array(
                [
                    'sector_id' => 1,
                    'name' => 'commerce',
                    'description' => 'Perdagangan',
                ],
                [
                    'subscribtion_id' => 2,
                    'name' => 'service',
                    'description' => 'Jasa',
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
        Schema::dropIfExists('sectors');
    }
}
