<?php
class ComparisonsController extends BaseController {

	public function index() {
		$words = $this->getAdjectives();
		$words = sizeof($words);
		$this->layout->content = View::make("pages.exercise.comparisons.index")->with("count", $count);
	}

	public function latest() {
		$words = $this->getAdjectives();
		$this->layout->content = View::make("pages.exercise.writeinput")->with("title", "Die zuletz hinzugefuegten Woerter")->with("words", $words);
	}

	public function wrong() {
		$words = $this->getAdjectives();
		$this->layout->content = View::make("pages.exercise.writeinput")->with("title", "Die falsch beantworteten Woerter")->with("words", $words);
	}
	
	// TODO: Entweder Wahr oder falsch oder halb richtig ?
	public function check($id) {
		$this->autorender = false;
		$result = array(
				'success' => 'false'
		);
		
		if(Input::has("comperativ") && Input::has("superlative")){
			$word = Adjective::find($id);
			
			if($word != null){
				
				$solution = UserSolutionModel::whereRaw("user_id = " . Session::get("id") . " and word_id = " . $word->id)->get()->first();
				
				if($solution == null){
					$solution = new UserSolutionModel();
					$solution->solved = false;
				}else{
					$solution->attempts += 1;
				}
				
				if($solution->solved != true){
					$comp = trim(Input::get("comperativ"));
					$super = trim(Input::get("superlative"));
					
					$result['success'] = true;
					
					if($word->superlativ != $super){
						// $result['super'] = true;
						$result['success'] = false;
					}
					if($word->comperative != $comp){
						// $result['comp'] = true;
						$result['success'] = false;
					}
					
					$solution->user_id = Session::get("id");
					$solution->word_id = $word->id;
					$solution->solved = $result['success'];
					$solution->save();
				}else{
					$result['success'] = true;
				}
			}
		}
		return Response::json($result);
	}

	public function getAdjectives() {
		$words = Adjective::get();
		foreach($words as $word){
			$solution = UserSolutionModel::whereRaw("user_id = " . Session::get("id") . " and word_id = " . $word->id)->get()->first();
			if($solution != null){
				$word->solved = $solution->solved;
			}
		}
		return $words;
	}

}
