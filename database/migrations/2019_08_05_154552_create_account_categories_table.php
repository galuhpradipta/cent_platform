<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account_categories', function(Blueprint $table)
		{
			$table->bigInteger('account_category_id', true)->unsigned();
			$table->string('name');
			$table->string('description');
		});

		DB::table('account_categories')->insert(
            array(
                [
					'account_category_id' => 1,
					'name' => 'kas_dan_bank',
                    'description' => 'Kas & Bank',
                ],
                [
					'account_category_id' => 2,
					'name' => 'akun_piutang',
                    'description' => 'Akun Piutang',
				],
				[
					'account_category_id' => 3,
					'name' => 'persediaan',
                    'description' => 'Persediaan',
				],				
				[
					'account_category_id' => 4,
					'name' => 'aktiva_lancar_lainnya',
                    'description' => 'Aktiva Lancar Lainnya',
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
		Schema::drop('account_categories');
	}

}
