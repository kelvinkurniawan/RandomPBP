<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Model{

    private $table = 'notifications';

    public function getByUserId($id){
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->result();
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    public function setStatus($id){
        $this->db->set('read_status', 1);
        $this->db->where('id', $id);
        return $this->db->update($this->table);
    }

}