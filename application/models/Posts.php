<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model{

    private $table = "posts";

    public function getAll(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->result();
    }    

    public function getPostsFeed($userId){
        $this->load->model('follow');
        
        $following = $this->follow->getFollowing($userId);
        $userlist = array();

        $this->db->order_by('id', 'DESC');
        $this->db->where('user', $userId);

        if(count($following) > 0){
            foreach ($following as $row) {
                array_push($userlist,$row->followId);
            }
            $this->db->or_where_in('user', $userlist);
        }

        return $this->db->get($this->table)->result();
    }

    public function getAllByParent($parentId){
        $this->db->where('id', $parentId);
        $this->db->or_where('parent', $parentId);
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

    public function getPostsByUserId($id, $parentOnly = false){
        $this->db->order_by('id', 'DESC');
        $this->db->where('user', $id);
        if($parentOnly) $this->db->where('parent', 0);
        return $this->db->get($this->table)->result();
    }

    public function getPostsByUserIdCount($id, $parentOnly = false){
        $this->db->where('user', $id);
        if($parentOnly) $this->db->where('parent', 0);
        return $this->db->get($this->table)->num_rows();
    }
}

?>