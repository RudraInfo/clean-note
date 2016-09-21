<?php

class About_model extends CI_Model{
    
    public function about_data($username){
        
        $query = $this->db->get_where('users',array('username'=>$username));
        
        return $query->result();
    }
    
    
    
}



?>
