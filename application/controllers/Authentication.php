<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index(){

        $title = 'Sign In';
        
		return view('sign-in', ['title' => $title]);
	}

	public function register(){

        $title = 'Sign Up';
        
		return view('sign-up', ['title' => $title]);
	}

}
