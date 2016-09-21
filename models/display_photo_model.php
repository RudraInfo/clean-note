<?php

class Display_photo_model extends CI_Model{
    
    function __construct() {
         parent::__construct();
           
         
    }
    
    public function display_img($username){
        
        
        
        $query  = $this->db->get_where('users',array('username'=> $username));
        
        foreach ($query->result() as $result)
        {
            $data = $result->avatar;
        }
       
        return $data;
    }
    
    
    public function display_album($user){
       
        $this->db->select('gallery,album_name,count(id)as counter');
                 $this->db->group_by('album_name');
                 $this->db->distinct();
        $query = $this->db->get_where('photos',array('user'=>$user));    
     
     $result = $query->result();
     if($query->num_rows() >= 1)
     {
         return $result;
                
     }
         
     }
    
     public function view_album($album_name,$user){
         
      $sql =  $this->db->get_where('photos',array('user'=>$user,'album_name'=>$album_name));         
      $result_img = $sql->result();
      return $result_img;
       
     }
    
     public function display_photos($username){
         
       $query = $this->db->query("select gallery,uploaddate from photos where user='$username' ORDER BY photos.uploaddate DESC");  
         
        return $query->result(); 
         
     }
    
     
     
    
}





?>
