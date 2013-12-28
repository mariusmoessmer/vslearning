<?php
class AdjectiveSeeder extends Seeder {
	public function run() {
		DB::table ( 'adjective' )->delete ();
		$exercise = new Adjective ();
		$exercise->word = 'blau';
		$exercise->comperative = 'blauer';
		$exercise->superlativ = 'am blausten';
		$exercise->save ();
		
		$exercise = new Adjective ();
		$exercise->word = 'rot';
		$exercise->comperative = 'roter';
		$exercise->superlativ = 'am roetsten';
		
		$exercise->save ();
		
		$exercise = new Adjective ();
		$exercise->word = 'schnell';
		$exercise->comperative = 'schneller';
		$exercise->superlativ = 'am schnellsten';
		
		$exercise->save ();
		
		$exercise = new Adjective ();
		$exercise->word = 'gut';
		$exercise->comperative = 'besser';
		$exercise->superlativ = 'bene';
		
		$exercise->save ();
		
		
	}

}