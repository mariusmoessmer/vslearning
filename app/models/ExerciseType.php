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
class ExerciseType extends BaseEloquent {

    const TENSEEXERCISE_TYPE = 1;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercisetypes';
    
     public $timestamps = false;

    public function comments() {
        return $this->hasMany('Exercise');
    }

}
