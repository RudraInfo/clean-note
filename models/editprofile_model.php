<?php
class Editprofile_model extends CI_Model{
    
    public function update_profile($username,$data){
        
        $this->db->update('users',$data,array('username'=>$username)); 
        
        echo "Thank you for update your data with us" ;  
        
    }
    
    public function change_password($username,$curr_pass,$new_pass)
    {
        
        $query = $this->db->get_where('users',array('username'=>$username,'password'=>$curr_pass));
        
        if($query->num_rows > 0)
        {
            $data = array('password'=>$new_pass);
            $this->db->update('users',$data,array('username'=>$username));
            echo "Password changed successfully";
            
        }  else {
            
            echo "current password is not matching";
            
        }
            
            
    }       
        
            
            
}



?>
