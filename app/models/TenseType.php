<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TenseType
 *
 * @author marius
 */
class TenseType extends Eloquent {
    const PRAESENS_TYPE = 1;
    const PERFEKT_TYPE = 2;
    const PRAETERITUM_TYPE = 3;
    const PLUSQUAMPERFEKT_TYPE = 4;
    const FUTUR1_TYPE = 5;
    const FUTUR2_TYPE = 6;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tensetypes';
    
     public $timestamps = false;

    public function tensePersonConjugations() {
        return $this->hasMany('TensePersonConjugation');
    }

}