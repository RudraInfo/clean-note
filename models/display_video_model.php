<?php


 class Display_video_model extends CI_Model {
     
      function __construct() {
      parent::__construct();               
    }
     
   public function display_video_album($user){
       
        $this->db->select('gallery,album_name,count(id)as counter');
                 $this->db->group_by('album_name');
                 $this->db->distinct();
        $query = $this->db->get_where('videos',array('user'=>$user));    
     
     $result = $query->result();
     if($query->num_rows() >= 1)
     {
         return $result;
                
     }
         
     }  
     
    
         
    public function view_album($album_name,$user){
              $this->db->order_by('uploaddate','DESC');  
      $sql =  $this->db->get_where('videos',array('user'=>$user,'album_name'=>$album_name));         
      $result_img = $sql->result();
      return $result_img;
       
     } 
         
       public function display_videos($username){
         
       $query = $this->db->query("select gallery,uploaddate from videos where user='$username' ORDER BY videos.uploaddate DESC limit 6");  
         
       return $query->result(); 
         
     }
        
     public function find_existing_album_name($search_query,$username){
        
        
        $this->db->select('album_name,gallery'); 
        $this->db->group_by('album_name');
        $this->db->like('album_name', $search_query);
        $this->db->order_by('uploaddate');                 
                $this->db->distinct(); 
        $query = $this->db->get_where('videos',array('user'=>$username));
         
        return $query->result();
         //echo $this->db->last_query();       
}
      
     
 }


?>
