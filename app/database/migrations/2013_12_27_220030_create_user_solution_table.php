<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserSolutionTable extends Migration {
		public function up() {
			Schema::create ( 'user_solution', function ($t) {
				$t->increments ( 'id' );
				$t->integer ( 'user_id' );
				$t->integer ( 'word_id' );
				$t->integer ( 'solved' );
				$t->integer ( 'attempts' );
				
				$t->timestamps ();
				//$t->foreign ( 'verb_id' )->references ( 'id' )->on ( 'verb' )->onDelete ( 'cascade' );
			} );
		}
	
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::drop ( "user_solution" );
		}

}