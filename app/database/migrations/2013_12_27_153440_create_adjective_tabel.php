<?php
use Illuminate\Database\Migrations\Migration;
class CreateAdjectiveTabel extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'adjective', function ($t) {
			$t->increments ( 'id' );
			$t->string ( 'word' );
			$t->string ( 'comperative' );
			$t->string ( 'superlativ' );
			$t->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'adjective' );
	}
}