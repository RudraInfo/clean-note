<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class User_model extends CI_Model {   
 public function check_user_exist($usr,$pWord)
        {
         $this->load->database();
         $this->db->select('*');
         $this->db->from("Users");
         $this->db->where("username",$usr);
         $this->db->where("password",$pWord);
         $query=$this->db->get();
         //$data = array();
         if($query->num_rows()>0)
         {
           //$data1 = array_shift($query->result_array());            
          //$data['num_rows'] =$query->num_rows();
          //$data['userid']= $data1['id'];
          $data = $query->result_array();
          $data=$data[0];
          $data['num_rows']=$query->num_rows();
          //return $query->num_rows();              
         }         
         return $data;
         //foreach ($query->result() as $row)
           // {
             //   $return[] = $row['num_rows'];                
            //}
//        return $return;
        
     }

      public function Loaduserdata($usr)
        {
         
         $this->load->database();                          
         $query=$this->db->query
                    ('select m.*,Nom.Nom_Post_Id,pl.uid_fk as usernameforlike from messages as m 
                     left join post_like as pl on m.msg_id=pl.msg_id_fk 
                     left join nomination as Nom on m.msg_id=Nom.Nom_Post_Id                     
                     where m.uid_fk =("' . $usr . '")
                     and (pl.uid_fk= ("' . $usr . '") or pl.uid_fk IS NULL) ORDER BY m.msg_id DESC');
                 
                 
                 
                 
         //$query=$this->db->query
         //       ('select m.*,u.avatar,pl.uid_fk as usernameforlike from messages as m 
         //        left join users as u on m.uid_fk=u.username
         //        left join post_like as pl on m.msg_id=pl.msg_id_fk
         //        where m.uid_fk =("'.  $usr .'") 
         //        order by m.msg_id desc');
                //$query=$this->db->query
                //('select m.*,u.avatar,u.username as usernameforlike from messages as m 
                //left join users as u on m.uid_fk=u.username 
                //where m.uid_fk in ('. $friendlist . ') order by m.msg_id desc');
         echo $this->db->last_query();
         $data=$query->result_array();         
         return $data;
         //print_r($data);
     }
     
    public function LoadCommentData($usr)
        {
         
         $this->load->database();         
         //$query=$this->db->query('Select com_id,comment,msg_id_fk,like_count from comments where mid(msg_id_fk,8) in(select msg_id from messages where postby=' . $usr . ')');                           
         //
         $query=$this->db->query('Select c.com_id,c.comment,c.msg_id_fk,c.like_count,c.created,c.uid_fk,u.avatar '
                 . ' from comments  as c ' 
                 .'left join users as u on c.uid_fk= u.username where mid(c.msg_id_fk,8) in(select msg_id from messages where uid_fk="' . $usr . '" order by c.com_id Desc)');                           
         //$query=$this->db->get();         
         $data=$query->result_array();         
         
         
         //$data = array();
         //$data=$data;         
         //$data['num_rows']=$query->num_rows();                  
         return $data;
         //foreach ($query->result() as $row)
//            {
//               $return[] = $row['num_rows'];                
//            }
//           return $return;
        
     }         
//This function is use for view more comments feature in wall. when post have
     //two or more comments for particular post
     public function LoadMoreCommentData($msgid)
        {
         
         $this->load->database();         
         //$query=$this->db->query('Select com_id,comment,msg_id_fk,like_count from comments where mid(msg_id_fk,8) in(select msg_id from messages where postby=' . $usr . ')');                           
         //
         $msgid='postdiv' . $msgid;
         //echo $msgid;
         $this->db->where('msg_id_fk',$msgid);         
         $this->db->from('comments');
         $totrows= $this->db->count_all_results();
         echo "Before Totrows-" . $totrows;
         if ($totrows>2)
         {
             $totrows=$totrows-2;
         }
         echo "totrows=" . $totrows;
         //$query=$this->db->query('select * from comments where msg_id_fk="' . $msgid . '" order by com_id desc Limit 2,' . $totrows );
         $query=$this->db->query('select * from comments where msg_id_fk="' . $msgid . '" order by com_id desc Limit ' . $totrows );         
         //$query=$this->db->query('Select com_id,comment,msg_id_fk,like_count,created from comments where msg_id_fk="' . $msgid . '" order by com_id Desc)');                           
         echo $this->db->last_query();
         //$query=$this->db->get();         
         $data=$query->result_array();         
         //print_r($data);
         //echo $this->db->last_query();
         //$data = array();
         //$data=$data;         
         //$data['num_rows']=$query->num_rows();                  
         //echo ("totrows=" . $totrows);
         //print_r($data);
         //foreach ($query->result() as $row)
//            {
//               $return[] = $row['num_rows'];                
//            }
           return $data;
        
     }     
     
    public function LoadNominateData($usr)        
       {
         
                //$this->load->database();                  
                //$query=$this->db->query('Select Nom.* from nomination as nom left join messages as mes on Nom.Nom_Post_id = mes.msg_id where Nom.uid_fk="' .$usr .'"' );                                    
                //$data=$query->result_array();                                  
                //return $data;        
        }         
     
   public function Getfriendlist($user)  
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
       return $friendlist;
   }
}
?>
