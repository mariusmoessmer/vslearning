<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of School
 *
 * @author marius
 */
class School extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';
    
    public function schoolClasses() {
        return $this->hasMany('SchoolClass');
    }
    
}
