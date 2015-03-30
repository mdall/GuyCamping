<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHebergement extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hebergements', function($table) {
            $table->json('plage');
            $table->string('description');
            $table->dropColumn('nbEmplacements');
            $table->dropColumn('prix');
            $table->dropColumn('ouverture');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hebergements', function($table) {
            $table->dropColumn('plage');
            $table->dropColumn('description');
            $table->integer('nbEmplacements');
            $table->json('prix');
            $table->json('ouverture');
        });
	}

}
