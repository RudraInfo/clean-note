<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Signupdata extends CI_Model{
   
   public function __construct() {
       parent::__construct();
       $this->load->database();
   }
public function abc($email) {
        $q = $this->db->get_where('users',array('email' =>$email),1);
        $quary = $q-> num_rows();
    
if(!filter_var($email,FILTER_VALIDATE_EMAIL)== true)
{
echo '<font color="#FF0000">'. "Invalid Email Format".'</font>';
exit();	
}
else if($quary > 0)  
{
	echo '<font color="#FF0000">'. "This Email is already registered with us".'</font>';
	exit();
}
else 
{	echo '<font color="#00FF00">'. "Email is Ok".'</font>';
	exit();	
}		
           
    }

public function user_check($username){
     
$u = $this->db->get_where('users',array('username'=> $username),1);

foreach ($u->result() as $row) {
    $u_name = $row->username;
      
}
 
$query = $u-> num_rows();
if(strlen($username) >= 3 and strlen($username) < 16 ) 
{
	if($query > 0)
	
	{
	
	  echo '<font color="#FF0000"> The Username <strong>'.$u_name.'</strong> is alredy taken</font>';
          exit();
          
	} else
	
	{
	   echo '<font color="#00FF33"> <strong>'.$username.'</strong> is Available</font>';	
           exit();
	}   
} 
else 

{
 	echo '<font color="#FF0000"> 3-16 characters please</font>';
}
} 

public function submit_data($username,$email,$password,$confirm_password,$gender){
    

$u = $username;
$e = $email;
$p = $password;
$p2 = $confirm_password;
$g = $gender;


// email check 
$email_check = $this->db->get_where('users',array('email'=> $e),1);

$email_rows = $email_check ->num_rows();

$username_check = $this->db->get_where('users',array('username'=> $u),1);

foreach ($username_check ->result() as $row) {
    $u_name = $row->username;
   
}
$user_rows = $username_check->num_rows();

if($u== "" || $e== "" || $p == "" || $p2 == "" || $g == "")
{
	echo " Please fill all the foam data ";
	exit();
} 
else if( $user_rows > 0) 
{
	echo '<font color="#FF0000"> The Username <strong>'.$u_name.'</strong> is alredy taken</font>';
	exit();	
} 
else if($email_rows > 0) 

{
	echo  '<font color="#FF0000">'. "This Email is already registered with us".'</font>';	
	exit();
}
else if($p != $p2)
{
	
 echo '<font color="#FF0000"> Please Confirm Password</font>'; 
 exit();	
	
} else if (strlen($u) <= 3 and strlen($u) > 16)

{
	echo '<font color="#FF0000"> 3-16 characters please</font>';
	exit();
}
else 

{
$ip = getenv('REMOTE_ADDR');
$this->load->helper('date');

$data = array('username'=>$u,'email'=>$e,'password'=>$p,'gender'=>$g,'ip'=>$ip,'activated'=> 1);

$this->db->set('signup','now()',FALSE);
$this->db->set('lastlogin','now()',FALSE);
$this->db->set('notescheck','now()',FALSE);

$this->db->insert('users', $data);

if(!file_exists("user/$u")){
		mkdir("user/$u",0777);	
		mkdir("user/$u/Thumb",0777);
	}
        echo 'Registered Successfully';
        
exit();	
}
    
    
    
    
    
}





}

?>
