<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hashtag extends CI_Model{

    private $table = "hashtag";


    public function getHashtagCount($text){
        $this->db->like('body', $text);
        return $this->db->get($this->table)->num_rows();
    }
}
