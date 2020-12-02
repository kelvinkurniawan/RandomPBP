<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Follow extends CI_Model{

    private $table = "follow";

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    public function delete($userId, $followId){
        $this->db->where("userId", $userId);
        $this->db->where("followId", $followId);
        return $this->db->delete($this->table);
    }

    public function getByUserAndFollow($userId, $followId){
        $this->db->where("userId", $userId);
        $this->db->where("followId", $followId);
        return $this->db->get($this->table);
    }

    public function getFollowersCount($userId){
        $this->db->where("followId", $userId);
        return $this->db->get($this->table)->num_rows();
    }

    public function getFollowingCount($userId){
        $this->db->where("userId", $userId);
        return $this->db->get($this->table)->num_rows();
    }
    
    public function getFollowing($userId){
        $this->db->where("userId", $userId);
        return $this->db->get($this->table)->result();
    }
}