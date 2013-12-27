<?php
class LoginController extends BaseController {

	public function index() {
		if(!Auth::check()){
			$this->layout->content = View::make("pages.login.login");
		}else{
			$this->defaultView();
		}
	}

	public function login() {
		if(Input::has("username") && Input::has("password")){
			$user = array(
					"username" => Input::get("username"),
					"password" => Input::get("password")
			);
			
			$validator = Validator::make($user, array(
					'username' => 'required|min:2',
					'password' => 'required|min:2'
			));
			
			if(!$validator->fails() && Auth::attempt($user)){
				Session::put("loggedin", time());
				Session::put("id", 1); 
				$this->defaultView();
				return;
			}
		}
		
		$this->layout->content = View::make("pages.login.login")->with(array(
				"msg" => "Falscher Benutzername oder falsches Passwort",
				"class" => "alert alert-danger"
		));
	}

	public function logout() {
		if(!Auth::check()){
			$this->layout->content = View::make("pages.login.login");
		}else{
			Auth::logout();
			$this->layout->content = View::make("pages.login.login")->with(array(
					"msg" => "Erfolgreich Ausgeloggt",
					"class" => "alert alert-success"
			));
		}
	}

	public function defaultView() {
		$exercises = Exercise::visible()->orderBy('sequence_number', 'DESC')->get();
		$this->layout->content = View::make("pages.profile.profile")->with("exercises", $exercises);
	}

}