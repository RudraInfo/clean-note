<?php

class About_controller extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        session_start();
        
    }

    

    public function index(){
     
     
     $username = $_SESSION['username'];
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('about_view',$data);
     $this->load->view('footer_view');        
   }
   
   public function user_about(){
       
    
     $username = $_SESSION['profile_clicked'];
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('user_about_view',$data);
     $this->load->view('footer_view');   
               
   }
   
   public function user_profile(){
       
             
     $user = $_SESSION['profile_clicked'];
       
      $this->load->model('display_profile_model');
      $this->load->model('friendreq_model');       
     $disp_data = $this->display_profile_model->display_profile($user);
     $friend_data  = $this->friendreq_model->friend_count($user);
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('user_profile_view',array_merge($disp_data,$friend_data));
     $this->load->view('footer_view'); 
    
       
   }
   
    
} 



?>
