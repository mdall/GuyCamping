<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHebergementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hebergements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('name');
            $table->integer('nbEmplacements');
            $table->json('prix');
            $table->json('ouverture');
            $table->json('options');
            $table->json('images');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hebergements');
	}

}
