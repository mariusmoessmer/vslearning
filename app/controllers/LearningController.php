<?php
class LearningController extends BaseController {
	protected $layout = "layouts.master";

	public function index() {
		$courses = array(
				"times",
				"Konjugationen",
				"Vergleiche"
		);
		
		$exercises[0] = Exercise::visible()->where("exercisetype_id", "=", "1")->orderBy('sequence_number', 'ASC')->get();
		$exercises[1] = Exercise::visible()->where("exercisetype_id", "=", "2")->orderBy('sequence_number', 'ASC')->get();
		$exercises[2] = Exercise::visible()->where("exercisetype_id", "=", "3")->orderBy('sequence_number', 'ASC')->get();
		$longest = $this-> findLongest($exercises);
		$this->layout->content = View::make("pages.exercise.courses")->with("courses", $courses)->with("exercises", $exercises)->with("longest",$longest);
	}
	
	public function findLongest($array){
		$max = 0;
		$max0 = sizeof($array[0]);
		$max1 = sizeof($array[1]);
		$max2 = sizeof($array[2]);
		if($max0 > $max1){
			$max = $max0;
		}else{
			$max = $max1;
		}
		
		if($max2 > $max){
			$max = $max2;
		}
		return $max;		
	}

}