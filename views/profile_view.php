<?php

if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	

        
}
else 
{
	$u = $_SESSION['username'];	       
        $loguser = $_SESSION['username']; 
        
}

if (!isset($avtar))
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
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <script type="text/javascript">
    $(document).ready(function() {	
	$("#img1").click(function(){
		$("#file1").click();
		});
	});
 
 
        $(document).ready(function() {
	
       
        $("#img1").hide();
       	$("#photoframe").hover(function(){
            $("#img1").show();
		},function(){
	$("#img1").hide();			
	 });
	 }); 
   
       
    </script>
  
    <script type="text/javascript">
        
        $(document).ready(function(){
         
          $("#file1").on("change",(function(){
		$("#showimage").fadeIn("slow").html('');		
		$("#showimage").fadeIn("slow").html('Plaese Wait...');		
                
                      $("#frm1").ajaxForm({
			target: '#showimage',
                       success:function(response){
                           
                          if (response.substr(0,5).toUpperCase()=="ERROR")
                              {
                                  $("#showimage").css('visibility','visible')
                                  
                              }
                          else
                              {
                                   
                                    $("#pro_pic").attr('src', response);                                   
                                    $("#ajax_img1").attr('src',response);
                                    $("#ajax_img2").attr('src',response);
                                    $("#ajax_img3").attr('src',response);
                                    $("#ajax_img4").attr('src',response);
                                    $("#ajax_img5").attr('src',response);
                                    
                                    
                              }
                        
                        
                        
                        
                        
                        //$("#pro_pic").css= "<img src='" + response + "'>";                        
                       },
                       error:function(err){
                           
                          alert(err);
                       }
			 
                     }).submit();           
            
            
        }))
        
        })
        
    </script>
     
    <script type="text/javascript">
    
   $(document).ready(function() {
  $(".fa-globe").click(function() {
    $(this).toggleClass("open");
    $("#notificationMenu").toggleClass("open");
  });
    });

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
						<?php echo $u; ?>
						<img id="ajax_img1" src="<?php echo $avtar; ?>" class="img-nav">
					</a>
				</li>
				<li><a href="test"><i class="fa fa-bars"></i>&nbsp;Home</a></li>
				<li><a href="messages.html"><i class="fa fa-comments"></i></a></li>
				<li><a  href="javascript:void(0);"><i class="fa fa-globe"> </i>
                                
  <!-- Notification Code start -------------------------------------------------->
                                  
      <ul id="notificationMenu" class="notifications">
      <li class="titlebar">
        <span class="title">Notifications</span>
        <span class="settings"><i class="icon-cog"></i>
        </span>
      </li>
      <div class="notifbox">
                  
         
         <?php foreach ($friend as $row) : ?> 
          <li class=" notif">
          <a href="#">
            <div class="imageblock">
              <img src="<?php echo $row ->avatar;?>" class="notifimage" />
            </div>
            <div class="messageblock">
                <div><strong><?php echo $row->from_user;?></strong> sent you a friend request
             </div>
              <input type="button" class="btn btn-success btn-xs" value="Accept" >
              <input type="button" class="btn btn-danger btn-xs" value="Decline" >
                                            
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
    
    
    <div class="row text-center cover-container">
        
<div id="photoframe">
    <form  name='frm1'  id = "frm1" enctype="multipart/form-data" method="post" action="upload_photo" >
    
    <input type="file" name="file1" id="file1" style="visibility:hidden" />
    
            </form>

    <a  style="color:white"><i class="fa fa-edit" id="img1">Edit Photo</i></a>
       
<div id="showimage" name='showimage' style="visibility:hidden">
  
    
       
</div>


