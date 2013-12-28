<?php
class VerbSeed extends Seeder {

	public function run() {
		DB::table('verb')->delete();
		$exercise = new Verb();
		$exercise->word = 'laufen';
		$exercise->save();
		
		$exercise = new Verb();
		$exercise->word = 'stehen';
		$exercise->save();
		
		$exercise = new Verb();
		$exercise->word = 'gehen';
		$exercise->save();
		
		$exercise = new Verb();
		$exercise->word = 'schwimmen';
		$exercise->save();
	}

}