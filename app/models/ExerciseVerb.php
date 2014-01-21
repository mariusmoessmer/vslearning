<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ExerciseVerb extends BaseEloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exerciseverbs';
    protected $guarded = array('id', 'created_at', 'updated_at');
    public function verb() {
        return $this->belongsTo('Verb');
    }
    
    public function exercise() {
        return $this->belongsTo('Exercise');
    }
    
}