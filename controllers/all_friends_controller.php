<?php

class All_friends_controller extends CI_Controller {
public function __construct() {
        parent::__construct();
       session_start(); 
       $this->load->model('about_model');
       $this->load->model('friendreq_model');
       $this->load->model('display_profile_model');
       
    }
       
public function  index(){   
    
    $username = $_SESSION['username'];
     $loginuser = $username;
     //$user = $username;
     $data1['email_data'] = $this->about_model->about_data($username);
     $data1['loginuser_friend_data']  = $this->friendreq_model->login_user_friends($loginuser);
     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('all_friends_view',$data1);
     $this->load->view('footer_view');     
    }  
    

public function user_all_friends(){
    
    $username = $_SESSION['profile_clicked'];
    $loguser = $_SESSION['username'];
    $loginuser = $username;
    $profile_clicked = $_SESSION['profile_clicked']; 
     $data1['email_data'] = $this->about_model->about_data($username);
     $data1['clickuser_friends'] = $this->friendreq_model->check_fstatus($loguser,$profile_clicked);
      
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('user_all_friends_view',$data1);
     $this->load->view('footer_view');
     
    
    
}   
    
    
    
    
}





?>
