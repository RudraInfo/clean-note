<?php

class Friendreq_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $ids = array();
        
    }
    
    public function friend_request($user,$loguser,$friendrequest){
     
      $req_check = $this->db->query("SELECT user1,accepted from friends where user1='$user' and user2='$loguser' and accepted = 0");  
    
      if ($req_check->num_rows() == 0)
        {
        
      $data = array('from_user'=>$user,'to_user'=>$loguser,'initiator'=>$friendrequest,'note'=>'friendrequest from');   
     
      $this->db->set('date_time','now()',FALSE);  
      $this->db->insert('notifications',$data);
      
      $friend_data = array('user1'=>$user,'user2'=>$loguser);
      $this->db->set('datemade','now()',FALSE);
      $this->db->insert('friends',$friend_data);       
        }
        else
        {
           echo "<div class='alert alert-dismissable alert-warning'>
    Sorry! You have all ready sent friend request to this user !
    </div>"; 
        }    
    }
    
    public function do_action1($action,$loginuser,$selected_pro){
        
        if($action == 1)
        {
          
         $action_data = array('accepted'=>$action);
         $note_data = array('did_read'=> $action);
        $this->db->update('notifications',$note_data,array('to_user'=>$loginuser,'from_user'=>$selected_pro));
        
        $this->db->update('friends',$action_data,array('user2'=>$loginuser,'user1'=>$selected_pro));
        echo "<div class='alert alert-dismissable alert-success'>friend request accepted successfully</div>";
        
        }elseif($action == 0){
            
        $this->db->delete('notifications',array('to_user'=>$loginuser,'from_user'=>$selected_pro));   
        $this->db->delete('friends',array('user2'=>$loginuser,'user1'=>$selected_pro));    
        
        echo"<div class='alert alert-dismissable alert-warning'>You have declined friend request</div>"; 
        }      
        }
    
       public function friend_count($user){                      
            
       $q = $this->db->query("SELECT user1 FROM friends WHERE (accepted= 1) AND((user1= '$user') or (user2='$user')) UNION select user2 FROM friends WHERE (accepted= 1) AND((user1= '$user') or (user2='$user'))LIMIT 9");
                           
       $rows = $q->result();
       
       
       
       foreach($rows as $key=>$row) 
       {
           $friend = $row->user1;
           if($friend == $user)
           {
               unset($rows[$key]);
               $r = array_values($rows);
            }
                   
       } 
       
       
      $count=1;
       foreach ($rows as $names )
       {
           $ids[] = $names->user1;
           if ($count==1)
           {
            $userval = "'" . $names->user1 . "'";
           }else
           {
               $userval= $userval . ",'" . $names->user1 ."'";
           }
           $count=$count+1;
       }   
      
       if(count($rows)>= 1)
       {
       $img = $this->db->query('select avatar from users where username in('. $userval .') order by FIELD(username,' . $userval.')');
              
       $profile_pic = $img->result();
       $friend_array = array('ids'=>$ids,'profile_pic'=>$profile_pic);
        
       return $friend_array;  
           
       }  else {
           
           
       $this->db->select('avatar');
       $this->db->where('username',1);
       $img = $this->db->get('users'); 
       $profile_pic = $img->result();
       $friend_array = array('ids'=>array(),'profile_pic'=>array());
       
       return $friend_array;    
       }    
        
       }     
        
       public function login_user_friends($loginuser){                      
            
       $q = $this->db->query("SELECT friends.user1,users.avatar FROM friends LEFT JOIN users ON friends.user1 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$loginuser') or (friends.user2='$loginuser')) UNION select friends.user2,users.avatar FROM friends LEFT JOIN users ON friends.user2 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$loginuser') or (friends.user2='$loginuser'))LIMIT 9" );
                           
       $rows = $q->result();     
     
       foreach($rows as $key=>$row) 
       {
           $friend = $row->user1;
           if($friend == $loginuser)
           {
               unset($rows[$key]);
               $friend_data = array_values($rows);
            }
                   
       } 
       
      
    
       if(count($rows)>= 1)
       {    
         return $friend_data;  
      
       }  else {
           
          $friend_data = $rows;
          return $friend_data;
         
       }    
       
       
       
       }
       
       public function check_fstatus($loguser,$profile_clicked){
       
       // Check if Login user has sent Friend Request or Receive Request  
           
           $query = $this->db->query("SELECT user1 FROM friends WHERE (accepted = 0) AND(user1= '$loguser')");
           $Req_owner = 0;
           foreach ($query->result() as $j)
           {
               if($j->user1 == $loguser)
               {
                   $Req_owner = 1;
               }  else {
                   
                   $Req_owner = 0;
               }
                   
           }
           
        ///Friend Request ownership check is finished    
       $q = $this->db->query("SELECT friends.user1,users.avatar FROM friends LEFT JOIN users ON friends.user1 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$profile_clicked') or (friends.user2='$profile_clicked')) UNION select friends.user2,users.avatar FROM friends LEFT JOIN users ON friends.user2 = users.username WHERE (friends.accepted= 1) AND((friends.user1= '$profile_clicked') or (friends.user2='$profile_clicked'))LIMIT 9" );
                           
       $rows = $q->result();     
        
       foreach($rows as $key=>$row) 
       {
           $friend = $row->user1;
           if($friend == $profile_clicked)
           {
               unset($rows[$key]);
               $friend_data = array_values($rows);
            }
                   
       }         
        
       
       
       ////////////////////////////
       $clickuser_friends = $friend_data; 
       
       $data = array();
       
       foreach ($clickuser_friends as $row)
       {
          $data[]= $row->user1;
       }
             
       $implode_data = implode("','", $data);
         
       if(count($data))
       {           
            $q = $this->db->query("SELECT user1,accepted from friends WHERE (user1 IN('$implode_data')AND user2='$loguser') or (user2 IN('$implode_data')AND user1='$loguser')UNION SELECT user2,accepted from friends WHERE (user1 IN('$implode_data')AND user2='$loguser') or (user2 IN('$implode_data')AND user1='$loguser')");
             
            $datarows = $q->result();
            
            foreach($datarows as $key=>$row) 
             {
                $a1 = $row->user1;
           if($a1 == $loguser)
           {
               unset($datarows[$key]);
               $newdata = array_values($datarows);
            }
                   
            } 

         
            
            foreach ($clickuser_friends as $key=>$value)    
            {
                if(empty($newdata))
                { 
                  if($value->user1 == $loguser)
                  {
                      $clickuser_friends[$key]->button = "";
                  }  else {
                      
                    $clickuser_friends[$key]->button = "Add as Friend";
                      
                  }                 
                     
                  }                       
                $counter = 0 ;
                
                
               if(!empty($newdata))
               {
                   foreach ($newdata as $result_row)
                   {            
                        if($value->user1 == $loguser)
                       {
                          $clickuser_friends[$key]->button = ""; 
                       } 
                                        
                       if($value->user1 == $result_row->user1 && $result_row->accepted == 0 )
                       {    
                           if($Req_owner == 1)
                           {
                           $clickuser_friends[$key]->button = "Friend Request Sent";
                           }  else {
                               
                            $clickuser_friends[$key]->button = "Confirm Request";                                  
                           }
                       
                           
                       }
                       elseif ($value->user1 == $result_row->user1 && $result_row->accepted == 1) 
                       {
                          $clickuser_friends[$key]->button = "Friends";  
                           
                        }                     
                        
                       if($value->user1 == $result_row->user1)
                       {
                          $counter = 1;                           
                       }
                        
                   }
                   
                   if($counter == 0)
                   {                                        
                      if($value->user1 != $loguser)
                      {
                           $clickuser_friends[$key]->button = "Add as Friend";
                      }
                                   
                   }
                                     
               }
                
           }
            
         
           return $clickuser_friends;
           
        }     
       
               
       }          
       
       
       public function cancel_friend_request($user,$loguser){
           
       $data = array('from_user'=>$user,'to_user'=>$loguser);   
              
      $this->db->delete('notifications',$data);
      
      $friend_data = array('user1'=>$user,'user2'=>$loguser);      
      $this->db->delete('friends',$friend_data);       
      echo "<div class='alert alert-dismissable alert-success'>Request Cancelled Successfully</div>";
        
           
       }
       
       
       
       }

       
       
       
       
       ?>
