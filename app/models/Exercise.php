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
class Exercise extends BaseEloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercises';
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function exerciseType() {
        return $this->belongsTo('ExerciseType');
    }

    public function scopeVisible($query) {
        return $query->where('visible', '=', 1);
    }
    
    
    public function configurationObj() {
        return json_decode($this->configuration_json);
    }
    
    public function exerciseVerbs() {
        return $this->hasMany('ExerciseVerb');
    }    
    
    public function schoolClassExercises() {
        return $this->hasMany('SchoolClassExercise');
    }

}
