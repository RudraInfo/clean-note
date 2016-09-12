<?php 
if(!defined ('BASEPATH')) exit('No Direct Script Access Allowed');
class Signup extends CI_Controller {

    
    public function index(){    
 $this->load->model('signupdata');  
if(isset($_POST['btn-submit']))
{
$req = array("username","email", "password", "confirm_pass", "gender", "country");
    foreach($req AS $r) {
        if(empty($_POST[$r])) {
            $error = $r . " is a required";
            echo '<p>'.$error.'</p>';
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');    
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_pass');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            $this->signupdata->submit_data($username,$email,$password,$confirm_password,$gender,$country);     
            exit();
        }     
            
        }   
}          
                
                

if (!isset($_POST['email']) == "")
{
    
 $email = $this->input->post('email');  
  $this->signupdata->abc($email);
    exit();
  
  } 

if(!isset($_POST['username']) == "") 
{
  $username = $this->input->post('username');               

  $this->signupdata->user_check($username);
  exit(); 
} 

$this->load->view('signup_view'); 

   }   
}
?>

