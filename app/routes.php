<?php

// globale
Route::get('/', array('as' => 'home', function(){
    // if user is not logged in --> redirect to login-page immediately
    if (Auth::guest()) {
        return Redirect::route('login');
    }
    // if user is already logged in --> redirect to its profile-page immediately
    else if(Auth::check()) {
        return Redirect::route('profile');
    }
    else
    {
        throw new Exception("unknown Marius-State!");
    }
}));

// login and logout
Route::get('login', array('as' => 'login', 'uses' => function(){
    // once a user is logged --> do not show login-view again!
    if(Auth::check()) {
        return Redirect::route('profile');
    }else
    {
        return (new LoginController)->index();
    }
}));
Route::post('login', 'LoginController@login')->before('guest');
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'))->before('auth');

// user profile
Route::get('profile', array('as' => 'profile', 'uses' => 'ProfileController@index'))->before('auth');

// exercies
Route::get('exercises', 'ExerciseController@lst')->before('auth');
Route::get('exercisetest/{id}/create', 'ExerciseTestController@create')->before('auth');
Route::get('exercisetest/{id}', 'ExerciseTestController@get')->before('auth');