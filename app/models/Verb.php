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
class Verb extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'verbs';

    public function praesensTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'praesenstensepersonconjugation_id');
    }

    public function perfektTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'perfekttensepersonconjugation_id');
    }

    public function praeteritumTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'praeteritumtensepersonconjugation_id');
    }

    public function plusquamperfektTensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'plusquamperfekttensepersonconjugation_id');
    }

    public function futur1TensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'futur1tensepersonconjugation_id');
    }

    public function futur2TensePersonConjugation() {
        return $this->belongsTo('TensePersonConjugation', 'futur2tensepersonconjugation_id');
    }

    public function exerciseVerbs() {
        return $this->hasMany('ExerciseVerb');
    }
    
    public function tenseExerciseTasks() {
        return $this->hasMany('TenseExerciseTask');
    }

    public function getConjugation($person_number, $tensetype_id) {
        switch ($tensetype_id) {
            case TenseType::PRAESENS_TYPE:
                return $this->praesensTensePersonConjugation->getByPersonNumber($person_number);
            case TenseType::PERFEKT_TYPE:
                return $this->perfektTensePersonConjugation->getByPersonNumber($person_number);
            case TenseType::PRAETERITUM_TYPE:
                return $this->praeteritumTensePersonConjugation->getByPersonNumber($person_number);
            case TenseType::PLUSQUAMPERFEKT_TYPE:
                return $this->plusquamperfektTensePersonConjugation->getByPersonNumber($person_number);
            case TenseType::FUTUR1_TYPE:
                return $this->futur1TensePersonConjugation->getByPersonNumber($person_number);
            case TenseType::FUTUR2_TYPE:
                return $this->futur2TensePersonConjugation->getByPersonNumber($person_number);
            default:
                throw new Predis\NotSupportedException;
        }
        
        return null;
    }
}
    