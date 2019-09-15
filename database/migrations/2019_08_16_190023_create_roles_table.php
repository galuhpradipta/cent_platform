<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->unique();
            $table->string('name');
            $table->string('description');
        });

        DB::table('roles')->insert(
            array(
                [
                    'role_id' => 1,
                    'name' => 'admin',
                    'description' => 'Admin',
                ],
                [
                    'role_id' => 2,
                    'name' => 'supervisor',
                    'description' => 'Supervisor',
                ],
                [
                    'role_id' => 3,
                    'name' => 'manager',
                    'description' => 'Manager',
                ],
                [
                    'role_id' => 4,
                    'name' => 'director',
                    'description' => 'Director',
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
        Schema::dropIfExists('roles');
    }
}
