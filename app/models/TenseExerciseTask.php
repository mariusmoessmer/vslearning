<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TenseExerciseTask extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tenseexercisetasks';
    
    public function exerciseTest() {
        return $this->belongsTo('ExerciseTest', 'exercisetest_id');
    }
    
}
