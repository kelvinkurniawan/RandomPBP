<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{        
    
    public function __construct(){
        parent::__construct();

        isNotLogin();
    }

    function getStatus($parentId = 0){
        $this->load->model('posts');
        if($parentId != 0){
            $posts = $this->posts->getAllByParent($parentId);
        }else{
            //$posts = $this->posts->getAll();
            $posts = $this->posts->getPostsFeed($this->session->userId);
        }

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
                'postAuthorUsername' => getPostAuthorUsername($row->id),
                'postAuthorParent' => $postAuthorParent,
                'authorPhoto' => get_images_path(getAuthorPhoto($row->id)),
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
        $this->load->model('users');

        $title = 'Timeline';
        $posts = $this->posts->getAll();
        $users = $this->users->userList($this->session->userId);
        
		return view('pages/home', ['title' => $title, 'posts' => $posts, 'users' => $users]);
    }

    function profile(){

        $this->load->model("posts");
        $this->load->model("follow");
        $this->load->model("users");

        $title = 'Profile';
        $myPosts = $this->posts->getPostsByUserId($this->session->userId, true);
        $myPostsCount = $this->posts->getPostsByUserIdCount($this->session->userId, true);
        $recommendedUsers = $this->users->userList($this->session->userId);
        $following = $this->follow->getFollowingCount($this->session->userId);
        $followers = $this->follow->getFollowersCount($this->session->userId);

		return view('pages/profile', [
            'title' => $title, 
            'myPosts' => $myPosts, 
            'myPostsCount' => $myPostsCount,
            'following' => $following,
            'followers' => $followers,
            'recommendedUsers' => $recommendedUsers
        ]);
    }

    function friends(){

        $this->load->model('follow');

        $title = 'Friends';
        
        $followers = $this->follow->getFollowersCount($this->session->userId);

        $following = $this->follow->getFollowingCount($this->session->userId);

        $followingList = $this->follow->getFollowing($this->session->userId);

		return view('pages/friends', ['title' => $title, 'followers' => $followers, 'following' => $following, 'followingList' => $followingList]);
    }

    function admin(){

        $this->load->model('follow');

        $title = 'Admin';

        $followers = $this->follow->getFollowersCount($this->session->userId);
        $following = $this->follow->getFollowingCount($this->session->userId);
        $followingList = $this->follow->getFollowing($this->session->userId);

		return view('pages/admin', ['title' => $title, 'followers' => $followers, 'following' => $following, 'followingList' => $followingList]);
    }

    function adminDetail(){

        $this->load->model('follow');
        $this->load->model("posts");

        $title = 'Admin Detail';

        $followers = $this->follow->getFollowersCount($this->session->userId);
        $following = $this->follow->getFollowingCount($this->session->userId);
        $followingList = $this->follow->getFollowing($this->session->userId);
        $myPosts = $this->posts->getPostsByUserId($this->session->userId, true);
        $myPostsCount = $this->posts->getPostsByUserIdCount($this->session->userId, true);

		return view('pages/admindetail', ['title' => $title, 'followers' => $followers, 'following' => $following, 'followingList' => $followingList, 'myPosts' => $myPosts, 'myPostsCount' => $myPostsCount]);
    }

    function performAddPost(){
        
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

        $this->posts->save($data);
 
        $result['message'] = 'success';
        $pusher->trigger('status', 'insert', $result);
    }

    function read($postId){
        $this->load->model('posts');

        $title = 'Timeline';
        $post = $this->posts->getById($postId);
        $replies = $this->posts->getReplies($postId);
        
		return view('pages/single', ['title' => $title, 'post' => $post, 'replies' => $replies]);
    }

    function performLikePost($postId){
        
        $this->load->model('likes');

        $data['post'] = $postId;
        $data['user'] = $this->session->userId;

        $this->likes->save($data);

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
    }

    function performUnlikePost($postId){
        
        $this->load->model('likes');

        $this->likes->delete($postId, $this->session->userId);
        
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
    }

    function performFollow($followId){
        $this->load->model('follow');

        $data['userId'] = $this->session->userId;
        $data['followId'] = $followId;
    
        $this->follow->insert($data);

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
    }

    function performUnfollow($followId){
        $this->load->model('follow');

        $userId = $this->session->userId;
    
        $this->follow->delete($userId, $followId);

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
    }

}