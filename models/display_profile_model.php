<?php
 
class Display_profile_model extends CI_Model{
    
     function __construct() {
        parent::__construct();
          
    }
    
   public function display_profile($user){
   
       
    $query  = $this->db->get_where('users',array('username'=>$user));
    
    foreach ($query->result() as $wer);
       {
        
        $avtar = $wer->avatar;
           
       }
             
   $loginuser = $_SESSION['username'];  
   
      
   $this->db->where(array('user1'=>$loginuser,'user2'=>$user,'accepted'=> 0));
   $query1=$this->db->get('friends');
   $friend_req_sent = $query1->num_rows();  
   
     
   $this->db->where(array('user2'=>$loginuser,'user1'=>$user,'accepted'=> 0));
   $query2=$this->db->get('friends');
   $confirm_req = $query2->num_rows();
   
  
 
   
   $this->db->where("((user1 = '$user') AND (user2 = '$loginuser') AND (accepted = 1) OR ((user1 = '$loginuser') AND (user2 = '$user') AND (accepted = 1))) ");
   
   
   $query3 = $this->db->get('friends');
    
   $friendsip = $query3->num_rows();
        
   $data = array('avtar'=>$avtar,'friend_req_sent'=>$friend_req_sent,'confirm_req'=>$confirm_req,'friendsip'=>$friendsip);
   
   return $data;
      
       }
   
 
   
    
    
}


?>
