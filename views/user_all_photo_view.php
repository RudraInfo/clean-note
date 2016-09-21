
<?php

if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	
        
        
}
else 
{
	    
        $u = $_SESSION['profile_clicked'];	       
        $user_avtar =  $_SESSION['log_user_photo'];  
        
}


if (!isset($user_avtar))
{
    $avtar = "http://localhost/PhpProject1/user/no-image.jpg";
}

foreach ($result as $row)
    {
        $email = $row->email;
        $log_avtar = $row->avatar;
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
            
            $(".photo-content").on("click","img",function(){                
            
        var id_val = $(this).attr("id");
            
        var album_name = $("#alb-name"+ id_val).html();
                            
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
                        <img src="<?php echo $log_avtar; ?>" alt="">
                    </a>
                    <h1><?php echo $u; ?></h1>
                    <p><?php echo $email; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="about_controller/user_profile"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="about_controller/user_about"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li><a href="all_friends_controller/user_all_friends"> <i class="fa fa-users"></i> Friends</a></li>
                    <li class="active"><a href="photo_controller/user_album"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    
                </ul>
            </div>
            </div>
                                  
            <div class="profile-info col-md-8">
                
            <!-- panel photos -->
            <div class="panel panel-info panel-list-photos">
              <div class="panel-heading">
                <h3 class="panel-title">Albums</h3>
              </div>
                
                <form id="frm_album" action="photo_controller/display_user_album" method="POST">
                  
                </form>
              <div class="panel-body">
                  <?php $x = 1; ?>
                  <?php if(isset($album)): ?>
                  <?php foreach ($album as $row): ?>   
                        
                  <div class="col-md-4 col-sm-6 col-xs-6 photo-content">  
                      <center><div class="header" id="alb-name<?php echo $x;?>" style="color:blueviolet"><?php echo $row->album_name; ?></div></center>
                  <img id="<?php echo $x; ?>" src="<?php echo $row->gallery; ?>" alt="photo 1" class="img-responsive  show-in-modal">
                 <center> <div class="header" style="color:green"><?php echo"[".$row->counter."]"; ?></div></center>  
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
