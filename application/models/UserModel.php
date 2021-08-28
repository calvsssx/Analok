<?php

class UserModel extends CI_Model{ 
    
    public function registerUser($data){
        return $this->db->insert('Customer', $data);
    }
    
    public function getUsers(){
        $query = $this->db->get('user');
        return $query->result();
    }

    public function loginUser($data){
        $this->db->select('*');
        $this->db->where('uname', $data['uname']);
        $this->db->where('password', $data['password']);
        $this->db->from('user');
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getOldPass($userid){
        $query = $this->db->where(['id' => $userid]);
        $query = $this->db->get('user');

        if($query->num_rows() > 0){
            return $query->row();
        }
    }

    public function upPass($newpass,  $userid){
        $data = array(
            'password' => $newpass 
        );
        return $this->db->where('id', $userid)
                        ->update('user', $data);
    }

    public function editUser($id){
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row();
    }

    public function updateUser($data, $id){
        return $this->db->update('user', $data, ['id' => $id]);
    }
}

?>