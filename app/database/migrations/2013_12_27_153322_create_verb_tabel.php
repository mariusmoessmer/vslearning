<?php
use Illuminate\Database\Migrations\Migration;
class CreateVerbTabel extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'verb', function ($t) {
			$t->increments ( 'id' );
			$t->string ( 'word' );
			$t->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'verb' );
	}
}