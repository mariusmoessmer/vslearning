<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Verb
 *
 * @author marius
 */
class Verb extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'verbs';
    
    public function praesensTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function perfektTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function praeteritumTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function plusquamperfektTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function futur1TensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function futur2TensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation');
    }
    
    public function exerciseVerbs() {
        return $this->hasMany('ExerciseVerb');
    }    
    
}
