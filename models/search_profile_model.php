<?php
class Search_profile_model extends CI_Model{
    
    public function __construct() {
       parent::__construct();
       
   }
    
    
    
    public function search_profile($search_query){
        
        
                
        $this->db->like('username', $search_query);
        $this->db->order_by('id');
        $query = $this->db->get('users',5);
        
        return $query->result();
                
}




}




?>
