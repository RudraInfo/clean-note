<?php

if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	
        
        
}
else 
{
	$u = $_SESSION['profile_clicked'];	       
        
        
}


foreach ($email_data as $row)
{
    $e = $row->email;
    $user_avtar = $row->avatar;
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
            
            $(".profile-info .btn-group").on("click","button",function(event){
              
        event.preventDefault();   
             
            
            var user_id = $(this).attr("id");
           
            var user_name = $("#A"+user_id).html();
            var button_type = $.trim($(this).html());
            
            if(button_type == 'Add as Friend')
                {
                             
           var user = "<?php echo $_SESSION['username']; ?>";         
           var loguser = user_name;
           var friendrequest = "FR";
            alert(loguser);
           var send = {'user':user,'loguser':loguser,'friendrequest':friendrequest};
                $("#view_here").fadeIn(2000);
          $.ajax({ type:"post",
                url:"<?php base_url(); ?>friendreq_controller",
                data:send,
                success:function(htm){ 
                     
               $("#view_here").html(htm);     
               $("#view_here").fadeOut(5000); 
               
               },
               error:function(err){
                     
                    alert(err);
                }
            
                    })
                               
               $(this).html("Friend Request Sent");                     
              }
             
                              
            if(button_type == 'Friend Request Sent')
            {
               
             if($("#btn" + user_id + ".btn-group").find('.dropdown-menu').length == 0)
               {
                      
                $("#btn" + user_id + ".btn-group").append("<div class='dropdown-menu' style='background:yellow;'> <a class='dropdown-item' href='javascript:void(0)'>Cancel</a></div>");
                        
                } 
                
              $(".profile-info #btn" + user_id + ".btn-group").on("click","a",function(event){
                event.preventDefault();
                event.stopImmediatePropagation();
                var user1 = "<?php echo $_SESSION['username']; ?>";         
                var loguser1 = $("#A"+user_id).html();
                var send1 = {'user':user1,'loguser':loguser1};

           
                var confirmation = window.confirm("Are you Sure you want to cancel friend request?");
                
                 $("#view_here").fadeIn(2000);
                if(confirmation == true){          
            
          $.ajax({ type:"post",
                url:"<?php base_url(); ?>friendreq_controller/cancel_friend_request",
                data:send1,
                success:function(htm){ 
                     
               $("#view_here").html(htm);     
               
        $("#btn" + user_id + ".btn-group button").html("Add as Friend");
        $("#btn" + user_id + ".btn-group .dropdown-menu").remove();      
               $("#view_here").fadeOut(2000);
               },
               error:function(err){
                     
                    alert(err);
                }
            
                    }) 
                    
                 }else{
                     
                   
                 }
                 
              
              
                     
                }) 
                
  
            
            } 
           
            if(button_type == 'Confirm Request')
            {
                if($("#btn" + user_id + ".btn-group").find('.dropdown-menu').length == 0)
               {
                      
                $("#btn" + user_id + ".btn-group").append("<div class='dropdown-menu' style='background:yellow;'> <a class='dropdown-item' href='javascript:void(0)'>Accept</a>\n\
                <a class='dropdown-item' style='color:red' href='javascript:void(0)'>Decline</a></div>");
                        
                } 
                
              $(".profile-info #btn" + user_id + ".btn-group").on("click","a",function(event){
              
                event.preventDefault();
                event.stopImmediatePropagation();
                var button_click = $(this).html();
                var selected_pro = $("#A"+user_id).html();
                var accept = 0;
                
            if(button_click == "Accept")
           
            {
              
              accept = 1;
             
            }                  
            
                 
         $.ajax({type:"POST",
                
         url: "<?php base_url();?> friendreq_controller/friend_action",
              data:{'accept':accept,'selected_pro':selected_pro},    
              success:function(htm){
                
               $("#view_here").html(htm);
               $("#view_here").fadeOut(3000); 
              
                  if(accept== 1)
                      {
          $("#btn" + user_id + ".btn-group button").html("Friends");
          $("#btn" + user_id + ".btn-group .dropdown-menu").remove();      
                      }else
                      {
          $("#btn" + user_id + ".btn-group button").html("Add as Friend");
          $("#btn" + user_id + ".btn-group .dropdown-menu").remove();     

                      }   
               },
              error:function(err){                    
               alert("error="+ err);                    
               }           
           })                 
                
          
                })  
            
            }
            
            
            if(button_type == "Friends")
            {
                if($("#btn" + user_id + ".btn-group").find('.dropdown-menu').length == 0)
               {
                      
                $("#btn" + user_id + ".btn-group").append("<div class='dropdown-menu' style='background:yellow;'> <a class='dropdown-item' href='javascript:void(0)'>Unfriend</a></div>");
                        
                } 
              
              $(".profile-info #btn" + user_id + ".btn-group").on("click","a",function(event){
              
                event.preventDefault();
                event.stopImmediatePropagation();
                
                var confirmation = window.confirm("Are you Sure you want to unfriend this person ?");
        
        if(confirmation == true)
            {
                    
                var par = $("#A"+user_id).html();
                var send = {'unfriend':par}
                
            $.ajax({
                type:"POST",
                url:"unfriend_controller/do_unfriend",
                data:send,
               success:function(result){
               
               $("#btn" + user_id + ".btn-group button").html("Add as Friend");
               $("#btn" + user_id + ".btn-group .dropdown-menu").remove();     

               $("#view_here").html(result);
               $("#view_here").fadeOut(3000);                              
                },
                error:function(e){
                    
                   alert(e);
                }                              
                })
           
                }
        
                
                })
                
                
             }
            
            
            })               
            
        })
     
           
    </script>
    
   
    
    <style type="text/css">
        .myDIV {
    
    white-space: nowrap;
    text-overflow: ellipsis;
    width:100px;
    display: block;
    overflow: hidden;          
        }
        
        
    </style>

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
                    <li><a href="about_controller/user_profile"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="about_controller/user_about"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li class="active"><a href="all_friends_controller/user_all_friends"> <i class="fa fa-users"></i> Friends</a></li>
                    <li><a href="photo_controller/user_album"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    
                </ul>
            </div>
            </div>
            <!-- Code for go to clicked friend profile -->
                  <form id="frm1" name="frm1" action = "<?php echo base_url();?>search_profile_controller/profile_clicked" method="POST" >             
                                                  
                                            
                 </form>
            <!-- Code for go to clicked friend profile End here -->
            <!-- friends begin here -->
           <div class="profile-info col-md-6 ">
             <?php $x=1; ?>
               <?php foreach ($clickuser_friends as $key => $value): ?>          
                                                            
             
                                              
            
              <div class="col-md-4" id="friend_elements">
                  
                  <div id="friend_info<?php echo $x;?>" class="widget-head-color-box red-bg">    
                      <center><strong> <a style="color:white" id="A<?php echo $x; ?>"  href="javascript:void(0)"><?php echo $value->user1; ?></a></strong></center> 
                  </div>
                  <br/>                          
                  <center><img id="friend_img<?php echo $x; ?>" src="<?php echo($value->avatar); ?>" class="img-circle img-logo m-b-md" alt="profile"></center>
                  <?php if($value->user1 !== $_SESSION['username']):  ?>
                  <div class="btn-group" id="btn<?php echo $x;?>">
                      
                      <button type="button"  id="<?php echo $x;?>" class="btn btn-frm btn-success btn-xs dropdown-toggle myDIV"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                          
                          <?php echo($value->button); ?>
                       </button> 
                      
                </div>          
                  
                  
<?php endif; ?>
         <br/>
    </div>                                                        
             
            <?php $x=$x+1; endforeach; ?>
               
                   
               
          </div>
                  
                    
        <!-- friends end here -->
        
        </div>
          
         
    </div><!--End Time line content -->
        
    <div id="view_here">
            
            
                    </div>
   
  </body>
</html>
