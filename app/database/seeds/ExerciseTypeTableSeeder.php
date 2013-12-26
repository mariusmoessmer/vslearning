<?php

class ExerciseTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('exercisetypes')->delete();
        $exerciseType = new ExerciseType;
        $exerciseType->id = ExerciseType::TENSEEXERCISE_TYPE;
        $exerciseType->name = 'Tense Exercise';
        $exerciseType->save();
    }
}