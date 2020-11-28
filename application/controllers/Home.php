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

    function performAddPost(){

        $this->load->model('posts');

        $data['body'] = $this->input->post('body');
        $data['user'] = $this->session->userId;
        $data['parent'] = $this->input->post('parent');

        $this->posts->save($data);
        
        redirect(base_url('/home'));

    }

}