<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{

    private $table = "users";

    public function getAll(){
        return $this->db->get($this->table)->result();
    }
    public function getTotalUser(){
        return $this->db->get($this->table)->num_rows();
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function getByUsername($username){
        $this->db->where('username', $username);
        return $this->db->get($this->table)->row_array();
    }

    public function userList($userId, $limit = 10){

        $this->load->model('follow');       
        
        
        $following = $this->follow->getFollowing($userId);
        $userlist = array();

        $this->db->order_by('id', 'DESC');

        if(count($following) > 0){
            foreach ($following as $row) {
                array_push($userlist,$row->followId);
            }
            $this->db->or_where_not_in('id', $userlist);
        }

        $this->db->where('id !=', $userId);
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    } 

    public function getById($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
    }
    public function delete($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
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