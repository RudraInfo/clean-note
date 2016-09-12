<?php

class Upload_video_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        session_start();
                  
    }
    
    public function index(){
        
     $username = $_SESSION['username'];
     $user = $_SESSION['username'];
     $this->load->model('display_video_model');
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     $data['album'] = $this->display_video_model->display_video_album($user);
     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('all_video_view',$data);
     $this->load->view('footer_view');       
        
        
    }


    
    public function  share_video(){
            
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('upload_videolink_view');
     $this->load->view('footer_view'); 
     
        
    }
    
    public function process_video(){
        
     $video_link = $this->input->post('video_link');   
     //echo $video_link;   
    //this code is working for this task // 
     
     $sub_str = substr($video_link, strpos($video_link, "=") + 1);
     
     $new_link = " <iframe width='420' height='315'
src='http://www.youtube.com/embed/$sub_str' allowfullscreen > 
</iframe> ";
 
     echo $new_link;
     
    }
    
    public function load_album(){
        
            $this->load->library('mylibrary');
            $this->mylibrary->autoloadheader();  
            $this->load->view('upload_videolink_view');
            $this->load->view('footer_view');
                    
            }
            
            
    public function save_videolink(){
        
        $username = $_SESSION['username'];
           $Video = $this->input->post('Video');
           $Album = $this->input->post('Album');           
           $source = $Video;
           $album_name = $Album;           
           
           $this->load->model('upload_model');     
            
           if(!empty($source)&& !empty($album_name))
           {
            
               $this->upload_model->upload_video($source,$album_name,$username);           
                        
            }  else {
                
                echo "<div class='alert alert-dismissable alert-danger'>
       please Check Album Name or Video Link is Empty! 
        </div>";
             
                
                }
           
              
    }
    
    
    public function display_video_album(){
        
                
        $album_name = $this->input->post('album_name');
        $user = $_SESSION['username'];
        $this->load->library('mylibrary');
        $this->mylibrary->autoloadheader();       
        $this->load->model('display_video_model');    
        $data['album_img'] = $this->display_video_model->view_album($album_name,$user);  
         $this->load->view('display_video_album_view',$data);
         $this->load->view('footer_view');
            
    }
   
    
    public function user_display_video(){
        
        
        $album_name = $this->input->post('album_name');
        $user = $_SESSION['profile_clicked'];
        $this->load->library('mylibrary');
        $this->mylibrary->autoloadheader();       
        $this->load->model('display_video_model');    
        $data['album_img'] = $this->display_video_model->view_album($album_name,$user);  
         $this->load->view('display_video_album_view',$data);
         $this->load->view('footer_view');
        
        
        
    }
    
    
    public function user_display_video_album(){        
                
      $username = $_SESSION['profile_clicked'];
     $user = $_SESSION['profile_clicked'];
     $this->load->model('display_video_model');
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     $data['album'] = $this->display_video_model->display_video_album($user);
     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader(); 
     // Change this view whith new view after 1:21 pm on 3/5/16
     $this->load->view('user_all_video_view',$data);
     $this->load->view('footer_view');     
     
        
    }
    
    
    
    
    public function show_existing_album_name(){
        
        
        
        $username = $_SESSION['username'];              
        $this->load->model('display_video_model');  
        
        $search_query = $this->input->post('albumname');
        if (isset($_POST['albumname']))    
        {
            
            $data = $this->display_video_model->find_existing_album_name($search_query,$username);
        
            foreach ($data as $result)
            {
                $video_link = $result->gallery;
                $sub_str = substr($video_link, strpos($video_link, "=") + 1);
                echo '<div class="dropbox1" >';
                echo  "<img src='http://img.youtube.com/vi/$sub_str/default.jpg' width='60px' height='60px' alt=''>";
                echo str_repeat('&nbsp;',3).'<b>'.$result->album_name.'</b>';
                echo '</div>';
            }
        }    
        
        
    }
    
    
}




?>
