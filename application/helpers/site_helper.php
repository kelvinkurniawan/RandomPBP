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
        $expHashtag = "(\#(?P<hashtag>[a-zA-Z\-\_]+))";  
        $expMention = "(\@(?P<names>[a-zA-Z\-\_]+))";
        $string = preg_replace($expHashtag, '<a href="'.base_url('/read/hashtag/$1').'">$0</a>', $postBody);  
        $string = preg_replace($expMention, '<a href="'.base_url('/profile/$1').'">$0</a>', $string);  
        echo $string; 
    }
}

if(!function_exists('getHashtagWidget')){
    function getHashtagWidget($postBody){
        $result = [];
        $expHashtag = "(\#(?P<hashtag>[a-zA-Z\-\_]+))";  
        preg_match_all($expHashtag, $postBody, $result);  
        return $result['hashtag']; 
    }
}

if(!function_exists('getRepliesCount')){
    function getRepliesCount($postId){
        $ci =& get_instance();
        $ci->load->model('posts');

        return $ci->posts->RepliesCount($postId);
    }
}

if(!function_exists('getUserDetail')){
    function getUserDetail($row){
        $ci =& get_instance();
        $ci->load->model('users');
        $user = $ci->users->getById($ci->session->userId);
        return $user[$row];
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

if(!function_exists('getPostAuthorUsername')){
    function getPostAuthorUsername($postId){
        $ci =& get_instance();
        $ci->load->model('posts');
        $ci->load->model('users');

        $post = $ci->posts->getById($postId);
        $user = $ci->users->getById($post['user']);

        return $user['username'];
    }
}

if(!function_exists('getAuthorPhoto')){
    function getAuthorPhoto($postId){
        $ci =& get_instance();
        $ci->load->model('posts');
        $ci->load->model('users');

        $post = $ci->posts->getById($postId);
        $user = $ci->users->getById($post['user']);

        return $user['photo'];
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

if(!function_exists('isUserFollowed')){
    function isUserFollowed($followId){
        $ci =& get_instance();

        $id = $ci->session->userId;
        $ci->load->model('follow');

        $check = $ci->follow->getByUserAndFollow($id, $followId);

        if($check->num_rows() > 0){
            return true;
        }

        return false;
    }
}

if(!function_exists('getUserById')){
    function getUserById($id, $row){
        $ci =& get_instance();

        $ci->load->model("users");

        $user = $ci->users->getById($id); 

        return $user[$row];
    }
}

if(!function_exists('getPostById')){
    function getPostById($id, $row){
        $ci =& get_instance();

        $ci->load->model("posts");

        $post = $ci->posts->getById($id); 

        return $post[$row];
    }
}

if(!function_exists('getHashtagCount')){
    function getHashtagCount($id){
        $ci =& get_instance();

        $ci->load->model("hashtag");

        $hashtag = $ci->posts->getById($id); 

        return $hashtag[$row];
    }
}

if(!function_exists('getCurrentTimestamp')){
    function getCurrentTimestamp($id){
        $ci =& get_instance();

        $ci->load->model("posts");

        $postTime = getPostById($id, 'timestamp');

        $time_difference = time() - strtotime($postTime);

        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
        
    }
}
?>