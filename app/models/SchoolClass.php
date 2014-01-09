<?php

class SchoolClass extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schoolclasses';
    
    public function school() {
        return $this->belongsTo('School');
    }
}

