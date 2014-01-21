<?php


class AdministrationController extends BaseController {
    
	public function index()
        {
            return  View::make('pages.administration.administration');
        }
}
