<?php
class mylibrary {
    public $data1;
        function __construct()
	{
                $CI =& get_instance();        
		$CI->load->helper(array('form', 'url'));   
                $CI->load->model('display_photo_model');
                $CI->load->model('notification_manager_model');                
                
        }
                
    public function autoloadheader()
    {
      $CI =& get_instance();
      $username = $_SESSION['username'];            
      $data1['avtar'] = $CI->display_photo_model->display_img($username);              
      $loginuser = $_SESSION['username'];           
      $data1['friend'] = $CI->notification_manager_model->manage_friend_req($loginuser);                  
      $CI->load->vars($data1);      
      $CI->load->view('header_view',$data1);     
      
    }
    public function gett()
    {
              $CI =& get_instance();
        echo 'hhhhello';
    }
   
    public function getlatesttime($strtime)
    {
        
             $full=false;
             date_default_timezone_set("Asia/Kolkata"); 
             $today = time();
             $today=strtotime(date('Y-m-d H:i:s', $today));                                                                                                                                                              
             $createdday= strtotime($strtime,0);
             $datediff = abs($today - $createdday);  
             $difftext="";  
             $years = floor($datediff / (365*60*60*24));  
             $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
             $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
             $hours= floor($datediff/3600);  
             $minutes= floor($datediff/60);  
             $seconds= floor($datediff);  
             //year checker                                                       
             if($difftext=="")  
             {  
               if($years>1)  
                $difftext=$years." years ago";  
               elseif($years==1)  
                $difftext=$years." year ago";  
             }  
             //month checker  
             if($difftext=="")  
             {  
                if($months>1)  
                $difftext=$months." months ago";  
                elseif($months==1)  
                $difftext=$months." month ago";  
             }  
             //month checker  
             if($difftext=="")  
             {  
                if($days>1)  
                $difftext=$days." days ago";  
                elseif($days==1)  
                $difftext=$days." day ago";  
             }  
             //hour checker  
             if($difftext=="")  
             {  
                if($hours>1)  
                $difftext=$hours." hours ago";  
                elseif($hours==1)  
                $difftext=$hours." hour ago";  
             }  
             //minutes checker  
             if($difftext=="")  
             {  
                if($minutes>1)  
                $difftext=$minutes." minutes ago";  
                elseif($minutes==1)  
                $difftext=$minutes." minute ago";  
             }  
             //seconds checker  
             if($difftext=="")  
             {  
                if($seconds>1)  
                $difftext=$seconds." seconds ago";  
                elseif($seconds==1)  
                $difftext=$seconds." second ago";  
             }  
             return $difftext;      
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
