<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PostCommentBtnHandler extends CI_Controller {
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   public function index()
	{
            $this->load->helper('url');     
            //$this->load->view("home");
            $this->load->database();                        
            $query1 = $this->db->query("SELECT msg_id FROM messages");                        
            $rows = $query1->num_rows();                        
            $rows=$rows+1;                                   
            $this->load->model('InsertPostData');            
             if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                } 
                
            $data = array(
                'msg_id' => $rows,
                'message' => $_POST['PostCmt'] ,
                'uid_fk'=> $_SESSION['username'],                                           
                'imageurl'=> $_POST['ImageUrl'],
                //'ip'=> 'kk3',
                //'created'=> NOW(),
                //'uploads'=>'33',
                'like_count'=>0,
                'comment_count'=>0,
                'share_count'=>0,
                'PostBy'=>$_SESSION['username'],
                'PostTo'=>$_SESSION['username']
            );
                                 
            $this->db->set('created', 'NOW()', FALSE);                              
            $this->InsertPostData->InsertData($data);             
            $postcnt['postvariable']=$_POST['PostCmt'];
            $postcnt['username1']=$_SESSION['username'];
            $postcnt['ImageUrl']=$_POST['ImageUrl'];
            $postcnt['PostDiv']=$rows;
            $postcnt['LikeCount']=0;
            $postcnt['CommentCount']=0;
            $postcnt['ShareCount']=0;
            $postcnt['CommentBoxId']= 'footerpost'. $rows;
            $postcnt['CommentListId']= 'commentlist'. $rows;
            $postcnt['NewPostId']=$rows;                  
            
            if (empty($_FILES['photoimg'])) { $postcnt['isimage']='FALSE'; } 
            else { $postcnt['isimage'] = 'TRUE';$postcnt['filecount']= count($_FILES['photoimg']);} //count($_FILES) . " files uploaded";                         
            
            $this->load->model('display_photo_model');
            $postcnt['avtar'] = $this->display_photo_model->display_img($_SESSION['username']);
            $data1=$this->load->view('NewPost',$postcnt);            
            
    }
    
    public function Onviewmorecomments()
        {
            $this->load->helper('url');     
            //$this->load->view("home");
            $this->load->model('user_model');                        
            $commentdataarray=$this->user_model->LoadMoreCommentData($_POST['msg_id']);                  
            //$data1['commentdataarray']=$this->user_model->LoadCommentData($_POST['username']);                                       
            //echo print_r($data1);                    
            $commentcount=3;
            //echo 'hi';
            $this->load->helper('url');
            $this->load->library('mylibrary');
                foreach ($commentdataarray as $key1 => $value1)
                                                {                                                
                                                  //if (is_array($value1))
                                                   //{  
                                                      //foreach($value1 as $key2=>$value2)
                                                      //{
                                                          //echo "key2=" .$key2 . " value2=" . $value2 . "<br>";                                                          
                                                          //echo $commentdataarray['comment'];
                                                     // }
                                                     
                                                     if ($commentdataarray[$key1]['msg_id_fk']<>'') 
                                                      {
                                                         $midval=$commentdataarray[$key1]['msg_id_fk'];                                                          
                                                        //$midval=substr($commentdataarray[$key1]['msg_id_fk'],7);                                                          
                                                        //echo $midval;
                                                         //echo 'post' . $_POST['msg_id'];
                                                         // we use this syntax $midval=='postdiv'.$_POST['msg_id']
                                                         // Because in comments table we use msgid include the
                                                         // phrase 'postdiv' but not in messages table 
                                                        if($midval=='postdiv'.$_POST['msg_id']) 
                                                           {
                                                          
                                                        //echo $midval . " = " .$userdataarray[$key]['msg_id'] . " = " . $commentcount;                                                          
                                                        //for($commentcount=0;$commentcount<$userdataarray[$key]['comment_count'];$commentcount++)                                        
                                                        //{                                                                                 
                                                  ?>
                                                <li class="comment" id="Mst<?php echo $_POST['msg_id'];?>comment<?php echo $commentcount;?>">
                                                    <a class="pull-left" href="#">
                                                        <?php
                                                        //commentdata phota;
                                                        ?>
                                                        <img class="avatar" src="" alt="avatar">
                                                    </a>
                                                    <div class="comment-body" id="Mst<?php echo $_POST['msg_id'];?>commentbody<?php echo $commentcount?>">
                                                        <div class="comment-heading" id="Mst<?php echo $_POST['msg_id'];?>commentheading<?php echo $commentcount?>">
                                                            <h4 class="comment-user-name"><a href="#">Antony andrew lobghi</a></h4>
                                                            <h5 class="time"><?php  
                                                                               //echo $commentdataarray[$key1]['commenttime'];
                                                                               echo $this->mylibrary->getlatesttime($value1['created']);
                                                                               //echo $commenttime;
                                                                               //echo $this->mylibrary->getlatesttime($commenttime) ;
                                                                               
                                                                               
                                                                                  
                                                                               //$CI =& get_instance();
                                                                              
                                                                    ?></h5>
                                                          <span class="DeleteComment" id="Mst<?php echo $_POST['msg_id'];?>DeleteComment<?php echo $commentcount;?>" style="margin-left:45%;position:relative" ><span class="glyphicon glyphicon-remove" style="color:grey" aria-hidden="true"> </span></span>
                                                        </div>
                                                        <p id="Mst<?php echo $_POST['msg_id'];;?>commentdata<?php echo $commentdataarray[$key1]['com_id'];?>"> <span id="commentvalue<?php echo $commentdataarray[$key1]['com_id'];?>"> <?php echo $commentdataarray[$key1]['comment']; ?> </span>
                                                        <input style="display: none;border-width: 0;height:30px;width:380px" class="Editcommentbox" type="text" id="Mst<?php echo $_POST['msg_id'];?>Editcommentbox<?php echo $commentdataarray[$key1]['com_id'];?>" ></p>
                                                    </div>
                                                <a class="Likecomment" id="Mst<?php echo $_POST['msg_id'];?>Likecomment<?php echo $commentcount;?>" style="z-index:9999;margin-left:50px;" >Like</a>
                                                <a class="Editcomment" id="Mst<?php echo $_POST['msg_id'];?>Editcomment<?php echo $commentcount;?>" style="z-index:9999;margin-left:10px;" >Edit</a>
                                                </li>
                                                
                               <?php
                                     $commentcount=$commentcount+1;}}                                                                       
                             }                  
            echo "<br>";
            }
     //Function For Wall's Nominate Button Click From Light Box
   public function OnNominationclick()
   {
        $this->load->helper('url');     
        $this->load->database();   
        $this->load->model('InsertPostData');
        $count1 = $this->db->count_all('Nomination') ;
        $data = array(
                'Nom_Id' => $count1 + 1,
                'Nom_Post_Id' => $_POST['Postid'],                                
                'uid_fk'=> $_POST['username']                
            );                 
       $this->db->set('DateTime','NOW()', FALSE);                              
       $this->InsertPostData->InsertNominationData($data);   
       
   }
    public function CommentFunction()
        {
            
            $this->load->helper('url');     
            //$this->load->view("home");
           // $this->load->database();                        
            //$query1 = $this->db->query("SELECT count(*) FROM comments");   
            //$result = $query1->row_array();
            $count1 = $this->db->count_all('comments') ;            
            $this->load->model('InsertPostData');
            if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                } 
            $data = array(
                'com_id' => $count1 + 1,
                'comment' => $_POST['Comment'],                
                'msg_id_fk'=> $_POST['ParentDiv'],
                'uid_fk'=> $_SESSION['username'],                                           
                //'ip'=> 'kk3',
                //'created'=> NOW(),
                //'uploads'=>'33',
                'like_count'=>0
            );                                           
            $this->db->set('created', 'NOW()', FALSE);
            //print_r($data);
            $this->InsertPostData->InsertComments($data);
            $this->db->query("update `messages` set `comment_count` = `comment_count` + 1 where `msg_id` =" . substr($_POST['ParentDiv'],7));
            $this->db->select('comment_count');     
            $this->db->from('messages');
            $this->db->where('`msg_id` =' . substr($_POST['ParentDiv'],7));
            $query = $this->db->get();                        
             if ( $query->num_rows() > 0 )
              {
                $row = $query->row_array();                                 
              //  echo $row['comment_count'];                
              }
            //echo "hello from amit indix";
            //$this->load->view("hello");
            //$this->load->model('Authenticate');
            //$this->Authenticate->getdata();
            //$a = $this->input->PostCmt;
            //$b= $_POST['PostCmt'];
            $postcnt['CommentCount']=$_POST['CommentCount'];
            $postcnt['Comment']=$_POST['Comment'];
            $this->load->view('NewComment',$postcnt);
            echo $row['comment_count'];
            //echo $data1;
        }
        
        
        public function EditCommentFunction()
        {
            
            $this->load->helper('url');     
            //$this->load->view("home");
            $this->load->database();                        
            //$query1 = $this->db->query("SELECT count(*) FROM comments");   
            //$result = $query1->row_array();            
            if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                }             
            //print_r($data);
            
           //$this->db->query("update comments set `comment` = '" . $_POST['commentval'] . "' where com_id =" . $_POST['Commentid']);
           
           $this->db->where('com_id',$_POST['Commentid']); 
           $this->db->set('comment',$_POST['commentval']);
           $this->db->update('comments');
           echo $_POST['Commentid'];
           echo $_POST['commentval'];
            //$this->db->select('comment_count');     
            //$this->db->from('messages');
            //$this->db->where('`msg_id` =' . substr($_POST['ParentDiv'],7));
            //$query = $this->db->get();                                    
            //echo "hello from amit indix";
            //$this->load->view("hello");
            //$this->load->model('Authenticate');
            //$this->Authenticate->getdata();
            //$a = $this->input->PostCmt;
            //$b= $_POST['PostCmt'];                       
            //echo $data1;
        }
        
        
        public function OnLikeClick()        {
             
            $this->load->database();                                    
            if($_POST['LikeUnlike']=="LIKE")
                {
                    $count1 = $this->db->count_all('post_like') ;            
                    $this->load->model('InsertPostData');            
                    if (session_status() == PHP_SESSION_NONE) 
                        {
                            session_start();
                        }              

                    $data = array(
                        'postlike_id' => $count1 + 1,
                        'msg_id_fk' => substr($_POST['ParentDiv'],7),                
                        'uid_fk' => $_SESSION['username']                            
                    );                                   
                   $this->InsertPostData->InsertLikes($data);         
                   $this->db->query("update `messages` set `like_count` = `like_count` +1 where `msg_id` =" . substr($_POST['ParentDiv'],7));
                   $this->db->select('like_count');            
            $this->db->from('messages');
            $this->db->where('`msg_id` =' . substr($_POST['ParentDiv'],7));
            $query = $this->db->get();                        
             if ( $query->num_rows() > 0 )
              {
                $row = $query->row_array();                                 
                echo $row['like_count'];                
              }
              }elseif($_POST['LikeUnlike']=="UNLIKE")
                 {
                     $count1 = $this->db->count_all('post_like') ;            
                        $this->load->model('InsertPostData');            
                        if (session_status() == PHP_SESSION_NONE) 
                            {
                                session_start();
                            }            

                        $this->db->where("`msg_id` =" .substr($_POST['ParentDiv'],7));
                        $this->db->where('`like_count` >0 ' );
                        $this->db->set('like_count', 'like_count -1', FALSE);
                        $this->db->update('messages');                                     
                        $this->db->query("delete from post_like where uid_fk='".$_SESSION['username'] . "' and msg_id_fk=" . substr($_POST['ParentDiv'],7)   );
                        $this->db->select('like_count');            
                        $this->db->from('messages');
                        $this->db->where('msg_id', substr($_POST['ParentDiv'],7));                        
                        $query = $this->db->get();            
                         if ( $query->num_rows() > 0 )
                          {
                            $row = $query->row_array();                                             
                            echo $row['like_count'];
                          }
                 }
                elseif($_POST['LikeUnlike']=="FRIENDSLIKECOUNT")
                {                
                   $this->load->model('Wallmodel');
                   $data1= $this->Wallmodel->Loadtotallikes(substr($_POST['ParentDiv'],7));
                   //print_r($data1); 
                   //echo "<br>";
                   foreach ($data1 as $key => $value)                   
                   {
                       //echo "countof(data1)". count($data1);
                       //echo "count of (value)" . count($value);
                       //if (is_array($value))
                       //{  
                       //    foreach($value as $key1=>$value1)
                       //    {
                               //echo  $key1. " = " . $value1 ;
                               echo "<img src='". $value['avatar']. "' height='50' width='50'>";                               
                               echo $value['uid_fk'];// "value1=" . $value1;
                               echo "<br>";
                         //  }
                               
                       }
                       //echo $key;
                       //echo $value;
                   }
                   
                        
                
            //
            //$data = array('like_count' => '(`like_count + 1`)');
            //$where = "msg_id=" .substr($_POST['ParentDiv'],7);
           //$this->db->set('like_count', 'like_count + 1', FALSE); 
           //$this->db->where('`msg_id`=' . substr($_POST['ParentDiv'],7));            
            
            //$this->db->update('messages');             
            
            //echo $this->db->last_query();
            //print_r($str);             
            
            //print_r($str);             
            
            //substr($commentdataarray[$key1]['msg_id_fk'],7); 
          //  $query = $this->db->get();            
            //echo $this->db->last_query();
            // if ( $query->num_rows() > 0 )
              //{
               // $row = $query->row_array();                 
                //print_r($row['like_count']);                
                //echo $row['like_count'];
                //echo "Thumbsid=" . $_POST['Thumbsid'];
                //echo "<i class='fa fa-thumbs-up icon' id='" . $_POST['Thumbsid']. "'> " . $row['like_count']. " </i>";
              //}
            //echo $this->db->last_query();
            //substr($commentdataarray[$key1]['msg_id_fk'],7); 
            
            
        }
        
        
        
        
        public function OnUnLikeClick()        {
             
            $this->load->database();                                    
            $count1 = $this->db->count_all('post_like') ;            
            $this->load->model('InsertPostData');            
            if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                }             
            
            $this->db->where("`msg_id` =" .substr($_POST['ParentDiv'],7));
            $this->db->where('`like_count` >0 ' );
            $this->db->set('like_count', 'like_count -1', FALSE);
            $this->db->update('messages');             
            
            //print_r($str); 
            $this->db->query("delete from post_like where uid_fk='".$_SESSION['username'] . "'"   );
            
            $this->db->select('like_count');            
            $this->db->from('messages');
            $this->db->where('msg_id', substr($_POST['ParentDiv'],7));
            
            //substr($commentdataarray[$key1]['msg_id_fk'],7); 
            $query = $this->db->get();            
             if ( $query->num_rows() > 0 )
              {
                $row = $query->row_array();                 
                //print_r($row['like_count']);                
                //echo "<i class='fa fa-thumbs-o-up icon' id='Thumbsid'>" . $row['like_count'] . "</i>";
                //echo "<i class='fa fa-thumbs-o-up icon' id=" . $_POST['Thumbsid']. "> " . $row['like_count']. " </i>";
                echo $row['like_count'];
              }
              
                //
        }                           
        
        public function copyCommentFunction()
        {
            $this->load->helper('url');     
            //$this->load->view("home");
            $this->load->database();                        
            $query1 = $this->db->query("SELECT count(*) FROM comments");   
            $result = $query1->row_array();
            $count = $result['COUNT(*)'];                        
            $this->load->model('InsertPostData');
            
             if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                }            
            $data = array(
                'com_id' => $count,
                'comment' => $_POST['Comment'] ,
                'uid_fk'=> $_SESSION['username'],                                           
                'msg_id_fk'=> $_POST['ParentDiv'],
                //'ip'=> 'kk3',
                //'created'=> NOW(),
                //'uploads'=>'33',
                'like_count'=>6                
            );                               
            //$this->db->set('created', 'NOW()', FALSE);                  
            $this->InsertPostData->InsertComments($data);                       
            //echo "hello from amit indix";
            //$this->load->view("hello");
            //$this->load->model('Authenticate');
            //$this->Authenticate->getdata();
            //$a = $this->input->PostCmt;
            //$b= $_POST['PostCmt'];
            $postcnt['CommentCount']=$_POST['CommentCount'];            
            $data1=$this->load->view('NewComment',$postcnt);              
            return $data1;            
        }

 public function OnCommentLikeClick()   
         {             
    
           
                                                                                                       
         }


    public function OnCommentLikeClick1()        {             
    
            $this->load->database();                                    
            if($_POST['LikeUnlike']=="LIKE")
                {
                    $count1 = $this->db->count_all('comment_like') ;            
                    $this->load->model('InsertPostData');            
                    if (session_status() == PHP_SESSION_NONE) 
                        {
                            session_start();
                        }              
                    $data = array(
                        'Comment_id' => $count1 + 1,
                        'Post_id' => substr($_POST['ParentDiv'],7),                
                        'Uid_fk' => $_SESSION['username'],                        
                    );                                   
                   $this->InsertPostData->InsertCommentsLikes($data);         
                   $this->db->query("update `comment_like` set `CommentsLikeCount` = `CommentsLikeCount` + 1 where `Comment_id` =" . substr($_POST['ParentDiv'],7));
                   $this->db->select('CommentsLikeCount');            
                   $this->db->from('comment_like');
                   $this->db->where('`msg_id` =' . substr($_POST['ParentDiv'],7));
                   $query = $this->db->get();                        
                    if ( $query->num_rows() > 0 )
                    {
                        $row = $query->row_array();                                 
                        echo $row['like_count'];                
                    }
                    }elseif($_POST['LikeUnlike']=="UNLIKE")
                        {
                            $count1 = $this->db->count_all('post_like') ;            
                            $this->load->model('InsertPostData');            
                            if (session_status() == PHP_SESSION_NONE) 
                                {
                                session_start();
                                }            
                            $this->db->where("`msg_id` =" .substr($_POST['ParentDiv'],7));
                            $this->db->where('`like_count` >0 ' );
                            $this->db->set('like_count', 'like_count -1', FALSE);
                            $this->db->update('messages');                                     
                            $this->db->query("delete from post_like where uid_fk='".$_SESSION['username'] . "' and msg_id_fk=" . substr($_POST['ParentDiv'],7)   );
                            $this->db->select('like_count');            
                            $this->db->from('messages');
                            $this->db->where('msg_id', substr($_POST['ParentDiv'],7));                        
                            $query = $this->db->get();            
                             if ( $query->num_rows() > 0 )
                                {
                                    $row = $query->row_array();                                             
                                    echo $row['like_count'];
                                }
                        }                                                                                  
            }
            
 /// This Function used for upload image from comment list box/wall call from Latestcontentview
            
            public function uploadcommentimage()
            {
                 
            //$this->load->view("home");
             if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                } 
                $u = $_SESSION['username'];    
                 $this->load->helper('url');    
                 
                $config['upload_path'] = 'user/'.$u.'/CommentImages/';                       
                $path=$config['upload_path'];
                $config['allowed_types'] = '*'; //'gif|jpg|png|jpeg';
                $config['max_size'] = '1000000';
                $this->load->library('upload', $config);                            
            foreach ($_FILES as $key => $value) {
                if (!empty($value['tmp_name']) && $value['size'] > 0) {
                    if (!$this->upload->do_upload($key)) {                        
                        $errors = $this->upload->display_errors();
                        //flashMsg($errors);

                } else {
                    // Code After Files Upload Success GOES HERE
                    //echo "sucess";
                    if (session_status() == PHP_SESSION_NONE) 
                    {
                     session_start();                     
                    } 
                    $_SESSION['File_Post']='TRUE';
                }
            }
        }
       
        $source = base_url().'user/'.$u.'/CommentImages/';
        echo "<img src='$source"  . $this->upload->file_name .  "' height='175' width='175'>";
        //echo $this->upload->file_name;
            }
}
?>