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

// exerciestest
Route::get('exercisetest/{id}/create', 'ExerciseTestController@createByExerciseId')->before('auth');
Route::get('exercisetest/{id}', 'ExerciseTestController@get')->before('auth');
Route::put('exercisetest/{id}', 'ExerciseTestController@update')->before('auth');

Route::get('administration', array('as' => 'administration.index', 'uses' => 'AdministrationController@index'))->before('auth');
Route::get('administration/schools', array('as' => 'administration.schools.index', 'uses' => 'AdministrationController@index'))->before('auth');
Route::get('administration/classes', array('as' => 'administration.classes.index', 'uses' => 'AdministrationController@index'))->before('auth');
Route::get('administration/exercises', array('as' => 'administration.exercises.index', 'uses' => 'AdministrationController@index'))->before('auth');


Route::resource('exercises', 'ExerciseController');
Route::resource('exerciseverbs', 'ExerciseVerbController');
Route::get('exerciseverbs/{attributeName}/{value}', 'ExerciseVerbController@findByAttribute');
// verb
Route::resource('verbs', 'VerbController');
Route::resource('schools', 'SchoolController');
Route::resource('schoolclasses', 'SchoolClassController');
Route::resource('tensepersonconjugations', 'TensePersonConjugationController');
Route::resource('schoolclassexercises', 'SchoolClassExercisesController');
Route::get('schoolclassexercises/{attributeName}/{value}', 'SchoolClassExercisesController@findByAttribute');
Route::resource('users', 'UserController');
Route::get('users/{attributeName}/{value}', 'UserController@findByAttribute');
