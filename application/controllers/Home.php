<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{        
    
    public function __construct(){
        parent::__construct();

        isNotLogin();
    }

    function index(){

        $title = 'Timeline';
        
		return view('pages/home', ['title' => $title]);
    }

    function profile(){

        $title = 'Profile';
        
		return view('pages/profile', ['title' => $title]);
    }

}