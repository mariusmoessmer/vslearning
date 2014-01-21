<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolclassexercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schoolclassexercises', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->smallInteger('sequence_number');
                        $table->integer('schoolclass_id')->unsigned();
                        $table->integer('exercise_id')->unsigned();
                $table->timestamps();
                $table->foreign('schoolclass_id')->references('id')->on('schoolclasses')->onDelete('cascade');
                $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
                
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schoolclassexercises');
	}

}
