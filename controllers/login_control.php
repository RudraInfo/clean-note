<?php
class Login_control extends CI_Controller{    
//dfdfdf    
   
    public function index()
    {   
        session_start();
        $this->load->model('login_model'); 
       
        
           if(isset($_POST['Logusername'])|| isset($_POST['Logpassword']))
           {
               $user = $_POST['Logusername'];
               $pass = $_POST['Logpassword'];
               
               $data = $this->login_model->login1($user,$pass);
               
             if($data > 0 )
		  {
			echo '<font color="#00FF00">'. "Login Successfully..Please Wait...".'</font>' ;
                         
                       $_SESSION['username'] = $this->input->post('Logusername');
                       //$_SESSION['log_user_photo']=$this->input->post('Logusername');
                       
                  }
	else 
		   {
		   	 
                        echo  '<font color="#FF0000">'. "Login Failed ! Username or Password is Incorrect.".'</font>' ;
			                
                          
                   }
  
               exit();
               
    }
                 
        $this->load->vars($_SESSION); 
        $this->load->view('signup_view');
        
    }
}
?>