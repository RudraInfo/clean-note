<?php

class Friendreq_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('friendreq_model');
    }


    public function index(){          
        
        $loguser = $this->input->post('loguser');
        $user = $this->input->post('user');
        $friendrequest = $this->input->post('friendrequest');
        $data = $this->friendreq_model->friend_request($user,$loguser,$friendrequest);
        
    }

    public function friend_action(){                    
           
       $loginuser = $_SESSION['username']; 
       $action = $this->input->post('accept');
       $selected_pro = $this->input->post('selected_pro');
       $result_data = $this->friendreq_model-> do_action1($action,$loginuser,$selected_pro); 
       
   } 
   
   public function cancel_friend_request(){
    
        $loguser = $this->input->post('loguser');
        $user = $this->input->post('user');
        $friendrequest = $this->input->post('friendrequest');
        $data = $this->friendreq_model->cancel_friend_request($user,$loguser);
       
       
   }
   
   
   
}


?>
