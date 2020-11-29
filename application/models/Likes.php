<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Likes extends CI_Model{

    private $table = "likes";

    public function getByPostCount($postId){
        $this->db->where('post', $postId);
        return $this->db->get($this->table)->num_rows();
    }

    public function getByPost($postId){
        $this->db->where('post', $postId);
        return $this->db->get($this->table)->result();
    }
    
    public function save($data){
        return $this->db->insert($this->table, $data);
    }

    public function delete($postId, $userId){
        $this->db->where('post', $postId);
        $this->db->where('user', $userId);
        return $this->db->delete($this->table);
    }

}

?>