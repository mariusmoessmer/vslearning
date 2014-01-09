<?php

class ExerciseTableSeeder extends Seeder {

    public function run()
    {
        DB::table('exercises')->delete();
        $exercise = new Exercise;
        $exercise->name = 'Zeitformen 1';
        $exercise->description = 'Lerne das Konjugieren vom Infinitiv in die Mitvergangenheit und Vergangenheit';
        $exercise->explanation = 'Fülle die fehlenden Wörter in der entsprechenden Zeitform und Person ein';
        $exercise->visible = true;
        $exercise->sequence_number = 1;
        $exercise->configuration_json = 
                '{'
                . '"use_praesens":true,'
                . '"use_praeteritum":true,'
                . '"use_perfekt":true,'
                . '"use_plusquamperfekt":false,'
                . '"use_futur1":false,'
                . '"use_futur2":false,'
                . '"use_person1SG":true,'
                . '"use_person2SG":true,'
                . '"use_person3SG":false,'
                . '"use_person1PL":false,'
                . '"use_person2PL":false,'
                . '"use_person3PL":true'
                . '}';
        $exercise->exercisetype_id = ExerciseType::TENSEEXERCISE_TYPE;
        $exercise->schoolclass_id = SchoolClass::all()->first()->id;
        $exercise->save();
        
        foreach(Verb::get() as $verb)
        {
            $exerciseVerb = new ExerciseVerb;
            $exerciseVerb->exercise_id = $exercise->id;
            $exerciseVerb->verb_id = $verb->id;
            $exerciseVerb->save();
        }
        
        
        $exercise = new Exercise;
        $exercise->name = 'Exercise 2 Name';
        $exercise->description = 'Exercise 2 Description';
        $exercise->explanation = 'Exercise 2 Explanation';
        $exercise->visible = true;
        $exercise->sequence_number = 3;
        $exercise->exercisetype_id = ExerciseType::TENSEEXERCISE_TYPE;
        $exercise->schoolclass_id = SchoolClass::all()->first()->id;
        $exercise->save();
        
        $exercise = new Exercise;
        $exercise->name = 'Exercise 4 Name';
        $exercise->description = 'Exercise 4 Description';
        $exercise->explanation = 'Exercise 4 Explanation';
        $exercise->visible = true;
        $exercise->sequence_number = 4;
        $exercise->exercisetype_id = ExerciseType::TENSEEXERCISE_TYPE;
        $exercise->schoolclass_id = SchoolClass::all()->first()->id;
        $exercise->save();
        
        
        $invisble_exercise = new Exercise;
        $invisble_exercise->name = 'INVISBLE';
        $invisble_exercise->description = 'INVISIBLE';
        $invisble_exercise->explanation = 'INVISBLE';
        $invisble_exercise->visible = false;
        $invisble_exercise->sequence_number = 2;
        $invisble_exercise->exercisetype_id = ExerciseType::TENSEEXERCISE_TYPE;
        $exercise->schoolclass_id = SchoolClass::all()->first()->id;
        $invisble_exercise->save();
    }
}