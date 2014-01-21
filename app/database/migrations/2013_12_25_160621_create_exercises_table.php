<?php

use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('exercises', function($t) {
            $t->increments('id');
            $t->string('name');
            $t->string('description');
            $t->integer('exercisetype_id')->unsigned();
            $t->integer('schoolclass_id')->unsigned()->nullable();
            $t->text('configuration_json');
            $t->timestamps();
            $t->foreign('exercisetype_id')->references('id')->on('exercisetypes')->onDelete('cascade');
            $t->foreign('schoolclass_id')->references('id')->on('schoolclasses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('exercises');
    }

}
