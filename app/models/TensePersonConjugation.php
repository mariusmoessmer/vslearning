<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TensePersonConjugation extends BaseEloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tensepersonconjugations';
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function tenseType() {
        return $this->belongsTo('TenseType');
    }

    public function getByPersonNumber($person_number) {
        switch ($person_number) {
            case 1: return $this->firstperson_singular;
            case 2: return $this->secondperson_singular;
            case 3: return $this->thirdperson_singular;
            case 4: return $this->firstperson_plural;
            case 5: return $this->secondperson_plural;
            case 6: return $this->thirdperson_plural;
        }
    }

}
