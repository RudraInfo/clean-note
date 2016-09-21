<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Test  extends CI_Controller {
public $data1;

     function __construct()
	{
		parent::__construct();
                 
		$this->load->helper(array('form', 'url'));   
                $this->load->model('display_photo_model');
                $this->load->model('display_video_model');
                $this->load->model('notification_manager_model');   
                $this->load->model('upload_model');
                $this->load->model('friendreq_model');
               session_start();
	}
    
   public function index(){
      
      if(isset($_FILES['file1']))
        {
        
          $u = $_SESSION['username'];
        
       $config['upload_path'] = 'user/'.$u;
            
       $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
       $config['max_size']	= '30000';
       $config['max_width']  = '1400';
        $config['max_height']  = '1400';
                
       $this->load->library('upload',$config);
       
       $filename = $_FILES['file1']['name'];
       //echo $filename; 
       
       //echo $source;
       if(!$this->upload->do_upload('file1'))
        {
            echo "Error". $this->upload->display_errors();
            return;
            
        }
                        
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image']  = 'user/'.$u.'/'.$filename ;                
            $config['new_image']= FCPATH . 'user/'.$u.'/Thumb/Thumb_'.$filename;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = 110;
            $config['height'] = 110;          
            $this->load->library('image_lib',$config);                     
            if(!$this->image_lib->resize())
            {
               echo $this->image_lib->display_errors();
                         
            }
            $source = base_url().'user/'.$u.'/Thumb/Thumb_'.$filename;            
                       
            $data2 = $this->upload_model->update_photo($source) ;
           
          echo $data2[0];       
            
         }
 else 
     
     {
       $username = $_SESSION['username'] ;
       
      $new_array = array();
      $this->load->model('display_photo_model');
      $data1['avtar'] = $this->display_photo_model->display_img($username);                    
      $data1['loginuser'] = $_SESSION['username'];
      $disp_data = $this->display_photo_model->display_img($username);      
      $_SESSION['log_user_photo'] = $disp_data;        
      $data1['friend'] = $this->notification_manager_model->manage_friend_req($username);
      //$loginuser = $username;      
      $data1['loginuser_friend_data']  = $this->friendreq_model->login_user_friends($username);
      $data1['photos'] = $this->display_photo_model->display_photos($username);    
      $data1['videos'] = $this->display_video_model->display_videos($username);
      $this->load->model('Wallmodel');
      
	  $data1['userdataarray'] = $this->Wallmodel->LoadwallData($username);            
          $data1['commentdataarray']=$this->Wallmodel->LoadCommentData($username);                          
          //echo var_dump($data1['commentdataarray']);
          $this->load->helper('url');
          $this->load->library('mylibrary');
              foreach ($data1 as $key => $value)
                                {
                                    if (is_array($value))
                                        {  
                                        
                                        if($key=='commentdataarray')
                                        {
                                            foreach ($value as $key1 => $value1)
                                            {                                            
                                             //echo $value1['created'];
                                             //echo $this->mylibrary->getlatesttime($value1['created']);
                                             //$value['commenttime']=$this->mylibrary->getlatesttime($value1['created']);
                                             //$value1['commenttime']=$this->mylibrary->getlatesttime($value1['created']);
                                             $data1['commentdataarray'][$key1]['commenttime']=$this->mylibrary->getlatesttime($value1['created']);
                                             //echo $key1;
                                             //echo "<br>";
                                             //echo $value1['created'];
                                             //echo 'hh';
                                            // $value1['commenttime']= $this->mylibrary->getlatesttime($value1['created']);
                                             //array('Key' => $value)
                                             //array_push($value[0],array('commenttime'=>$this->mylibrary->getlatesttime($value1['created'])));
                                             //print_r($value);
                                             //echo "<br>";
                                             //print_r($value1);
                                             //echo "<br>";
                                             
                                            //echo $data1[$value][$value1];//=='commentdataarray')
                                            //print_r($key);                                         
                                            //echo $value;
                                            //echo ($key);
                                            //echo ($value->created);                                            
                                            }                                        

                                            
                                            
                                        }       
                                            
                                        }}
                                
      //print_r($data1);
	 $this->load->vars($data1);
        $this->load->view('home_sub_header_view');
        $this->load->view('header_view');
        $this->load->view('home_content_view');       
        //$this->load->view('Temp');       
        //$this->load->view('footer_view');
     }
} }
?>
