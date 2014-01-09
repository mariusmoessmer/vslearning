<?php

use Illuminate\Database\Migrations\Migration;

class CreateExercisetestsTable extends Migration {

/**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('exercisetests', function($t) {
            $t->increments('id');
            $t->dateTime('test_started')->nullable();
            $t->dateTime('test_finished')->nullable();
            $t->integer('exercise_id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->timestamps();
            $t->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('exercisetests');
    }

}