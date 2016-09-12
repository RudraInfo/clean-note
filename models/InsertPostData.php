<?php
class InsertPostData extends CI_Model {	
public function InsertData($data)
{
  $this->db->insert('messages',$data);  
}
public function InsertComments($data)
{
    
    $this->db->insert('comments',$data);
}

public function InsertLikes($data)
{
   $this->db->insert('post_like',$data);
}

public function InsertNominationData($data)
{
  $this->db->insert('nomination',$data);  
}

}
?>

