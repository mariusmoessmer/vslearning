<?php

use Illuminate\Database\Migrations\Migration;

class CreateTensetypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tensetypes', function($t) {
            $t->increments('id');
            $t->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tensetypes');
    }

}
