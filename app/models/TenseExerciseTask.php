<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TenseExerciseTask extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tenseexercisetasks';

    public function exerciseTest() {
        return $this->belongsTo('ExerciseTest', 'exercisetest_id');
    }

    public function verb() {
        return $this->belongsTo('Verb', 'verb_id');
    }
    
    public function tenseType() {
        return $this->belongsTo('TenseType', 'tensetype_id');
    }
    
    public function getCorrectAnswer() {
        return $this->verb->getConjugation($this->person_number, $this->tensetype_id);
    }
    
    public function set_answer_is_correct($answer_is_correct)
    {
        $this->answer_is_correct = ($answer_is_correct ? 1 : 0);
    }

}
