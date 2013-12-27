<?php

use Illuminate\Database\Migrations\Migration;

class CreateExercisetypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('exercisetypes', function($t) {
            $t->increments('id');
            $t->string('name');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('exercisetypes');
	}

}