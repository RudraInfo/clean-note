 <?php 
 class Upload_photo extends CI_Controller{     
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
       $loginuser = $username;      
      $new_array = array();
      
      $data1['avtar'] = $this->display_photo_model->display_img($username);              
      //$loginuser = $_SESSION['username'];
      $data1['loginuser'] = $_SESSION['username'];
      $data1['friend'] = $this->notification_manager_model->manage_friend_req($loginuser);
      
      $data1['loginuser_friend_data']  = $this->friendreq_model->login_user_friends($loginuser);
      $data1['photos'] = $this->display_photo_model->display_photos($username);    
      $data1['videos'] = $this->display_video_model->display_videos($username);
      $this->load->model("user_model");            
      
          $data1['userdataarray'] = $this->user_model->Loaduserdata($username);            
          $data1['commentdataarray']=$this->user_model->LoadCommentData($username);                 
          $data1['nominationdata']=$this->user_model->LoadNominateData($username);
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
        $this->load->view('header_view',$data1);
        $this->load->view('LatestContentview',$data1);          
        //$this->load->view('testing',$data1);          
        //$this->load->view('temp1',$data1);          
        $this->load->view('footer_view');        
               
      }     
        
     }
    
     public function uploadpostphoto()
        {            
            $u = $_SESSION['username'];         
            $config['upload_path'] = 'user/'.$u.'/uploads';                       
            $path=$config['upload_path'];
            $config['allowed_types'] = '*'; //'gif|jpg|png|jpeg';
            $config['max_size'] = '100000';
            $this->load->library('upload', $config);
            print_r($_FILES);
            
         foreach ($_FILES as $key => $value) {

                if (!empty($value['tmp_name']) && $value['size'] > 0) {

                    if (!$this->upload->do_upload($key)) {
                        
                        $errors = $this->upload->display_errors();
                        //flashMsg($errors);

                } else {
                    // Code After Files Upload Success GOES HERE
                    //echo "sucess";
                    if (session_status() == PHP_SESSION_NONE) 
                    {
                     session_start();                     
                    } 
                    $_SESSION['File_Post']='TRUE';
                }
            }
        }
       
        $source = base_url().'user/'.$u.'/uploads/';
        echo "<img src='$source"  . $this->upload->file_name .  "' height='50' width='50'>";
            
        }    
        
        
}
?>
