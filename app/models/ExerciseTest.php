<?php

class ExerciseTest extends BaseEloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercisetests';
    
    public function tenseExerciseTasks() {
        return $this->hasMany('TenseExerciseTask', 'exercisetest_id');
    }
    
    protected $visible = array('id', 'tenseExerciseTasks');
}

