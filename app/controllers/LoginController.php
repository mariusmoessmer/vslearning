<?php

class LoginController extends BaseController {
    
	public function index()
	{
            return View::make('login');
	}
        
        public function login()
        {
            $user = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );
        
            // user is logged in --> redirect to its profile!
            if (Auth::attempt($user)) {
                return Redirect::route('profile');
            }
            
            // authentication failure! lets go back to the login page
            return Redirect::route('login')
                ->with('flash_error', 'Falscher Benutzername oder falsches Passwort')
                ->withInput();
        }
        
        public function logout()
        {
            Auth::logout();
            return Redirect::route('home')
                ->with('flash_notice', 'You are successfully logged out.');
        }
}