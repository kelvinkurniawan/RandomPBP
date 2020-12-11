<?php

class Admin extends CI_Controller{
    function index(){
        $this->load->model('follow');
        $this->load->model('users');
        $this->load->model("posts");

        $title = 'Admin';

        $followers = $this->follow->getFollowersCount($this->session->userId);
        $following = $this->follow->getFollowingCount($this->session->userId);
        $followingList = $this->follow->getFollowing($this->session->userId);
        $userList = $this->users->getAll();
        $totalPost = $this->posts->getTotalPost();
        $totalUser = $this->users->getTotalUser();

		return view('pages/admin', [
            'title' => $title, 
            'followers' => $followers, 
            'following' => $following, 
            'followingList' => $followingList,
            'totalPost'=>$totalPost,
            'userList'=>$userList,
            'totalUser'=>$totalUser
            ]);
    }

    function detail($id){

        $this->load->model('follow');
        $this->load->model("posts");
        $this->load->model('users');

        $title = 'Admin Detail';

        $followers = $this->follow->getFollowersCount($id);
        $following = $this->follow->getFollowingCount($id);
        $followingList = $this->follow->getFollowing($id);
        $myPosts = $this->posts->getPostsByUserId($id, true);
        $myPostsCount = $this->posts->getPostsByUserIdCount($id, true);
        $totalPost = $this->posts->getTotalPost();
        $totalUser = $this->users->getTotalUser();

		return view('pages/admindetail', [
            'title' => $title, 
            'followers' => $followers, 
            'following' => $following, 
            'followingList' => $followingList, 
            'myPosts' => $myPosts, 
            'myPostsCount' => $myPostsCount,
            'id'=> $id,
            'totalPost'=>$totalPost,
            'totalUser'=>$totalUser
            ]);
    }

    function deletePost($userId, $id){
        $this->load->model('posts');

        $this->posts->delete($id);

        redirect('/admin/detail/'.$userId);
    }

    function deleteUser($id){
        $this->load->model('users');

        $this->users->delete($id);

        redirect('/admin/');
    }
}