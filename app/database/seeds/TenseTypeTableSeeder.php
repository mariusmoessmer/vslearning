<?php

class TenseTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tensetypes')->delete();
        $tensetype = new TenseType;
        $tensetype->id = TenseType::PRAESENS_TYPE;
        $tensetype->name = 'Präsens';
        $tensetype->save();
        
        $tensetype = new TenseType;
        $tensetype->id = TenseType::PERFEKT_TYPE;
        $tensetype->name = 'Perfekt';
        $tensetype->save();
        
        $tensetype = new TenseType;
        $tensetype->id = TenseType::PRAETERITUM_TYPE;
        $tensetype->name = 'Präteritum';
        $tensetype->save();
        
        $tensetype = new TenseType;
        $tensetype->id = TenseType::PLUSQUAMPERFEKT_TYPE;
        $tensetype->name = 'Plusquamperfekt';
        $tensetype->save();
        
        $tensetype = new TenseType;
        $tensetype->id = TenseType::FUTUR1_TYPE;
        $tensetype->name = 'Futur 1';
        $tensetype->save();
        
        $tensetype = new TenseType;
        $tensetype->id = TenseType::FUTUR2_TYPE;
        $tensetype->name = 'Futur 2';
        $tensetype->save();
    }
}