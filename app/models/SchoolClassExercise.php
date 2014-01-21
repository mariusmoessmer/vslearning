<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exercise
 *
 * @author marius
 */
class SchoolClassExercise extends BaseEloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schoolclassexercises';
    protected $guarded = array('id', 'created_at', 'updated_at');
    
    public function exercise() {
        return $this->belongsTo('Exercise', 'exercise_id');
    }

}
