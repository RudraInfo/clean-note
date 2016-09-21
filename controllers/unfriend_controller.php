<?php

class Unfriend_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
           session_start();
        $this->load->model('unfriend_model');
       
    }    
    
    public function do_unfriend(){
        
    $user_to_unfriend = $this->input->post('unfriend');
    $loginuser = $_SESSION['username'];    
    $unfriend_data = $this->unfriend_model->unfriend($user_to_unfriend,$loginuser);
     
    $this->load->view('all_friends_view',$unfriend_data,true);

    
        
    }
    
    
}

?>
