<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{

    private $table = "users";

    public function getAll(){
        return $this->db->get($this->table)->result();
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
    }

    public function getByEmailAndPassword($email, $password){
        
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("email", $email);

        $query = $this->db->get();
        $user = $query->row();

        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}