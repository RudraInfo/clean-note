<?php
class Photo_controller extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('upload_model');
           
    }

    public function index(){
        
     $username = $_SESSION['username'];
     $user = $_SESSION['username'];
     $this->load->model('display_photo_model');
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     $data['album'] = $this->display_photo_model->display_album($user);     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('all_photo_view',$data);
     $this->load->view('footer_view'); 
           
        
    }
    
    public function create_album(){
                 
 if(isset($_FILES['file1']))
     
        {         
     
       $u = $_SESSION['username'];        
       
       $album_name = $_POST['album_name']; 
            
        if(!file_exists("user/$u/$album_name")){
		mkdir("user/$u/$album_name",0777);	
		
            }
       
       $config['upload_path'] = 'user/'.$u.'/'.$album_name;
            
       $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
       $config['max_size']	= '3000000';
       $config['max_width']  = '3200';
        $config['max_height']  = '2400';
                
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
            $config['source_image']  = 'user/'.$u.'/'.$album_name.'/'.$filename ;                
            //$config['new_image']= FCPATH . 'user/'.$u.'/Thumb/Thumb_'.$filename;
            //$config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = 640;
            $config['height'] = 425;          
            $this->load->library('image_lib',$config);                     
            if(!$this->image_lib->resize())
            {
               echo $this->image_lib->display_errors();
                         
            }
            $source = base_url().'user/'.$u.'/'.$album_name.'/'.$filename;                             
            $result_data = $this->upload_model->upload_album($source,$album_name) ;
            foreach ($result_data as $row)
            {
            echo "<div class='col-md-4 col-sm-6 col-xs-6 photo-content gallery-img'>" ;
            echo "<img  id ='pro_pic' src='$row->gallery' alt='' class='img-responsive  show-in-modal'>";
            echo '</div>';
            }
         }        
              
              
    }
    
    
    public function load_album(){
        
        $this->load->library('mylibrary');
            $this->mylibrary->autoloadheader();  
            $this->load->view('create_album_view');
            $this->load->view('footer_view');
            
        
            }
            
    public function display_album(){
        
        $album_name = $this->input->post('album_name');
        $user = $_SESSION['username'];
        $this->load->library('mylibrary');
        $this->mylibrary->autoloadheader();       
        $this->load->model('display_photo_model');    
        $data['album_img'] = $this->display_photo_model->view_album($album_name,$user);  
            $this->load->view('display_album_view',$data);
            $this->load->view('footer_view');
           
    }
    
    
    public function user_album(){
        
     $username = $_SESSION['profile_clicked'];
     $user = $_SESSION['profile_clicked'];
     $this->load->model('display_photo_model');
     $this->load->model('about_model');
     $data['result'] = $this->about_model->about_data($username);
     $data['album'] = $this->display_photo_model->display_album($user);
     
     $this->load->library('mylibrary');
     $this->mylibrary->autoloadheader();  
     $this->load->view('user_all_photo_view',$data);
     $this->load->view('footer_view');        
        
    }
    
    public function display_user_album(){
      
        $album_name = $this->input->post('album_name');
        $user = $_SESSION['profile_clicked'];
        $this->load->library('mylibrary');
        $this->mylibrary->autoloadheader();       
        $this->load->model('display_photo_model');    
        $data['album_img'] = $this->display_photo_model->view_album($album_name,$user);  
        $this->load->view('display_album_view',$data);
        $this->load->view('footer_view');   
        
        
    }
    
    
    
    
}



?>
