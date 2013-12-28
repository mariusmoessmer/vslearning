<?php

use Illuminate\Database\Migrations\Migration;

class CreateCourseTabel extends Migration {
	public function up() {
		/*
		Schema::create ( 'course', function ($t) {
			$t->increments ( 'id' );
			$t->integer ( 'times' );
			$t->string ( 'konjugations' );
			$t->string ( '' );
			$t->string ( 'er_sie_es' );
			$t->string ( 'wir' );
			$t->string ( 'ihr' );
			$t->string ( 'sie' );
			$t->timestamps ();
			//$t->foreign ( 'verb_id' )->references ( 'id' )->on ( 'verb' )->onDelete ( 'cascade' );
		} );
		*/
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
// 		Schema::drop ( "course" );
	}

}