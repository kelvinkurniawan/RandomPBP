<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model{

    private $table = "posts";

    public function getAll(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->result();
    }    
    
    public function getAllRow(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->row_array();
    }

    public function getById($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }
    
    public function getReplies($parent){
        $this->db->where('parent', $parent);
        return $this->db->get($this->table)->result();
    }

    public function RepliesCount($id){
        $this->db->where('parent', $id);
        return $this->db->get($this->table)->num_rows();
    }

    public function save($data){
        return $this->db->insert($this->table, $data);
    }
}

?>