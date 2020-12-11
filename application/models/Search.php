<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Model{
    
    function getUser($key = ""){
        $this->db->select('u.name, u.username');
        $this->db->from('users u');
        $this->db->like('u.name', $key);
        $this->db->or_like('u.username', $key);
        return $this->db->get()->result();
    }

    function getHashtag($key = ""){
        $this->db->select('text');
        $this->db->from('hashtag');
        $this->db->like('text', $key);
        return $this->db->get()->result();
    }
}

?>