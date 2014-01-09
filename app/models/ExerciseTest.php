<?php

class ExerciseTest extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercisetests';
    
    public function tenseExerciseTasks() {
        return $this->hasMany('TenseExerciseTask', 'exercisetest_id');
    }
}

