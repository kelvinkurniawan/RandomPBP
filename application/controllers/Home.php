<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{        
    
    public function __construct(){
        parent::__construct();

        isNotLogin();
    }

    function loadNotification(){
        $id = $this->session->userId;

        $this->load->model('notifications');

        $notif = $this->notifications->getByUserId($id);

        $result = array();

        foreach($notif as $row){
            $temp['id'] = $row->id;
            $temp['message'] = $row->notification;
            $temp['from'] = getUserById($row->user_from, "name");
            $temp['time'] = $row->timestamp;
            $temp['status'] = $row->read_status;

            array_push($result, $temp);
        };

        echo json_encode($result);
    }

    function createNotification($notification, $userId, $userFrom, $postId = null){
        $this->load->model('notifications');

        $data['notification'] = $notification;
        $data['user_id'] = $userId;
        $data['user_from'] = $userFrom;
        $data['post'] = $postId;
        $data['read_status'] = 0;

        $this->notifications->insert($data);
    }

    function openNotification($id, $url){
        $this->load->model('notifications');

        $this->notifications->setStatus($id);

        redirect($url);
    }

    function searchQuery(){
        $key = $this->input->get("q");

        $this->load->model('search');

        $users = $this->search->getUser($key);
        $hashtag = $this->search->getHashtag($key);
        $result['user'] = array();
        $result['hashtag'] = array();

        foreach($users as $user){
            $tempUser['username'] = $user->username;
            $tempUser['name'] = $user->name;

            array_push($result['user'], $tempUser);
        }
        foreach($hashtag as $hash){
            $tempHash['hashtag'] = $hash->text;

            array_push($result['hashtag'], $tempHash);
        }
        echo json_encode($result);
    }

    function hashtag(){

        $this->load->model('posts');
        $this->load->model('users');
        $this->load->model('hashtag');
        $this->load->model('likes');

        $title = 'Timeline';
        $posts = $this->posts->getAll();
        $users = $this->users->userList($this->session->userId);
        $popular = $this->hashtag->getPopular();
        $single = FALSE;
        
		return view('pages/home', [
            'title' => $title, 
            'posts' => $posts, 
            'users' => $users,
            'popular' => $popular,
            'single' => $single
            ]);
    }

    function getStatus($parentId = 0, $type = 0){
        $this->load->model('posts');
        $limit = $this->input->get('limit');
        $hashtag = $this->input->get('hashtag');

        if($parentId != 0){
            $posts = $this->posts->getAllByParent($parentId);
        }else{
            //$posts = $this->posts->getAll();
            if($type == 0){
                $posts = $this->posts->getPostsFeed(3, $limit, $hashtag);
            }else{
                $posts = $this->posts->getPostsByHashtag($hashtag, $limit);
            }
        }
        

        $result = array();

        foreach ($posts as $row) {
            $postAuthorParent = '';

            if($row->parent != 0 && getPostById($row->parent, "anonym") == 0){
                $postAuthorParent = getPostAuthor($row->parent);
            }else if($row->parent != 0 && getPostById($row->parent, "anonym") ==1){
                $postAuthorParent = "Anonym";
            }else{
                $postAuthorParent= '';
            }

            if($row->anonym == 1){
                $postAuthor = "Anonymous";
                $authorPhoto = get_images_path("anon.png");
            }else{
                $postAuthor = getPostAuthor($row->id);
                $authorPhoto = get_images_path(getAuthorPhoto($row->id));
            }

            if($row->have_attachment == 1){
                $file = $row->files;
            }else{
                $file = "";
            }

            $tempResult =  array(
                'postId' => $row->id,
                'postParent' => $row->parent,
                'postBody' => $row->body,
                'postDate' => getCurrentTimestamp($row->id),
                'postAuthor' => $postAuthor,
                'postAuthorUsername' => getPostAuthorUsername($row->id),
                'postAuthorParent' => $postAuthorParent,
                'authorPhoto' => $authorPhoto,
                'haveAttachment' => $row->have_attachment,
                'file' => $file,
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
        $this->load->model('hashtag');
        $this->load->model('likes');

        $title = 'Timeline';
        $posts = $this->posts->getAll();
        $users = $this->users->userList($this->session->userId);
        $popular = $this->hashtag->getPopular();
        $single = FALSE;
        
		return view('pages/home', [
            'title' => $title, 
            'posts' => $posts, 
            'users' => $users,
            'popular' => $popular,
            'single' => $single
            ]);
    }

    function profile($username = null){

        $this->load->model("posts");
        $this->load->model("follow");
        $this->load->model("users");
        $this->load->model('hashtag');


        $title = 'Profile';
        $profile = $this->users->getByUsername($username);
        $popular = $this->hashtag->getPopular();
        $myId = $this->session->userId;
        
        if($username == null){
            $tempId = $this->session->userId;
        }else{
            $tempId = $profile['id'];
        }

        $myPosts = $this->posts->getPostsByUserId($tempId , true);
        $myPostsCount = $this->posts->getPostsByUserIdCount($tempId , true);
        $following = $this->follow->getFollowingCount($tempId);
        $followers = $this->follow->getFollowersCount($tempId);
        $recommendedUsers = $this->users->userList($tempId);
        $userId = $tempId;

		return view('pages/profile', [
            'title' => $title, 
            'myPosts' => $myPosts, 
            'myPostsCount' => $myPostsCount,
            'following' => $following,
            'followers' => $followers,
            'recommendedUsers' => $recommendedUsers,
            'popular' => $popular,
            'profile' => $profile,
            'userId' => $userId,
            'myId' => $myId
        ]);
    }

    function profileUpdate(){
        
        $this->load->model("users");

        $data['name'] = $this->input->post('name');
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['bio'] = $this->input->post('bio');
        $data['birth'] = $this->input->post('birth');
        
        $this->users->update($this->session->userId, $data);

        redirect(base_url('/profile'));
    }

    function friends(){

        $this->load->model('follow');
        $this->load->model("users");
        $this->load->model("hashtag");

        $title = 'Friends';
        
        $followers = $this->follow->getFollowersCount($this->session->userId);
        $recommendedUsers = $this->users->userList($this->session->userId);
        $following = $this->follow->getFollowingCount($this->session->userId);
        $followingList = $this->follow->getFollowing($this->session->userId);
        $followersList = $this->follow->getFollowers($this->session->userId);
        $popular = $this->hashtag->getPopular();

		return view('pages/friends', [
            'title' => $title, 
            'followers' => $followers, 
            'following' => $following, 
            'followingList' => $followingList,
            'followersList' => $followersList,
            'recommendedUsers' => $recommendedUsers,
            'popular'=> $popular
        ]);
    }

    function performAddPost(){
        
        $this->load->model('posts');
        $this->load->model('hashtag');

        $withAttachment = $this->input->post('withAttachment');

        $data['body'] = $this->input->post('body');
        $data['user'] = $this->session->userId;
        $data['parent'] = $this->input->post('parent');
        $data['anonym'] = $this->input->post('anonym');
        $data['have_attachment'] = $this->input->post('withAttachment');

        if($data['parent'] != 0){
            $this->createNotification("reply to your post", getPostById($data['parent'], 'user'), $this->session->userId, $data['parent']);
        }

        if($withAttachment == 1){
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|mp4|3gp|mkv';
            $config['file_name']            = getUserDetail('name') .'-'. date("Y/m/d");
            $config['overwrite']			= true;
            $config['max_size']             = 8500;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $data['files'] = $this->upload->data("file_name");
            }
        }

        $this->posts->save($data);

        $hashtag = getHashtagWidget($this->input->post('body'));

        for($i = 0; $i < count($hashtag); $i++){
            
            $data = $hashtag[$i];
            
            if($this->hashtag->checkHashtag($data) > 0){
                $this->hashtag->update($data);
            }else{
                $tempHash['text'] = $hashtag[$i];
                $tempHash['count'] = 1;
                $this->hashtag->insert($tempHash);
            }

        }

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

        if($withAttachment == 1){
            redirect(base_url());
        }
    }

    function read($postId){
        $this->load->model('posts');
        $this->load->model('users');
        $this->load->model('hashtag');

        $title = 'Timeline';
        $posts = $this->posts->getAll();
        $users = $this->users->userList($this->session->userId);
        $popular = $this->hashtag->getPopular();
        $single = TRUE;
        
		return view('pages/home', [
            'title' => $title, 
            'posts' => $posts, 
            'users' => $users,
            'popular' => $popular,
            'single' => $single,
            'parent' => $postId
            ]);
    }

    function performLikePost($postId){
        
        $this->load->model('likes');

        $data['post'] = $postId;
        $data['user'] = $this->session->userId;

        $this->createNotification("liked your post", getPostById($postId, "user"), $this->session->userId, $postId);

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
    
        $this->createNotification("started following you", $followId, $this->session->userId);

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

    function getPostLikeById($id) {
        $this->load->model('likes');

        $likes = $this->likes->getByPost($id);
        $result = array();
        
        foreach ($likes as $row) {
            $user['name'] = getUserById($row->user, 'name');
            $user['photo'] = get_images_path(getUserById($row->user, 'photo'));
            array_push($result, $user);
        }

        echo json_encode($result);
    }

    function deletePost($id) {
        $this->load->model('posts');
        $this->posts->delete($id);
        redirect('/profile/');
    }

}