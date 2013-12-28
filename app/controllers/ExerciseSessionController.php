<?php
class ExerciseSessionController extends BaseController {

	public function index() {
		$exercises = Exercise::visible()->orderBy('sequence_number')->get();
		
		return View::make('profile', array(
				'exercises' => $exercises
		));
	}

}