</div>
        
 
       
        <a href="upload_photo">
       <img  id ="pro_pic" src="<?php echo $avtar; ?>"  >
          </a>
            
    	<h1 class="profile-name"><?php echo $loguser; ?></h1>
    	<p class="user-text">sharing awesome ideas with your friends, you can grow, grow fast
               
        
        </p>
        
    </div>
    
    <!-- Timeline content -->
    <div class="container" style="margin-top:2px;">
    	<div class="col-md-10 no-paddin-xs">
			<div class="row">
			<!-- left content-->
			  <div class="profile-nav col-md-4">
				<div class="panel">
				  <ul class="nav nav-pills nav-stacked">
				      <li class="active"><a href="upload_photo"> <i class="fa fa-user"></i> Profile</a></li>
				      <li><a href="about_controller"> <i class="fa fa-info-circle"></i> About</a></li>
				      <li><a href="friends.html"> <i class="fa fa-users"></i> Friends</a></li>
				      <li><a href="photos.html"> <i class="fa fa-file-image-o"></i> Photos</a></li>
				      <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
				  </ul>
				</div>
				<!-- friends -->
				<div class="panel panel-white panel-friends">
					<div class="panel-heading">
					  <a href="#" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Friends</h3>
					</div>
					<div class="panel-body text-center">
					  <ul class="friends">
					    <li>
					        <a href="#">
					            <img src="img/Friends/woman-4.jpg" title="Jhoanath matew" class="img-responsive tip">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Friends/woman-3.jpg" title="Martha creawn" class="img-responsive tip">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Friends/guy-2.jpg" title="Jeferh smith" class="img-responsive tip">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Friends/woman-9.jpg" title="Linda palma" class="img-responsive tip">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Friends/guy-9.jpg" title="Lindo polmo" class="img-responsive tip">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Friends/guy-5.jpg" title="andrew cartson" class="img-responsive tip">
					        </a>
					    </li>
					  </ul>
					</div>
				</div><!-- end friends -->
				<!-- photos -->
				<div class="panel panel-white">
					<div class="panel-heading">
					  <a href="#" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Photos</h3>
					</div>
					<div class="panel-body text-center">
					  <ul class="photos">
					    <li>
					        <a href="#">
					          <img src="img/Photos/5.jpg" alt="photo 1" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Photos/2.jpg" alt="photo 2" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Photos/3.jpg" alt="photo 3" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Photos/7.jpg" alt="photo 4" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Photos/5.jpg" alt="photo 5" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <li>
					        <a href="#">
					            <img src="img/Photos/4.jpg" alt="photo 6" class="img-responsive show-in-modal">
					        </a>
					    </li>
					  </ul>
					</div>
				</div><!-- end photos-->

				<!-- likes -->
				<div class="panel panel-white panel-likes">
					<div class="panel-heading">
					  <h3 class="panel-title"><i class="fa fa-thumbs-o-up"></i>&nbsp;Likes</h3>
					</div>
					<div class="panel-body">
					  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="">
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
					      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    </ol>

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner" role="listbox-likes">
					      <div class="item active">
					        <div class="row">
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-5.png" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-6.png" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-1.png" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-2.png" alt="Like"></a></div>
					        </div>
					      </div>
					      <div class="item">
					        <div class="row">
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-3.png" class="show-in-modal" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-4.png" class="show-in-modal" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-5.png" class="show-in-modal" alt="Like"></a></div>
					          <div class="col-md-6 col-sm-6 col-xs-3"><a href="#" class="thumbnail"><img src="img/Likes/likes-6.png" class="show-in-modal" alt="Like"></a></div>
					        </div>
					      </div>
					    </div>

					    <!-- Controls -->
					    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					      <span class="sr-only">Next</span>
					    </a>
					  </div>
					</div>
				</div><!-- en likes -->
				<!-- groups -->
				<div class="panel panel-white panel-groups">
					<div class="panel-heading">
					  <h3 class="panel-title">Groups</h3>
					</div>
					<div class="panel-body">
					  <ul class="list-group">
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-5.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Bootdey competitors</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-1.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Git in action</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-6.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Bootdey Snippets</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-2.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Html 5 live</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					  </ul>
					</div>
				</div><!-- end groups--> 												 			      
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
				              <a href="#"><i class="fa fa-camera"></i></a>
				          </li>
				          <li>
				              <a href="#"><i class=" fa fa-film"></i></a>
				          </li>
				          <li>
				              <a href="#"><i class="fa fa-microphone"></i></a>
				          </li>
				      </ul>
				  </div>
				</div>
		        <!-- first post-->
				<div class="panel panel-white post panel-shadow">
				  <div class="post-heading">
				      <div class="pull-left image">
				         
                                          <img id="ajax_img2" src="<?php echo $avtar; ?>" class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta">
				          <div class="title h5">
				              <a href="#" class="post-user-name"><?php echo $loguser; ?></a>
				              uploaded a photo.
				          </div>
				          <h6 class="text-muted time">5 seconds ago</h6>
				      </div>
				  </div>
				  <div class="post-image">
				      <img src="img/Post/manok.png" class="image show-in-modal" alt="image post">
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
		        <!-- second post -->
				<div class="panel panel-white post panel-shadow">
				  <div class="post-heading">
				      <div class="pull-left image">
				          <img id ="ajax_img3" src="<?php echo $avtar; ?>" class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta">
				          <div class="title h5">
				              <a href="#" class="post-user-name"><?php echo $loguser; ?></a>
				              made a post.
				          </div>
				          <h6 class="text-muted time">1 minute ago</h6>
				      </div>
				  </div> 
				  <div class="post-description"> 
				      <p>Bootdey is a gallery of free snippets resources templates and utilities 
				      for bootstrap css hmtl js framework. Codes for developers and web designers</p>
				      <div class="stats">
				          <a href="#" class="stat-item">
				              <i class="fa fa-thumbs-up icon"></i>2
				          </a>
				          <a href="#" class="stat-item">
				              <i class="fa fa-retweet icon"></i>12
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
				                  <img class="avatar" src="img/Friends/guy-8.jpg" alt="avatar">
				              </a>
				              <div class="comment-body">
				                  <div class="comment-heading">
				                      <h4 class="comment-user-name"><a href="#">Gavhin dahg martb</a></h4>
				                      <h5 class="time">5 minutes ago</h5>
				                  </div>
				                  <p>This is a first comment</p>
				              </div>
				              <ul class="comments-list">
				                  <li class="comment">
				                      <a class="pull-left" href="#">
				                          <img class="avatar" src="img/Friends/woman-5.jpg" alt="avatar">
				                      </a>
				                      <div class="comment-body">
				                          <div class="comment-heading">
				                              <h4 class="comment-user-name"><a href="#">Ryanah Haywofd</a></h4>
				                              <h5 class="time">3 minutes ago</h5>
				                          </div>
				                          <p>Relax my friend</p>
				                      </div>
				                  </li> 
				                  <li class="comment">
				                      <a class="pull-left" href="#">
				                          <img class="avatar" src="img/Friends/woman-7.jpg" alt="avatar">
				                      </a>
				                      <div class="comment-body">
				                          <div class="comment-heading">
				                              <h4 class="comment-user-name"><a href="#">Maria dh heart</a></h4>
				                              <h5 class="time">3 minutes ago</h5>
				                          </div>
				                          <p>Ok, cool.</p>
				                      </div>
				                  </li> 
				              </ul>
				          </li>
				      </ul>
				  </div>
				</div><!-- end second post -->
			        <!-- third post -->
					<div class="panel panel-white post panel-shadow">
					  <div class="post-heading">
					      <div class="pull-left image">
					          <img id="ajax_img4" src="<?php echo $avtar; ?>" class="avatar" alt="user profile image">
					      </div>
					      <div class="pull-left meta">
					          <div class="title h5">
					              <a href="#" class="post-user-name"><?php echo $loguser; ?></a>
					              made a post.
					          </div>
					          <h6 class="text-muted time">1 minute ago</h6>
					      </div>
					  </div> 
					  <div class="post-image">
					      <img src="img/Post/place1-full.jpg" class="image show-in-modal" alt="image post">
					  </div>					      
					  <div class="post-description"> 
					      <p>This is my new awesome photo, ok relax with my style, so cray</p>
					      <div class="stats">
					          <a href="#" class="stat-item">
					              <i class="fa fa-thumbs-up icon"></i>2
					          </a>
					          <a href="#" class="stat-item">
					              <i class="fa fa-retweet icon"></i>12
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
					                  <img class="avatar" src="img/Friends/guy-8.jpg" alt="avatar">
					              </a>
					              <div class="comment-body">
					                  <div class="comment-heading">
					                      <h4 class="comment-user-name"><a href="#">Gavhin dahg martb</a></h4>
					                      <h5 class="time">5 minutes ago</h5>
					                  </div>
					                  <p>This is a first comment</p>
					              </div>
					              <ul class="comments-list">
					                  <li class="comment">
					                      <a class="pull-left" href="#">
					                          <img class="avatar" src="img/Friends/woman-5.jpg" alt="avatar">
					                      </a>
					                      <div class="comment-body">
					                          <div class="comment-heading">
					                              <h4 class="comment-user-name"><a href="#">Ryanah Haywofd</a></h4>
					                              <h5 class="time">3 minutes ago</h5>
					                          </div>
					                          <p>Relax my friend</p>
					                      </div>
					                  </li> 
					                  <li class="comment">
					                      <a class="pull-left" href="#">
					                          <img class="avatar" src="img/Friends/woman-7.jpg" alt="avatar">
					                      </a>
					                      <div class="comment-body">
					                          <div class="comment-heading">
					                              <h4 class="comment-user-name"><a href="#">Maria dh heart</a></h4>
					                              <h5 class="time">3 minutes ago</h5>
					                          </div>
					                          <p>Ok, cool.</p>
					                      </div>
					                  </li> 
					              </ul>
					          </li>
					      </ul>
					  </div>
					</div><!-- end third post -->
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
          <img id="ajax_img5" src="<?php echo $avtar; ?>" class="img-chat img-thumbnail">
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
       
          <div class="footer-links">
            <a href="#">Terms of Use</a> | 
            <a href="#">Privacy Policy</a> | 
            <a href="#">Developers</a> | 
            <a href="#">Contact</a> | 
            <a href="#">About</a>
          </div>   
          Copyright &copy; Company - All rights reserved       
        
      </div>
    </footer>
  </body>
</html>
