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
            $t->string('description')->nullable();
            $t->string('explanation')->nullable();
            $t->boolean('visible')->default(true);
            $t->integer('sequence_number');
            $t->integer('exercisetype_id')->unsigned();
            $t->string('configuration_json');
            $t->timestamps();
            $t->foreign('exercisetype_id')->references('id')->on('exercisetypes')->onDelete('cascade');
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
