<?php


if(!function_exists('isNotLogin')){
    function isNotLogin(){

        $ci =& get_instance();
        if($ci->session->userId == ''){
            redirect(base_url('/session/new'));
        }
    }
}

if(!function_exists('isLogin')){
    function isLogin(){
        
        $ci =& get_instance();

        if($ci->session->userId != ''){
            redirect(base_url('/home'));
        }
    }
}

if(!function_exists('renderPost')){
    function renderPost($postBody){
        $expHashtag = "/#+([a-zA-Z0-9_]+)/";  
        $expMention = "(\@(?P<names>[a-zA-Z\-\_]+))";
        $string = preg_replace($expHashtag, '<a href="'.base_url('/read/hashtag/$1').'">$0</a>', $postBody);  
        $string = preg_replace($expMention, '<a href="'.base_url('/profile/$1').'">$0</a>', $string);  
        echo $string; 
    }
}

if(!function_exists('getRepliesCount')){
    function getRepliesCount($postId){
        $ci =& get_instance();
        $ci->load->model('posts');

        return $ci->posts->RepliesCount($postId);
    }
}

if(!function_exists('getLikesCount')){
    function getLikesCount($postId){
        $ci =& get_instance();
        $ci->load->model('likes');

        return $ci->likes->getByPostCount($postId);
    }
}

if(!function_exists('getPostAuthor')){
    function getPostAuthor($postId){
        $ci =& get_instance();
        $ci->load->model('posts');
        $ci->load->model('users');

        $post = $ci->posts->getById($postId);
        $user = $ci->users->getById($post['user']);

        return $user['name'];
    }
}

if(!function_exists('isPostLiked')){
    function isPostLiked($postId){
        $ci =& get_instance();
        $id = $ci->session->userId;
        $ci->load->model('likes');

        $postLike = $ci->likes->getByPost($postId);

        foreach ($postLike as $row) {
            if($row->user == $id){
                return true;
            }
        }

        return false;
    }
}

?>