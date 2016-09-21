<?php

if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	
       
        
}
else 
{
	$u = $_SESSION['username'];	       
       $user_avtar =  $_SESSION['log_user_photo'];  
        $user_avtar;
}

if(isset($_SESSION['profile_clicked']))
{
    $loguser = $_SESSION['profile_clicked'];
    
}


if (!isset($user_avtar))
{
    $user_avtar = "http://localhost/PhpProject1/user/no-image.jpg";
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
      <link rel="stylesheet" href="lightbox/css/lightbox.css">
    <script src="lightbox/js/lightbox.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <script type="text/javascript">
    
        $(document).ready(function(){
                                  
            var friend_check = "<?php echo $friend_req_sent; ?>";
           
            alert(friend_check);
            if(friend_check == 0)
                {
                    $("#friendbtn a").attr("disabled",false);
                    
                    $("#friendbtn").on("click","a",function(){
                    
              $(this).html("Friend Request Sent");
              $(this).css("backgroundColor","green");
         
           var user = "<?php echo $_SESSION['username']; ?>";         
           var loguser = "<?php echo $_SESSION['profile_clicked'];?>";
           var friendrequest = "FR";
            alert(loguser);
           var send = {'user':user,'loguser':loguser,'friendrequest':friendrequest};
          $("#view_here").fadeIn(2000);
          $.ajax({ type:"post",
                url:"<?php base_url(); ?>friendreq_controller",
                data:send,
                success:function(htm){ 
                     
               $("#view_here").html(htm);     
               $("#view_here").fadeOut(2000);  
               },
               error:function(err){
                     
                    alert(err);
                }
            
              })
                       
              $("#friendbtn a").attr("disabled",true);
              
              })
            
                }
                else 
                {
                    $("#friendbtn a").css("backgroundcolor","green");
                    $("#friendbtn a").html("Friend Request Sent");
                    $("#friendbtn a").attr("disabled",true);
                    
                   
                }
         

           var confirm_req = "<?php echo $confirm_req; ?>";         

           alert("confirm_req=" +confirm_req);
           
           if(confirm_req == 1)
               {
                  
            $("#friendbtn a").hide();    
            $("#friendbtn").append("<input type='button' id='confirm_btn' name='confirm_btn' value='confirm friend'/>");
            
    $("#confirm_btn").click(function(){
      $("#view_here").fadeIn(2000);
      
      var accept = 1;
      var selected_pro = "<?php echo $_SESSION['profile_clicked'];?>" ;
      
      $.ajax({type:"POST",
                
         url: "<?php base_url();?> friendreq_controller/friend_action",
              data:{'accept':accept,'selected_pro':selected_pro},    
              success:function(htm){
                   
                $("#view_here").html(htm);
                $("#view_here").fadeOut(2000);
                $("#confirm_btn").remove();
                $("#friendbtn a").show();
                $("#friendbtn a").html("friends");
                $("#friendbtn a").attr("disabled",true);
                
               },
               error:function(err){                    
               alert("error="+ err);                    
               }           
           })               
        
        
        
    })
       
        
        }
                    
                 
        });
    


    
    </script>
    
    <script type="text/javascript">
    
    $(document).ready(function(){


    var friends = "<?php echo $friendsip; ?>";
        
    alert("friends="+friends);
    
    if(friends == 1)
        {
           $("#friendbtn a").css("backgroundcolor","green");
           $("#friendbtn a").html("Friends");
           $("#friendbtn a").attr("disabled",true);  
          
        }
    
     

});
    
    </script>
 
    <script type="text/javascript">
            
        $(document).ready(function(){
             
            $(".friends li").on("click","strong",function(){
               
            var friend_click = $(this).find('img').attr('title');
                          
               $("#frm").append("<input type='hidden' id='input_profile' name='input_profile' value='" + friend_click +"'/>" ).submit();
           
           })                       
        })
   

    </script>
    
  </head>
  
  <body class="animated fadeIn">

    <!-- Fixed navbar -->
        
    <div class="row text-center cover-container">
        
    
       
        <a href="upload_photo">
       <img  id ="pro_pic" src="<?php echo $avtar; ?>">
          </a>
            
    	<h1 class="profile-name"><?php echo $loguser; ?></h1>
    	<p class="user-text">sharing awesome ideas with your friends, you can grow, grow fast              
        
        </p>
        
        <div class="row" id="friendbtn" > <a class="btn btn-danger btn-xs" href="javascript:void(0)"><i class="fa fa-user-plus">Add Friend</i></a></div>
    
        <div id="view_here">
            
            
        </div>
    
    </div>
    
    <!-- Timeline content -->
    <div class="container" style="margin-top:2px;">
    	<div class="col-md-10 no-paddin-xs">
			<div class="row">
			<!-- left content-->
			  <div class="profile-nav col-md-4">
				<div class="panel">
				  <ul class="nav nav-pills nav-stacked">
				      <li class="active"><a> <i class="fa fa-user"></i> Profile</a></li>
				      <li><a href="about_controller/user_about"> <i class="fa fa-info-circle"></i> About</a></li>
				      <li><a href="all_friends_controller/user_all_friends"> <i class="fa fa-users"></i> Friends</a></li>
				      <li><a href="photo_controller"> <i class="fa fa-file-image-o"></i> Photos</a></li>
				      <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
				  </ul>
				</div>
				<!-- friends -->
				<div class="panel panel-white panel-friends">
					<div class="panel-heading">
					  <a href="all_friends_controller/user_all_friends" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Friends</h3>
					</div>
					<div class="panel-body text-center">
					 <!-- Code for go to clicked friend profile -->
                                              <form id="frm" name="frm" action= "<?php echo base_url();?>search_profile_controller/profile_clicked" method="post" >             
                                                  
                                                  
                                              </form>
                                              <!-- Code for go to clicked friend profile End here -->
                                            
                                            <ul class="friends">
                                                                                            
					   <?php $array_lenth = count($profile_pic); ?>
                                            
                                              <?php if($array_lenth >= 1): ?>
                                              
                                           <?php for($x = 0; $x < $array_lenth; $x++): ?> 
                                           
                                            <li>
					        <a href="javascript:void(0)">                               
                                                                                              
                                                    <strong>  <img src= "<?php echo($profile_pic[$x]->avatar); ?>" title="<?php echo $ids[$x]; ?>" class="img-responsive tip"></strong> 
                                                   
                                                </a>
					    </li>
                                            
					    <?php endfor; ?>
                                            <?php else:?>
                                                
                                            <li>
					        
					    </li>
                                            
                                            <?php endif;?>
                                            
					  </ul>
					</div>
				</div><!-- end friends -->
				<!-- photos -->
				<div class="panel panel-white">
					<div class="panel-heading">
					  <a href="photo_controller/user_album" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Photos</h3>
					</div>
					<div class="panel-body text-center">
					  <ul class="photos">
					    
                                            <?php foreach ($photos as $rows):?>  
                                            <li class="gallery-img">
					        <a>			                                                          
                                                    <img src="<?php echo $rows->gallery; ?>" alt="" class="img-responsive show-in-modal">
					        </a>
					    </li>
					    <?php endforeach; ?>
					  </ul>
					</div>
				</div><!-- end photos-->

				<!-- likes -->
				<div class="panel panel-white panel-likes">
					<div class="panel-heading">
                                          <a href="upload_video_controller/user_display_video" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>  
					  <h3 class="panel-title"><i class="fa fa-film"></i>&nbsp;Video</h3>
					</div>
					<div class="panel-body">
					  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="">
					   				   
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner" role="listbox-likes">
					      <div class="item active">
					        <div class="row">
                                                    <?php foreach ($videos as $row): ?>
                                                    <?php $video_link = $row->gallery; ?>
                                                    <?php $sub_str = substr($video_link, strpos($video_link, "=") + 1); ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-3"><a href="upload_video_controller/user_display_video_album" class="thumbnail"><img src="http://img.youtube.com/vi/<?php echo $sub_str; ?>/default.jpg" alt=""></a></div>
                                                    <?php endforeach; ?>
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

   
    <div class="clear"></div>

     <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
       </script>
    
  </body>
</html>
