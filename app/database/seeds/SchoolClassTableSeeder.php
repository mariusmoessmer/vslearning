<?php

class SchoolClassTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schools')->delete();
        $school = new School;
        $school->name = 'Volksschule Hermann Gmeiner';
        $school->save();        
        
        
        DB::table('schoolclasses')->delete();
        $schoolclass = new SchoolClass;
        $schoolclass->name = '1. Klasse';
        $schoolclass->school_id = $school->id;
        $schoolclass->save();        
    }
}