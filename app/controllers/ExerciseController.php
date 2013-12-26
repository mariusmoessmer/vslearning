<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExerciseController
 *
 * @author marius
 */
class ExerciseController extends BaseController{
    
        public function lst()
        {
            $exercises = Exercise::visible()->orderBy('sequence_number', 'DESC')->get();
            return $exercises->toJson();
        }
}
