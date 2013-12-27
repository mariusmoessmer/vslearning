<?php
class ProfileController extends BaseController {

	public function index() {
		$this->defaultView();
	}

	public function defaultView() {
		$exercises = Exercise::visible()->orderBy('sequence_number', 'DESC')->get();
		$this->layout->content = View::make("pages.profile.profile")->with("exercises", $exercises);
	}

}
