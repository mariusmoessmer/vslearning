<?php
class VerbTimeSeeder extends Seeder {

	public function getVerbId($verb) {
		return DB::table('verb')->where('word', $verb)->pluck('id');
	}

	public function run() {
		DB::table('verb_times')->delete();
		
		$exercise = new Times();
		$id = $this->getVerbId("laufen");
		var_dump($id);
		$exercise->verb_id = $id;
		$exercise->futur2 = 'laufen';
		$exercise->futur1 = 'laufen';
		$exercise->praesens = 'laufen';
		$exercise->praeteritum = 'ich lief';
		$exercise->perfekt = 'ich bin gelaufen';
		$exercise->plusquamperfekt = 'ich war laufen';
	}

}