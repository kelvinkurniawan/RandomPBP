<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model{

    private $table = "posts";

    public function getAll(){
        return $this->db->get($this->table)->result();
    }

    public function save($data){
        return $this->db->insert($this->table, $data);
    }
}

?>