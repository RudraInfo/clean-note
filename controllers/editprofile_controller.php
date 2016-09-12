<?php
class editprofile_controller extends CI_Controller{  
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
        $this->load->view('editprofile_view',$data);
        $this->load->view('footer_view');
            
        
    }
    
    
    public function update_profile()
       {              
        
        $username = $_SESSION['username'];
        $birthdate = $this->input->post('birthdate');        
        $newdate = str_replace("/","-",$birthdate);
                     
        $data = array('firstname' => $this->input->post('firstname'),            
                      'lastname' => $this->input->post('lastname'),
                      'birthdate' => $newdate,
                      'country' => $this->input->post('country'),
                      'city' => $this->input->post('city'),
                      'school' => $this->input->post('school'),
                      'work' => $this->input->post('work'),
                      'mobile' => $this->input->post('mobile'),
                      'phone' => $this->input->post('phone')
                      );
                      $this->load->model('editprofile_model');
                      
                      $this->editprofile_model->update_profile($username,$data);
        
        
    }
    
    public function change_password(){
        
        
        $username = $_SESSION['username'];
        $curr_pass = $this->input->post('cur_pass');
        $new_pass = $this->input->post('new_pass');
        $this->load->model('editprofile_model');
        $this->editprofile_model->change_password($username,$curr_pass,$new_pass);
        
        
    }
    
    
    
}







?>
