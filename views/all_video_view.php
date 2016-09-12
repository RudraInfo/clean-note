
<?php

if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	
        
        
}
else 
{
	$u = $_SESSION['username'];	       
        $user_avtar =  $_SESSION['log_user_photo'];  
        
}


if (!isset($user_avtar))
{
    $avtar = "http://localhost/PhpProject1/user/no-image.jpg";
}

foreach ($result as $row)
    {
        $email = $row->email;
     }

    
    
     
     
?>


<!DOCTYPE html>
<html lang="en">
  <head>
   
    <base href="<?php echo base_url();?>">  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">
    <title>Clean-Note</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <script src="assets/js/jquery.1.11.1.min.js"></script>
    <script src="bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="CSS/JQuery/searchbox.js"></script>   
    
    <link href="CSS/searchbox/searchbox.css" rel="stylesheet">    
   <link rel="stylesheet" href="lightbox/css/lightbox.css">
    <script src="lightbox/js/lightbox.js"></script> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <script type="text/javascript">
    
        $(document).ready(function(){
            
        $(".photo-content").on("click",function(){                
            
        var id_val = $(this).attr("id");
        var newid = id_val.substr(5,5)
        
        var album_name = $("#alb-name"+ newid).html();
         
        $("#frm_album").append("<input type='hidden' id='album_name' name='album_name' value='" + album_name +"'/>").submit();
        
        //window.location.href = "photo_controller/display_album";
            
    
    })
            
            
            
        })
        
        
        
    </script>
  </head>
  <body class="animated fadeIn">
  
    
    <!-- Timeline content -->
    <div class="container" style="margin-top:50px;">
      <div class="row">
        <div class="col-md-10 no-paddin-xs">
          <div class="profile-nav col-md-4">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="<?php echo $user_avtar; ?>" alt="">
                    </a>
                    <h1><?php echo $u; ?></h1>
                    <p><?php echo $email; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="upload_photo"> <i class="fa fa-user"></i> Profile</a></li>
                    <li class="active"><a href="about_controller"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li><a href="all_friends_controller"> <i class="fa fa-users"></i> Friends</a></li>
                    <li><a href="photo_controller"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
            </div>
          
            <div id="album_btn" class="btn btn-default col-md-offset-5" style="margin-top:45px;"><a href="upload_video_controller/load_album">Make Video Album</a></div>
            
            <div class="profile-info col-md-8">
                
            <!-- panel photos -->
            <div class="panel panel-info panel-list-photos">
              <div class="panel-heading">
                <h3 class="panel-title">Albums</h3>
              </div>
                
                <form id="frm_album" action="upload_video_controller/display_video_album" method="POST">
                  
                </form>
              <div class="panel-body">
                  <?php $x = 1; ?>
                  <?php if(isset($album)): ?>
                  <?php foreach ($album as $row): ?>   
                        
                  <div id= "video<?php echo $x; ?>" class="col-md-4 col-sm-6 col-xs-6 photo-content">  
                      <center><div class="header" id="alb-name<?php echo $x;?>" style="color:blueviolet"><?php echo $row->album_name; ?></div></center>
                      <?php $video_link = $row->gallery; ?>
                      <?php $sub_str = substr($video_link, strpos($video_link, "=") + 1); ?>
                      
                      <img id="<?php echo $x; ?>" src="http://img.youtube.com/vi/<?php echo $sub_str; ?>/default.jpg" class="img-responsive  show-in-modal">                  
                  <center> <div class="header" style="color:green"><a><?php echo"[".$row->counter."]"; ?></a></div></center>  
                </div>
                   <?php $x = $x + 1; endforeach;  ?>
                    <?php endif; ?>
                  

                <div class="col-md-12  post-load-more  text-center">
                  <button class="btn btn-info">
                    <i class="fa fa-refresh"></i>Load More...
                  </button>
                </div>                
              </div>
                
            </div><!-- end panel photos -->
            
          </div>

           
    </div><!--End Timeline content -->
      </div>
    </div>
    
    <div class="clear"></div>

     <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
       </script>
  
  </body>
</html>
