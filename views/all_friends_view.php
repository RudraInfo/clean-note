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


foreach ($email_data as $row)
{
    $e = $row->email;
}

if (!isset($user_avtar))
{
    $avtar = "http://localhost/PhpProject1/user/no-image.jpg";
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
      <script src="JQuery/jquery.form.js"></script>
     <script src="CSS/JQuery/searchbox.js"></script>
    <link href="CSS/searchbox/searchbox.css" rel="stylesheet">
    <link href="CSS/searchbox/notification.css" rel="stylesheet">
    
    <script type="text/javascript">
            
        $(document).ready(function(){
             
            $(".widget-head-color-box strong").on("click","a",function(event){
                event.preventDefault();
        var f_click = $(this).html();
        alert(f_click);
                          
              $("#frm1").append("<input type='hidden' id='input_profile' name='input_profile' value='"+f_click+"'/>").submit();
           
           })                       
        } )
   


    </script>
    <script type="text/javascript">
    
    $(document).ready(function(){
        
        $(".profile-info .btn-group").on("click","a",function(event){
            
        event.preventDefault();
        
        var confirmation = window.confirm("Are you Sure you want to unfriend this person ?");
        
        if(confirmation == true)
            {
                var tounfriend = $(this).attr("id");         
                var par = $("#A"+tounfriend).html();
                var send = {'unfriend':par}
                $("#friend_info"+tounfriend).fadeIn();
                $("#friend_img"+tounfriend).fadeIn();              
                $("#friend_btn"+tounfriend).fadeIn();
                 alert(tounfriend);
            $.ajax({
                type:"POST",
                url:"unfriend_controller/do_unfriend",
                data:send,
               success:function(result){
                 
               $("#msg"+tounfriend).html(result);
                $("#msg"+tounfriend).fadeOut(2500);
               $("#friend_info"+tounfriend).fadeOut();
                $("#friend_img"+tounfriend).fadeOut();
                $("#friend_btn"+tounfriend).fadeOut();
                
            },
                error:function(e){
                    
                   alert(e);
                }
                
                
           })
           
            }
        
        
          
        })
        
        
        
    })
    
    </script>
    
  </head>
  <body class="animated fadeIn">

        <!-- Timeline content -->
    <div class="container" style="margin-top:50px;">
      <div class="row ">
        <div class="col-md-10 no-paddin-xs">
          <div class="profile-nav col-md-4">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="<?php echo $user_avtar; ?>" alt="">
                    </a>
                    <h1><?php echo $u; ?></h1>
                    <p><?php echo $e; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="upload_photo"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="about_controller"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li class="active"><a href="all_friends_controller"> <i class="fa fa-users"></i> Friends</a></li>
                    <li><a href="photos.html"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
            </div>
            <!-- Code for go to clicked friend profile -->
                  <form id="frm1" name="frm1" action = "<?php echo base_url();?>search_profile_controller/profile_clicked" method="POST" >             
                                                  
                                            
                 </form>
            <!-- Code for go to clicked friend profile End here -->
            <!-- friends begin here -->
            <?php $x=1; ?>
           <div class="profile-info col-md-6 ">
             <?php foreach ($loginuser_friend_data as $key => $value): ?>                            
                    
                                                
                                              
            
              <div class="col-md-4" id="friend_elements">
                  
                  <div id="friend_info<?php echo $x;?>" class="widget-head-color-box red-bg">    
                      <center><strong> <a style="color:white" id="A<?php echo $x; ?>"  href="javascript:void(0)"><?php echo $value->user1; ?></a></strong></center> 
                  </div>
                  <br/>                          
                  <center><img id="friend_img<?php echo $x; ?>" src="<?php echo($value->avatar); ?>" class="img-circle img-logo m-b-md" alt="profile"></center>
                  <div id="msg<?php echo $x; ?>"></div>
                  <div class="btn-group">
  <button type="button"  id="friend_btn<?php echo $x; ?>" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Friends
  </button>
  <div class="dropdown-menu" style="background:yellow">
      <a class="dropdown-item font-bold" id="<?php echo $x; ?>" href="javascript:void(0)" style="">Unfriend</a>    
  </div>
</div>          
            
            <br/>
             </div>                                                        
         
            <?php $x = $x+1;endforeach; ?>
                          
          </div>
             
            
             
        <!-- friends end here -->
        
        </div>
          
         
    </div><!--End Time line content -->

    
   
  </body>
</html>
