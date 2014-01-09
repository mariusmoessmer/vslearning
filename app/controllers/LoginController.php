<?php

class LoginController extends BaseController {

    public function index() {
        if (!Auth::check()) {
            return View::make("pages.login.login");
        }
    }

    public function login() {
        if (Input::has('username') && Input::has('password')) {
            $user = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            $validator = Validator::make($user, array(
                        'username' => 'required|min:2',
                        'password' => 'required|min:2'
            ));

            // user is logged in --> redirect to its profile!
            if (!$validator->fails() && Auth::attempt($user)) {
                return Redirect::route('profile');
            }
        }

        // authentication failure! lets go back to the login page
        return Redirect::route('login')
                        ->with('flash_error', 'Falscher Benutzername oder falsches Passwort')
                        ->withInput();
    }

    public function logout() {
        if (!Auth::check()) {
            $this->layout->content = View::make("pages.login.login");
        } else {
            Auth::logout();
            return Redirect::route('home')
                            ->with('flash_notice', 'You are successfully logged out.');
        }
    }

}
