<?php
use Illuminate\Database\Migrations\Migration;
class CreateVerbTimesTabel extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'verb_times', function ($t) {
			$t->increments ( 'id' );
			$t->integer ( 'verb_id' );
			$t->string ( 'futur2' );
			$t->string ( 'futur1' );
			$t->string ( 'praesens' );
			$t->string ( 'praeteritum' );
			$t->string ( 'perfekt' );
			$t->string ( 'plusquamperfekt' );
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
		Schema::drop ( "verb_times" );
	}
}