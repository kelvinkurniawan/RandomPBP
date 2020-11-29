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

    function performAddPost($postPath){

        $this->load->model('posts');

        $data['body'] = $this->input->post('body');
        $data['user'] = $this->session->userId;
        $data['parent'] = $this->input->post('parent');

        $this->posts->save($data);
        
        if($postPath == 'home'){
            redirect(base_url('/home'));
        }else{ 
            redirect(base_url('/home/read/' . $postPath));
        }
    }

    function read($postId){
        $this->load->model('posts');

        $title = 'Timeline';
        $post = $this->posts->getById($postId);
        $replies = $this->posts->getReplies($postId);
        
		return view('pages/single', ['title' => $title, 'post' => $post, 'replies' => $replies]);
    }

    function performLikePost($postPath, $postId = ""){
        
        $this->load->model('likes');

        $data['post'] = $postId;
        $data['user'] = $this->session->userId;

        $this->likes->save($data);

        if($postPath == 'home'){
            redirect(base_url('/home'));
        }else{ 
            redirect(base_url('/home/read/' . $postPath));
        }
    }

    function performUnlikePost($postPath, $postId){
        
        $this->load->model('likes');

        $this->likes->delete($postId, $this->session->userId);
        
        if($postPath == 'home'){
            redirect(base_url('/home'));
        }else{ 
            redirect(base_url('/home/read/' . $postPath));
        }
    }

}