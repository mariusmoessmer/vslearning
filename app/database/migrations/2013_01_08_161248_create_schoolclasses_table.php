<?php

use Illuminate\Database\Migrations\Migration;

class CreateSchoolclassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('schoolclasses', function($t) {
                $t->increments('id');
                $t->string('name');
                $t->integer('school_id')->unsigned();
                $t->timestamps();
                $t->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('schoolclasses');
	}

}