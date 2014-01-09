<?php

use Illuminate\Database\Migrations\Migration;

class CreateTensepersonconjugationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tensepersonconjugations', function($t) {
            $t->increments('id');
            $t->string('firstperson_singular');
            $t->string('secondperson_singular');
            $t->string('thirdperson_singular');
            $t->string('firstperson_plural');
            $t->string('secondperson_plural');
            $t->string('thirdperson_plural');
            $t->integer('tensetype_id')->unsigned();
            $t->timestamps();
            $t->foreign('tensetype_id')->references('id')->on('tensetypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tensepersonconjugations');
    }

}
