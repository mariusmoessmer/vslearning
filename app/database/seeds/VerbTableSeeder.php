<?php

class VerbTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tensepersonconjugations')->delete();
        $praesensTensePersonConjugation = new TensePersonConjugation;
        $praesensTensePersonConjugation->firstperson_singular = 'ich |laufe|';
        $praesensTensePersonConjugation->secondperson_singular = 'du |läufst|';
        $praesensTensePersonConjugation->thirdperson_singular = 'er/sie/es |läuft|';
        $praesensTensePersonConjugation->firstperson_plural = 'wir |laufen|';
        $praesensTensePersonConjugation->secondperson_plural = 'ihr |läuft|';
        $praesensTensePersonConjugation->thirdperson_plural = 'sie |laufen|';
        $praesensTensePersonConjugation->tensetype_id = TenseType::PRAESENS_TYPE;
        $praesensTensePersonConjugation->save();
        
        $praeteritumTensePersonConjugation = new TensePersonConjugation;
        $praeteritumTensePersonConjugation->firstperson_singular = 'ich |lief|';
        $praeteritumTensePersonConjugation->secondperson_singular = 'du |liefst|';
        $praeteritumTensePersonConjugation->thirdperson_singular = 'er/sie/es |lief|';
        $praeteritumTensePersonConjugation->firstperson_plural = 'wir |liefen|';
        $praeteritumTensePersonConjugation->secondperson_plural = 'ihr |lieft|';
        $praeteritumTensePersonConjugation->thirdperson_plural = 'sie |liefen|';
        $praeteritumTensePersonConjugation->tensetype_id = TenseType::PRAETERITUM_TYPE;
        $praeteritumTensePersonConjugation->save();
        
        $perfektTensePersonConjugation = new TensePersonConjugation;
        $perfektTensePersonConjugation->firstperson_singular = 'ich |bin gelaufen|';
        $perfektTensePersonConjugation->secondperson_singular = 'du |bist gelaufen|';
        $perfektTensePersonConjugation->thirdperson_singular = 'er/sie/es |ist gelaufen|';
        $perfektTensePersonConjugation->firstperson_plural = 'wir |sind gelaufen|';
        $perfektTensePersonConjugation->secondperson_plural = 'ihr seid |gelaufen|';
        $perfektTensePersonConjugation->thirdperson_plural = 'sie sind |gelaufen|';
        $perfektTensePersonConjugation->tensetype_id = TenseType::PERFEKT_TYPE;
        $perfektTensePersonConjugation->save();
        
        
        DB::table('verbs')->delete();
        $verb = new Verb;
        $verb->infinitive = 'laufen';
        $verb->praesenstensepersonconjugation_id = $praesensTensePersonConjugation->id;
        $verb->perfekttensepersonconjugation_id = $perfektTensePersonConjugation->id;
        $verb->praeteritumtensepersonconjugation_id = $praeteritumTensePersonConjugation->id;
        $verb->save();
    }
}