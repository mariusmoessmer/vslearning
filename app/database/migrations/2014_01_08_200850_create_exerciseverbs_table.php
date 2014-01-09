<?php

use Illuminate\Database\Migrations\Migration;

class CreateExerciseverbsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('exerciseverbs', function($t) {
                $t->increments('id');
                $t->integer('exercise_id')->unsigned();
                $t->integer('verb_id')->unsigned();
                $t->timestamps();
                $t->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
                $t->foreign('verb_id')->references('id')->on('verbs')->onDelete('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('exerciseverbs');
	}

}