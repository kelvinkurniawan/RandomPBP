<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{        
    
    public function __construct(){
        parent::__construct();

        //isNotLogin();
    }

    function getStatus(){
        $this->load->model('posts');
        $posts = $this->posts->getAll();

        $result = array();

        foreach ($posts as $row) {
            $postAuthorParent = '';
            if($row->parent != 0){
                $postAuthorParent = getPostAuthor($row->parent);
            }else{
                $postAuthorParent= '';
            }
            $tempResult =  array(
                'postId' => $row->id,
                'postParent' => $row->parent,
                'postBody' => $row->body,
                'postDate' => $row->timestamp,
                'postAuthor' => getPostAuthor($row->id),
                'postAuthorParent' => $postAuthorParent,
                'authorPhoto' => get_images_path('photo.png'),
                'postMeta' => array(
                    'postLikes' => getLikesCount($row->id),
                    'postReplies' => getRepliesCount($row->id),
                    'postTags' => getHashtagWidget($row->body),
                    'isLiked' => isPostLiked($row->id)
                )
            );

            array_push($result, $tempResult);
        }
        
        echo json_encode($result);
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

    function friends(){

        $title = 'Friends';
        
		return view('pages/friends', ['title' => $title]);
    }

    function performAddPost($postPath){
        
        $this->load->model('posts');

        $data['body'] = $this->input->post('body');
        $data['user'] = $this->session->userId;
        $data['parent'] = $this->input->post('parent');

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        
        $pusher = new Pusher\Pusher(
            'd9a7263363532f7ffbb5',
            '8698c39b26359fcc185a',
            '1115050',
            $options
        );
 
        $result['message'] = 'success';
        $pusher->trigger('status', 'insert', $result);

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