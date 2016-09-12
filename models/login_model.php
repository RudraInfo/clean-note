<?php

class Login_model extends CI_Model{
    
    public function __construct() {
      parent::__construct();
       $this->load->database();
   }
    
   public function login1($user,$pass){
       
                         
         
         
        if( $user != "" || $pass != "") 
	{
		$query = $this->db->get_where('users',array('username'=>$user,'password'=>$pass),1); 
		  
		$result = $query->num_rows();  
                               
              return $result;
              
                }else 
			{					  
			  echo '<font color="#FF0000">'. "Please fill all fields.".'</font>' ;   
							
			}
		  
    }

}

?>
