<?php

class Unfriend_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
       
    }
    
    public function unfriend($user_to_unfriend,$loginuser){
        
    $this->db->where("((user1 = '$user_to_unfriend') AND (user2 = '$loginuser') AND (accepted = 1) OR ((user1 = '$loginuser') AND (user2 = '$user_to_unfriend') AND (accepted = 1))) ");
    
    $query = $this->db->delete('friends');   
    
    echo "<div class='alert alert-dismissable alert-success'>
    Unfriend ok !
    </div>";
        
    }
    
    
}


?>
