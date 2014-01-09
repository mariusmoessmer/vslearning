<?php

use Illuminate\Database\Migrations\Migration;

class CreateTenseexercisetasksTable extends Migration {

/**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tenseexercisetasks', function($t) {
            $t->increments('id');
            $t->smallInteger('person_number');
            $t->string('user_answer')->nullable();
            $t->boolean('answer_is_correct')->default(false);
            $t->integer('exercisetest_id')->unsigned();
            $t->integer('verb_id')->unsigned();
            $t->integer('tensetype_id')->unsigned();
            $t->timestamps();
            $t->foreign('exercisetest_id')->references('id')->on('exercisetests')->onDelete('cascade');
            $t->foreign('verb_id')->references('id')->on('verbs')->onDelete('cascade');
            $t->foreign('tensetype_id')->references('id')->on('tensetypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tenseexercisetasks');
    }

}