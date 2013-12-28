<?php
class KonjugationsController extends BaseController {

	public function index() {
	$words = $this->getAdjectives();
		$this->layout->content = View::make("pages.exercise.verbs.konjugation.complexinput")->with("title", "Die zuletz hinzugefuegten Woerter")->with("words", $words);
		
	}

	public function latest() {
		$words = $this->getAdjectives();
		$this->layout->content = View::make("pages.exercise.verbs.konjugation.complexinput")->with("title", "Die zuletz hinzugefuegten Woerter")->with("words", $words);
	}

	public function wrong() {
		$words = $this->getAdjectives();
		$this->layout->content = View::make("pages.exercise.verbs.konjugation.complexinput")->with("title", "Die falsch beantworteten Woerter")->with("words", $words);
	}

	public function check($id) {
		$this->autorender = false;
		$result = array(
				'success' => 'false'
		);
		
		echo "here";
		var_dump(Input::all());
	}

	public function getAdjectives() {
		$words = Verb::get();
		/*
		 * foreach($words as $word){ $solution = UserSolutionModel::whereRaw("user_id = " . Session::get("id") . " and word_id = " . $word->id)->get()->first(); if($solution != null){ $word->solved = $solution->solved; } }
		 */
		return $words;
	}

}