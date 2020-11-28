<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{        
    
    public function __construct(){
        parent::__construct();

        isNotLogin();
    }

    function index(){

        $this->load->model('posts');

        $title = 'Timeline';
        $posts = $this->posts->getAll();
        
		return view('pages/home', ['title' => $title, 'posts' => $posts]);
    }

    function profile(){

        $title = 'Profile';
        
		return view('pages/profile', ['title' => $title]);
    }

    function performAddPost(){

        $this->load->model('posts');

        $data['body'] = $this->input->post('body');
        $data['user'] = $this->session->userId;
        $data['parent'] = 0;

        $this->posts->save($data);
        
        redirect(base_url('/home'));

    }

    function performLikePost($postId){
        
        $this->load->model('likes');

        $data['post'] = $postId;
        $data['user'] = $this->session->userId;

        $this->likes->save($data);

        redirect(base_url('/home'));
    }

    function performUnlikePost($likeId){
        
        $this->load->model('likes');

        $this->likes->delete($likeId);
        
        redirect(base_url('/home'));
    }

}