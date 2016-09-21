<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class wallmodel extends CI_Model {   
 
    public function Loadwalldata2($usr)
        {
         
         //$this->load->database();                          
         $query=$this->db->query('select m.*,pl.* from messages as m left join post_like as pl on m.msg_id=pl.msg_id_fk where m.uid_fk =("'.  $usr .'") order by m.msg_id desc');
         $data=$query->result_array();
         return $data;
         //print_r($data);
     }
     
    public function LoadwallData($usr)
        {
         
         $this->load->database();         
         $q = $this->db->query("SELECT friends.user1,users.avatar FROM friends LEFT JOIN users ON friends.user1 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$usr') or (friends.user2='$usr')) UNION select friends.user2,users.avatar FROM friends LEFT JOIN users ON friends.user2 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$usr') or (friends.user2='$usr'))LIMIT 9" );                           
         $rows = $q->result();          
         $friendlist = "'";
         
       foreach($rows as $key=>$row) 
       {
        //   echo $key. " " . $row->user1;
           $friend = $row->user1;
           if($friend == $usr)
           {
               unset($rows[$key]);
               $friend_data = array_values($rows);          
            }
            if($key==0) 
            {
                $friendlist=$friendlist . $row->user1 . "'";
            }else
            {
                $friendlist= $friendlist . ",'" . $row->user1 . "'";
            }
       } 
       
       $friendlist1 = "'";
       $rowcount=1;
       foreach($rows as $key=>$row) 
       {
           //echo $key. " " . $row->user1;
           $friend = $row->user1;
           if($friend == $usr)           
           {
               unset($rows[$key]);
               $friend_data = array_values($rows);          
            }            
            
            if($rowcount==1) 
            {
                $friendlist1=$friendlist1 . $row->user1 . "'";
            }else
            {
                $friendlist1= $friendlist1 . ",'" . $row->user1 . "'";
            }
            $rowcount=$rowcount+1;
       } 
         
        //echo $friendlist;   
        //echo "friendlist1=" . $friendlist1;
        //$query=$this->db->query('select m.*,pl.msg_id_fk,u.avatar,pl.uid_fk as usernameforlike
        //    from messages as m 
        //    left join post_like as pl on m.msg_id=pl.msg_id_fk 
        //   left join users as u on m.uid_fk=u.username
        //    where m.uid_fk in ('.  $friendlist1 .') order by m.msg_id desc');
       
       $query=$this->db->query
       ('select m.*,u.avatar,u.username as usernameforlike from messages as m 
       left join users as u on m.uid_fk=u.username 
       where m.uid_fk in ('. $friendlist . ') order by m.msg_id desc');
       
        $data=$query->result_array();         
        echo $this->db->last_query();        
        //echo var_dump($data);
        return $data;
        
         
     }         
    public function LoadCommentData($usr)
        {
         
         $this->load->database();         
         //$query=$this->db->query('Select com_id,comment,msg_id_fk,like_count from comments where mid(msg_id_fk,8) in(select msg_id from messages where postby=' . $usr . ')');                           
         //         
         $this->load->database();         
         $q = $this->db->query("SELECT friends.user1,users.avatar FROM friends LEFT JOIN users ON friends.user1 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$usr') or (friends.user2='$usr')) UNION select friends.user2,users.avatar FROM friends LEFT JOIN users ON friends.user2 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$usr') or (friends.user2='$usr'))LIMIT 9" );                           
         $rows = $q->result();          
         $friendlist = "'";
         
       foreach($rows as $key=>$row) 
       {
        //   echo $key. " " . $row->user1;
           $friend = $row->user1;
           if($friend == $usr)
           {
               unset($rows[$key]);
               $friend_data = array_values($rows);          
            }
            if($key==0) 
            {
                $friendlist=$friendlist . $row->user1 . "'";
            }else
            {
                $friendlist= $friendlist . ",'" . $row->user1 . "'";
            }
       } 
       
         $query=$this->db->query
                 ('Select u.avatar as commentavatar,u.username as commentusername ,com_id,comment,msg_id_fk,like_count,created 
                  from comments 
                  left join users as u on comments.uid_fk=u.username
                  where mid(msg_id_fk,8) 
                  in(select msg_id from messages 
                  where uid_fk in(' . $friendlist . ') 
                  order by com_id)');                           
         
         
         
         //$query=$this->db->get();         
         $data=$query->result_array();         
         
         return $data;
         //$data = array();
         //$data=$data;         
         //$data['num_rows']=$query->num_rows();                  
         //return $data;
         //foreach ($query->result() as $row)
//            {
//               $return[] = $row['num_rows'];                
//            }
//           return $return;
        
     }         
  
  public function Loadtotallikes($postid)    
  {
         $query=$this->db->query('select u.avatar,pl.uid_fk from post_like as pl left join users as u on pl.uid_fk=u.username where pl.msg_id_fk =("'.  $postid  .'") order by pl.postlike_id desc');
         //return $query->result_array();
         return $query->result_array();
         //echo $this->db->last_query();
         //print_r($data);
         //return $data;
         
  }
}
?>
