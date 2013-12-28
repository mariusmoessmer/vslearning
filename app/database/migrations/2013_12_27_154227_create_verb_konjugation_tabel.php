<?php
use Illuminate\Database\Migrations\Migration;
class CreateVerbKonjugationTabel extends Migration {
	public function up() {
		Schema::create ( 'verb_konjugations', function ($t) {
			$t->increments ( 'id' );
			$t->integer ( 'verb_id' );
			$t->string ( 'ich' );
			$t->string ( 'du' );
			$t->string ( 'er_sie_es' );
			$t->string ( 'wir' );
			$t->string ( 'ihr' );
			$t->string ( 'sie' );
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
		Schema::drop ( "verb_konjugations" );
	}
}