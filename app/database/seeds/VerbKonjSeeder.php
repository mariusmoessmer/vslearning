<?php
class VerbKonjSeeder extends Seeder {

	public function getVerbId($verb) {
		return DB::table('verb')->where('word', $verb)->pluck('id');
	}

	public function run() {
		DB::table('verb_konjugations')->delete();
		
		$exercise = new Konjugation();
		$exercise->verb_id = $this->getVerbId("laufen");
		$exercise->ich = "laufe";
		$exercise->du = "laeufst";
		$exercise->er_sie_es = "laufen";
		$exercise->wir = "laufen";
		$exercise->ihr = "laeuft";
		$exercise->sie = "laufen";
		$exercise->save();
		
		$exercise = new Konjugation();
		
		$exercise->verb_id = $this->getVerbId("stehen");
		$exercise->ich = "stehe";
		$exercise->du = "stehst";
		$exercise->er_sie_es = "steht";
		$exercise->wir = "stehen";
		$exercise->ihr = "steht";
		$exercise->sie = "stehe";
		$exercise->save();
		
		$exercise = new Konjugation();
		$exercise->verb_id = $this->getVerbId("gehen");
		$exercise->ich = "gehe";
		$exercise->du = "gehst";
		$exercise->er_sie_es = "geht";
		$exercise->wir = "gehen";
		$exercise->ihr = "geht";
		$exercise->sie = "gehen";
		$exercise->save();
		
		$exercise = new Konjugation();
		$exercise->verb_id = $this->getVerbId("schwimmen");
		
		$exercise->ich = "schwimme";
		$exercise->du = "schwimmst";
		$exercise->er_sie_es = "schwimmen";
		$exercise->wir = "schwimmen";
		$exercise->ihr = "schwimmt";
		$exercise->sie = "schwimmen";
		$exercise->save();
	}

}