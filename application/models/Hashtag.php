<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hashtag extends CI_Model{

    private $table = "hashtag";

    public function getHashtagCount($text){
        $this->db->like('body', $text);
        return $this->db->get($this->table)->num_rows();
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    public function getCurrentCount($text){
        $this->db->where('text', $text);
        $q = $this->db->get($this->table)->row_array();
        return $q['count'];
    }

    public function update($text){
        $this->db->set('count', $this->getCurrentCount($text) + 1);
        $this->db->where('text', $text);
        return $this->db->update($this->table);
    }

    public function checkHashtag($text){
        $this->db->where('text', $text);
        return $this->db->get($this->table)->num_rows();
    }

    public function getPopular(){
        $this->db->limit(5);
        $this->db->order_by('count', 'DESC');
        return $this->db->get($this->table)->result();
    }
}
