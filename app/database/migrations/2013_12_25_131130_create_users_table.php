<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function($t) {
            $t->increments('id');
            $t->string('username', 16);
            $t->string('password', 64);
            $t->integer('schoolclass_id')->unsigned()->nullable();
            $t->timestamps();
            $t->foreign('schoolclass_id')->references('id')->on('schoolclasses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
