<?php

class SchoolClass extends BaseEloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schoolclasses';
    protected $guarded = array('id', 'created_at', 'updated_at');
    
    public function school() {
        return $this->belongsTo('School');
    }
}

