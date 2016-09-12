
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


<!DOCTYPE html>
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
 
    <link href="CSS/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/assets/css/animate.min.css" rel="stylesheet">
    <link href="CSS/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="CSS/assets/css/timeline.css" rel="stylesheet">    
    <script src="CSS/JQuery/jquery.min.js"></script>
    <script src="CSS/assets/js/jquery.1.11.1.min.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="CSS/JQuery/jquery.form.js"></script>     
   
    <script src="CSS/bootstrap-3.3.5/js/bootstrap.min.js"></script>    
    <script src="CSS/assets/js/custom.js"></script>
    <script src="CSS/JQuery/searchbox.js"></script>
    <link href="CSS/searchbox/searchbox.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
 
  </head>
  
   <script type="text/javascript">
	
  	$(document).ready(function() {
		
		$("#photouploadcntrl").on("click",function(){
			
			$("#post_image").click();
		})
		
		        
		$("#post_image").on("change",function(){
			
			$("#imgform").ajaxForm({
				
				target: '#img_preview'
				
			}).submit();
			
		})
	
    });
 
 $("#imgform").on("submit",function(){
	alert('submitting form'); 
 })
 
  </script>
  
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
          <a class="navbar-brand" href="">
            <img src="img/logo.png" class="img-logo">
            <b>Clean-Note</b>
            <form id="frm" name="frm" action= "<?php echo base_url();?>search_profile_controller/profile_clicked" method="post" >
                
                
                
            </form>
          
          
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
			<div class="col-md-5 col-sm-4">         
			 <form class="navbar-form"   >
			    <div class="form-group">
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
				<li>
					<a href="upload_photo">
							<?php  echo $_SESSION['username']; ?>
						<img src="<?php echo $avtar; ?>" class="img-nav">
					</a>
				</li>
				<li class="active"><a href="test"><i class="fa fa-bars"></i>&nbsp;Home</a></li>
				<li><a href="messages.html"><i class="fa fa-comments"></i></a></li>
				<li><a href="notifications.html"><i class="fa fa-globe"></i></a></li>
				<li><a href="#" class="nav-controller"><i class="fa fa-user"></i>Users</a></li>				
			</ul>
       
        
        
        </div>
      </div>
    </nav>
    <div class="row text-center color-container">
    	<h1 class="profile-name"><?php  echo $_SESSION['username']; ?> </h1>
    </div>
    <!-- Timeline content -->
    <div class="container">
    	<div class="col-md-10 no-paddin-xs">
			<div class="row">
			<!-- left content-->
			  <div class="profile-nav col-md-4">
				<!-- Friends activity -->
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">Friends activity</h3>
				  </div>
				  <div class="panel-body">
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/guy-2.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Carlos marthur</a></b> reviewed a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 days ago</span>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/woman-2.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Hillary Markston</a></b> shared a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 min ago</span>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/woman-3.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Leidy marshel</a></b> shared a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 min ago</span>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/woman-4.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Presilla bo</a></b> shared a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 min ago</span>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/woman-4.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Martha markguy</a></b> shared a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 min ago</span>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image">
									<img class="notifications" src="img/Friends/guy-5.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Carlos marthur</a></b> reviewed a 
									<b><a href="#">publication</a></b>. 
									<span class="timeago" >5 days ago</span>
								</div>
							</div>
						</div>						
				  </div>
    			</div> <!-- End Friends activity -->

				<!-- People You May Know -->
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">People You May Know</h3>
				  </div>
				  <div class="panel-body">
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image img-may-know">
									<img class="notifications" src="img/Friends/guy-2.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Carlos marthur</a></b><br>
									<a class="btn btn-info btn-xs" href=""><i class="fa fa-user-plus">Add Friend</i></a>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image img-may-know">
									<img class="notifications" src="img/Friends/woman-1.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Maria gustami</a></b><br>
									<a class="btn btn-info btn-xs" href=""><i class="fa fa-user-plus">Add Friend</i></a>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image img-may-know">
									<img class="notifications" src="img/Friends/woman-2.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Angellina mcblown</a></b><br>
									<a class="btn btn-info btn-xs" href=""><i class="fa fa-user-plus">Add Friend</i></a>
								</div>
							</div>
						</div>
						<div class="notification-row">
							<div class="notification-padding">
								<div class="sidebar-fa-image img-may-know">
									<img class="notifications" src="img/Friends/woman-3.jpg">
								</div>
								<div class="sidebar-fa-text">
									<b><a href="#">Hillary marklein</a></b><br>
									<a class="btn btn-info btn-xs" href=""><i class="fa fa-user-plus">Add Friend</i></a>
                                    
								</div>
							</div>
						</div>						
				  </div>
				</div><!-- End people yout may know -->											 			      
			  </div><!-- end left content-->
			  <!-- right  content-->
			  <div class="profile-info col-md-8">
				<div class="panel">
				  <form>
				 <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
				  </form>
				  <div class="panel-footer">
				      <button class="btn btn-info pull-right">Post</button>
				      <ul class="nav nav-pills">
				          <li>
				              <a href="#"><i class="fa fa-map-marker"></i></a>
				          </li>
				          
                          <li>
                           <a href="#" id="photouploadcntrl"> <i class="fa fa-camera" > </i></a>
              <form action="photo_upload.php" method="post" enctype="multipart/form-data" id="imgform" name="imgform" >	
			         				                      
    			<input type="file" name="post_image"  id="post_image" style="display:none;position:absolute" / > 
                           </form>
				          </li>
				          <li>
				              <a href="#"><i class=" fa fa-film"></i></a>
				          </li>
				          <li>
				              <a href="#"><i class="fa fa-microphone"></i></a>
				          </li>
				      		<li>
                            <div id="img_preview"> </div>
                            	
                            </li>
                      
                      </ul>
				  </div>
				</div>
		        <!-- first post-->
				<div class="panel panel-white post panel-shadow">
				  <div class="post-heading">
				      <div class="pull-left image">
				          <img src="img/Friends/guy-2.jpg" class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta">
				          <div class="title h5">
				              <a href="#" class="post-user-name">Omarion welkdic</a>
				              uploaded a photo.
				          </div>
				          <h6 class="text-muted time">5 seconds ago</h6>
				      </div>
				  </div>
				  <div class="post-image">
				      <img src="img/Post/game.jpg" class="image show-in-modal" alt="image post">
				  </div>
				  <div class="post-description">
				      <p>This is a short description</p>
				      <div class="stats">
				          <a href="#" class="stat-item">
				              <i class="fa fa-thumbs-up icon"></i>228
				          </a>
				          <a href="#" class="stat-item">
				              <i class="fa fa-retweet icon"></i>128
				          </a>
				          <a href="#" class="stat-item">
				              <i class="fa fa-comments-o icon"></i>3
				          </a>
				      </div>
				  </div>
				  <div class="post-footer">
				      <input class="form-control add-comment-input" placeholder="Add a comment..." type="text">
				      <ul class="comments-list">
				          <li class="comment">
				              <a class="pull-left" href="#">
				                  <img class="avatar" src="img/Friends/guy-3.jpg" alt="avatar">
				              </a>
				              <div class="comment-body">
				                  <div class="comment-heading">
				                      <h4 class="comment-user-name"><a href="#">Antony andrew lobghi</a></h4>
				                      <h5 class="time">7 minutes ago</h5>
				                  </div>
				                  <p>This is a comment bla bla bla</p>
				              </div>
				          </li>
				          <li class="comment">
				              <a class="pull-left" href="#">
				                  <img class="avatar" src="img/Friends/guy-2.jpg" alt="avatar">
				              </a>
				              <div class="comment-body">
				                  <div class="comment-heading">
				                      <h4 class="comment-user-name"><a href="#">Jeferh Smith</a></h4>
				                      <h5 class="time">3 minutes ago</h5>
				                  </div>
				                  <p>This is another comment bla bla bla</p>
				              </div>
				          </li>
				          <li class="comment">
				              <a class="pull-left" href="#">
				                  <img class="avatar" src="img/Friends/woman-2.jpg" alt="avatar">
				              </a>
				              <div class="comment-body">
				                  <div class="comment-heading">
				                      <h4 class="comment-user-name"><a href="#">Maria fernanda coronel</a></h4>
				                      <h5 class="time">10 seconds ago</h5>
				                  </div>
				                  <p>Wow! so cool my friend</p>
				              </div>
				          </li>
				      </ul>
				  </div>
				</div><!-- first post-->
		        
					<div class="panel panel-white post-load-more panel-shadow text-center">
						<button class="btn btn-info">
							<i class="fa fa-refresh"></i>Load More...
						</button>
					</div>			      
			  </div><!--end right  content-->
			</div>
    	</div>
    </div><!-- end timeline content-->

    <!-- Online users sidebar content-->
    <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat">Hide</a></p> 
        <p class="text-center chat-title">Online users</p>  
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jeferh Smith</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dapibus acatar</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Antony andrew lobghi</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Maria fernanda coronel</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Markton contz</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Martha creaw</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Yira Cartmen</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jhoanath matew</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Ryanah Haywofd</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Linda palma</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Andrea ramos</span>
        </a>
        <a href="messages.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/child-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dora ty bluekl</span>
        </a>        
      </div>
    </div><!-- Online users sidebar content-->
    
    <footer class="welcome-footer">
      <div class="container">
        <p>
          <div class="footer-links">
            <a href="#">Terms of Use</a> | 
            <a href="#">Privacy Policy</a> | 
            <a href="#">Developers</a> | 
            <a href="#">Contact</a> | 
            <a href="#">About</a>
          </div>   
          Copyright &copy; Company - All rights reserved       
        </p>
      </div>
    </footer>
  </body>
