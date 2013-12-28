<?php
Route::get('/', array(
		'as' => 'home',
		'uses' => 'LoginController@index'
));

Route::post('/login', 'LoginController@login')->before('guest');

Route::get('/logout', array(
		'as' => 'logout',
		'uses' => 'LoginController@logout'
))->before('auth');

// user profile
Route::get('/profile', array(
		'as' => 'profile',
		'uses' => 'ProfileController@index'
))->before('auth');

// exercies
Route::get('/courses', array(
		'as' => 'profile',
		'uses' => 'LearningController@index'
))->before('auth');
Route::get('/exercises', 'ExerciseController@lst')->before('auth');

Route::get('/times', array(
		'as' => 'times',
		'uses' => 'TimesController@index'
));

Route::get('/konjugations', 'KonjugationsController@index');
Route::get('/konjugations/latest', 'KonjugationsController@latest');
Route::get('/konjugations/wrong', 'KonjugationsController@wrong');
Route::post('/konjugations/{id}/check', 'KonjugationsController@check');

Route::get('/comparisons', array(
		'as' => 'comparisons',
		'uses' => 'ComparisonsController@index'
));

Route::get('/comparisons/wrong', 'ComparisonsController@wrong');
Route::get('/comparisons/latest', 'ComparisonsController@latest');
Route::post('/comparisons/{id}/check', 'ComparisonsController@check');

