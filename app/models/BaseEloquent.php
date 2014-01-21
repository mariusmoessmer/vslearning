<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseEloquent
 *
 * @author marius
 */
class BaseEloquent extends Eloquent
{

    public function getAttributes() {
        if(!$this->attributes) {
            $columns = DB::select('SHOW COLUMNS FROM ' . $this->table);
            $this->attributes = array();
            foreach ($columns as $col) {
                $this->attributes[] = $col->Field;
            }
        }
        return $this->attributes;
    }

    public function assignAttributes() {
        $res = '';
        foreach($this->getAttributes() as $attribute)
        {
            $res = $res.' ' . $attribute;
            $value = null;
            if(Input::has($attribute))
            {
                $value = Input::get($attribute);
            }else if(Input::has(ucfirst($attribute)))
            {
                $value = Input::get(ucfirst($attribute));
            }
            
            $res = $res.' ' . $value;
                
            if($value)
            {
                $this->__set($attribute,$value);
            }
            
        }
        
        return $res;
    }

}
