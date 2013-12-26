<?php


class ProfileController extends BaseController {
    
	public function index()
        {
            return  View::make('profile');
        }
}
