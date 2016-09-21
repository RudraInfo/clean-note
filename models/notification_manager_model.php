<?php

class Notification_manager_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function manage_friend_req($loginuser){
        
          
        $this->db->select('from_user,to_user,avatar');
        $this->db->from('notifications');
        $this->db->join('users','users.username = notifications.from_user');
        $this->db->where(array('notifications.to_user'=>$loginuser,'notifications.did_read'=> 0));
       
        $query = $this->db->get();        
        return $query->result();
                 
     }
      
}


?>
