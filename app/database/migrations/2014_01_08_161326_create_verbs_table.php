<?php

use Illuminate\Database\Migrations\Migration;

class CreateVerbsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('verbs', function($t) {
            $t->increments('id');
            $t->string('infinitive')->unique();
            $t->integer('praesenstensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->integer('perfekttensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->integer('praeteritumtensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->integer('plusquamperfekttensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->integer('futur1tensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->integer('futur2tensepersonconjugation_id')->unsigned()->nullable()->unique();
            $t->timestamps();
            $t->foreign('praesenstensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
            $t->foreign('perfekttensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
            $t->foreign('praeteritumtensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
            $t->foreign('plusquamperfekttensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
            $t->foreign('futur1tensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
            $t->foreign('futur2tensepersonconjugation_id')->references('id')->on('tensepersonconjugations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('verbs');
    }

}
