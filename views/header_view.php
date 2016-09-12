<?php 

if($_SESSION['username']== "")
{
    header('Location:signup');
}

$avtar = $_SESSION['log_user_photo'];
if (! isset($_SESSION['log_user_photo']))
{
    $avtar = "http://localhost/PhpProject1/user/no-image.jpg";
    
}

?>

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
    
   $(document).ready(function() {
  $(".fa-globe").click(function() {
    $(this).toggleClass("open");
    $("#notificationMenu").toggleClass("open");
  });
    });

    </script>
    
    <script type="text/javascript">
    
    $(document).ready(function(){
              
   if($(".messageblock").on("click","strong",(function(event){
          
        event.preventDefault();
        var notif_click = $(this).html();  
        
        alert(notif_click);
        $("#frm_noty").append("<input type='hidden' id='input_notification' name='input_notification' value='" + notif_click +"'/>" ).submit();
        
      })));
 
           
    })
    
$(document).ready(function(){

       $("#notifi").on("click","input",(function(event){
       //alert('first');
       event.preventDefault();
      
       var user_action = $(this).attr('id');
       var parent_id = $(this).parent().attr('id');       
       var selected_pro = $("#" + parent_id).find('strong').html();
       var button_clicked = user_action.charAt(0);
       
      var accept = 0;
      
      if(button_clicked == "a")
           
           {
              accept = 1;
               
           }                  
          
                 
         $.ajax({type:"POST",
                
         url: "<?php base_url();?> friendreq_controller/friend_action",
              data:{'accept':accept,'selected_pro':selected_pro},    
              success:function(htm){
                   
                $("#"+ parent_id).html(htm);
               
               },
               error:function(err){                    
               alert("error="+ err);                    
               }           
           })                         
        })
        
    )})
       
    
    </script>
    
  </head>    

<body class="animated fadeIn">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-principal">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="signup">
            <img src="img/logo.png" class="img-logo">
            <b>Clean-Note</b>
           <form id="frm" name="frm" action= "<?php echo base_url();?>search_profile_controller/profile_clicked" method="post" >
             
                
                
            </form>
           
            <form id="frm_noty" name="frm_noty" action= "<?php echo base_url();?>search_profile_controller/profile_clicked" method="post" >
             
                
                
            </form>
            
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
			<div class="col-md-5 col-sm-4">         
			 <form class="navbar-form">
			    <div class="form-group" style="display:inline;">
			      <div class="input-group" style="display:table;">
                               
			        <input class="form-control search"  id="searchbox" name="search" placeholder="Search..." type="text" />
                                 
                                <div id="display1" style="position:absolute">
                                    <div class="display_box" id="search_result"> </div>                      
                                </div>  
                                
                                <span class="input-group-addon" style="display:inline-table" >
			          <span class="glyphicon glyphicon-search"></span>
			        </span>
                                                               
			      </div>
			    </div>
			  </form>
			</div>        
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="upload_photo">
					 <?php echo $_SESSION['username'];?>
						<img id= "ajax_img1" src="<?php echo $avtar;?>" class="img-nav"> 
					</a>
				</li>
				<li><a href="test"><i class="fa fa-bars"></i>&nbsp;Home</a></li>
				<li><a href="messages.html"><i class="fa fa-comments"></i></a></li>
				<li><a  href="javascript:void(0);"><i class="fa fa-globe"> </i>
                                
  <!-- Notification Code start -------------------------------------------------->
                                  
      <ul id="notificationMenu" class="notifications1">
      <li class="titlebar">
        <span class="title">Notifications</span>
        <span class="settings"><i class="icon-cog"></i>
        </span>
      </li>
      <div class="notifbox" id="notifi">
                  
         <?php $i = 0;?>
         <?php foreach ($friend as $row) : ?> 
            <?php $i++ ; ?>
          <li class="notif">
          <a href="javascript:void(0)">               
            <div class="imageblock">
              <img src="<?php echo $row ->avatar;?>" class="notifimage" />
            </div>
            <div class="messageblock" id="messageblock<?php echo $i;?>">
                <div><strong><?php echo $row->from_user;?></strong> sent you a friend request
             </div>
              <input type="button" id="accept_btn<?php echo $i;?>"  class="btn btn-success btn-xs" value="Accept" > 
              <input type="button" id="decline_btn<?php echo $i;?>"class="btn btn-danger btn-xs" value="Decline" > 
                                            
              <div class="messageinfo">
                <i class="icon-trophy"></i>2 hours ago
              </div>
            </div>
          </a>
          </li> 
         <?php endforeach; ?> 
               
        </div>
      <li class="seeall">
        <a>See All</a>
      </li>
    </ul> 
  </a></li> 

   <!-- Notication Code End -------------------------------------------------------->
         
         <li><a href="#" class="nav-controller"><i class="fa fa-user"></i>Users</a></li>				
	</ul>
        </div>
      </div>
    </nav>  
    
    
</body>
</html>