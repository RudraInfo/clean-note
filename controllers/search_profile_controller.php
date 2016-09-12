   <?php

class Search_profile_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
               $this->load->model('search_profile_model');
               $this->load->model('friendreq_model');
               $this->load->model('display_photo_model');
        
        
    }

    public function index(){
         
        
        session_start();
        
         $user = $_SESSION['username'];
        
        
        $search_query = $this->input->post('searchword');
        if (isset($_POST['searchword']))    
        {
                    $data = $this->search_profile_model->search_profile($search_query);
                    $i = 0;
                   foreach ($data as $row)
                   {
                     $username = $row->username;
                     $avtar = $row->avatar;
                     $i++;                   
                     
                     echo '<div class="display_box" id = "search_result'.$i.'" align="left">';

                    if(is_null($avtar))
                    {
                        echo '<img src = "http://localhost/PhpProject1/user/no-image.jpg" width="20px" height="20px"/>'; echo str_repeat('&nbsp;',3).'<a id ="pro_num'.$i.'" href="">'. "<b>". $username. "</b></a>" ;              

                    }else 

                    {    
                  echo '<img src="'.$avtar.'" width="20px" height="20px"/>'; echo str_repeat('&nbsp;',3).'<a id ="pro_num'.$i.'" href="">'. "<b>". $username. "</b></a>" ;
                    }
                   echo '</div>';
                   }      
        }
          
   }
  
   public function profile_clicked(){
       
       session_start();
       
       
       if(isset($_POST['input_profile']))
       {
       $data = $this->input->post('input_profile');
             
       }
       
       if(isset($_POST['input_notification']))
       {
       $data = $this->input->post('input_notification');
       }
       
       
      $_SESSION['profile_clicked'] = $data;
       
      $this->load->model('display_profile_model');
      $this->load->model('display_video_model'); 
      $user = $data; 
      $username = $data;
      $loginuser = $_SESSION['username'];        
      $disp_data = $this->display_profile_model->display_profile($user);       
      $friend_data  = $this->friendreq_model->friend_count($user);
      $disp_data['photos'] = $this->display_photo_model->display_photos($username);
      $disp_data['videos'] = $this->display_video_model->display_videos($username);
      $this->load->library('mylibrary');
      $this->mylibrary->autoloadheader();
      $this->load->view('search_profile_view',  array_merge($disp_data,$friend_data));      
      $this->load->view('footer_view');
      
      if($loginuser == $user)
          
      {
          // $this->load->helper('url');
          redirect('http://localhost/PhpProject1/upload_photo'); 
      }
        
      }
   
}

  ?>
