<?php

class Upload_model extends CI_Model{
    
public function __construct() {
      parent::__construct();
       
   }
    
public function update_photo($source){
     
    $username = $_SESSION['username'];
    
    $pass = array('avatar'=> $source);
   
    $this->db->update('users',$pass,array('username'=>$username));
    $query = $this->db->get_where('users',array('avatar'=>$source,'username'=>$username),1);    
    $data = array();
    foreach ($query ->result() as $row)
    {
        $data[] = $row->avatar;
        
    }
   
    return $data;
}    


public function upload_album($source,$album_name){
    
    $user = $_SESSION['username'];
    
    $insert_data = array('user'=>$user,'gallery'=>$source,'album_name'=>$album_name);
    $this->db->set('uploaddate','now()',FALSE);
    
    $this->db->insert('photos',$insert_data);
   
    $query = $this->db->get_where('photos',array('user'=>$user,'album_name'=>$album_name));

    $result = $query->result();
    
    return $result;
    
}

public  function upload_video($source,$album_name,$username){
    
    $insert_data = array('user'=>$username,'gallery'=>$source,'album_name'=>$album_name);
    $this->db->set('uploaddate','now()',FALSE);    
    $this->db->insert('videos',$insert_data);   
    $query = $this->db->get_where('videos',array('user'=>$username,'album_name'=>$album_name,'gallery'=>$source));
    $Query_result = $query->num_rows();    
    if($Query_result >= 1)    
    {
    echo "<div class='alert alert-dismissable alert-success'>
       Video Link Uploaded Successfully ! 
    </div>";
    }
}
   
}




?>
