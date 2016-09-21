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
    <link href="bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <script src="assets/js/jquery.1.11.1.min.js"></script>
    <script src="bootstrap-3.3.5/js/bootstrap.min.js"></script>
    
    <script src="assets/js/custom.js"></script>
     <script src="JQuery/jquery.form.js"></script>
     
     <script>
$(document).ready(function(){ 				
//$(document.body).on('click',function(){ 				
//$(".fa.fa-thumbs-o-up.icon").on('click',function(){                   
$(document.body).on('click', '.stat-item', function(e){
//$.each($('.stat-item:first') , function(e){
//$.each($('.productDescription'), function (index, value) { 
    
    var a=$(this);        
    var parentdivid= $(this).parent().parent().parent();
    //alert("parentdivid" + parentdivid.attr('id'));   
    var likeunlike='';
    alert($.trim($('#' + a.attr('id')).html()));
    if($.trim($('#' + a.attr('id')).html())=='Like')
        {
            alert('in like');        
            $('#' + a.attr('id')).html('UnLike');
            likeunlike="LIKE";
        }else if($.trim($('#' + a.attr('id')).html())=='UnLike')
        {
            alert('in unlike');
            $('#' + a.attr('id')).html('Like');
            likeunlike="UNLIKE";
        }else
        {
            alert('exited');
            return false;
        }
        alert(likeunlike);
        $.ajax({                              
                        url         : 'index.php/PostCommentBtnHandler/OnLikeClick',
                        type        : 'POST',
                        data        : "ParentDiv=" + $(parentdivid).attr('id') + "&LikeUnlike=" + likeunlike ,
                        
                        success  : function (response)
                        {
                            //alert('in' + response);                            
                            //alert($('#' + a.attr('id')).parent().find("b:first").html());
                            if($.trim(response)=='1')
                                {
                                    $('#' + a.attr('id')).parent().find("b:first").html('I like this');                 
                                }
                            else if($.trim(response)=='0')
                                {
                                    $('#' + a.attr('id')).parent().find("b:first").html('');                
                                }
                            else
                                {
                                    $('#' + a.attr('id')).parent().find("b:first").html('Me and my other' + response + ' friends like this');
                                    
                                }
                            
                          },
                       error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                          alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
                       });
    
});

})


$(".fa.fa-comments-o.icon").on('click',function(e){
    alert("On Comments");
});

$(".fa.fa-retweet.icon").on('click',function(e){
    alert("On Retweet Up Icon");
});
 $(document).ready(function(){
    $(".form-control.add-comment-input").on('keyup',function(event){
     var txtid=this; 
         var parentdivid= $(this).parent().parent();
         var commentid=($(parentdivid).find('ul'));//.attr('id'));
         
         $Totcomment= $(commentid).find('li').length + 1;         
         //alert($(parentdivid).attr('id'));         
         //$Updatecomments=$(commentid).find('.fa fa-comments-o icon').html();
         //alert('tot comment = ' + $Totcomment);
        var response;         
        if (event.which==13)
           {                     
                        alert($Totcomment);                        
                        $.ajax({                              
                        url         : 'PostCommentBtnHandler/CommentFunction',
                        type        : 'POST',
                        data        : "Comment=" + $(txtid).val() + "&ParentDiv=" + $(parentdivid).attr('id') + "&CommentCount=" + $Totcomment,
                        //datatype    : 'json',
                        //cache       :  false,
                        
                        success  : function (response)
                        {
                            alert("newcommentval=" + response.substring(1,response.indexOf('<')));
                            var newtotcomment=response.substring(1,response.indexOf('<'));
                            //alert("in sucess" + response);
                            var updateddata= response.replace(newtotcomment, '');
                            alert('updateddata ' + updateddata);
                            //alert('after updated' + response);
                            $("#" + parentdivid.attr('id')).find('.fa.fa-comments-o.icon:first').html(newtotcomment);
                            $(commentid).append(updateddata);                                                    
                            txtid.value="";
                          },
                       error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                          alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
                       });
           }
     });
    
    
 })    

 
$(document).ready(function(){
$('#imageofpost').click(function(){          
    alert('hello');
    $('#photoimg').click();         
});
})



$(document).ready(function(){
$('#photoimg').on('change', function()
                	{ 
                        alert('in change');
                        alert($('#photoimg').val());                        
			$("#imageform").ajaxForm({target: '#imgpreview'                            
			})                        
                        .submit();                        
			})});                    
</script>
<script>
$(document).ready(function() { 		   
function RefreshSomeEventListener() {
    // Remove handler from existing elements
    $(".form-control add-comment-input").off(); 

    // Re-add event handler for all matching elements
    $(".form-control add-comment-input").on("click", function() {
        // Handle event.
    })
}


$('#BtnPostComment').on("click",(function(e) {                
        alert('hello');
        alert ("postcomment " + $("#TxtPostComment").val());
        alert("image url " + $("#imgpreview").children('img').attr('src'));
        e.preventDefault();        
        $.ajax({      
         url         : 'PostCommentBtnHandler',
         type        : 'POST',
         data        : "PostCmt=" + $("#TxtPostComment").val() + "&ImageUrl=" + $("#imgpreview").children('img').attr('src'),
         success  : function (response)
         {
             alert("in sucess" + response);       
             alert('hello befre response');
             $TargetId=$('.panel.panel-white.post.panel-shadow:first').attr('id');
             
             $('.panel.panel-white.post.panel-shadow:first').before(response);
                 if(($('#imgpreview').length)>=1)
                 {
                    alert('in image');
                                        
                 }else{
                     alert('in normal post');
                     
                 }
             
             alert('hello after response');
             
         },
        error: function(xhr,err){
          alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
           alert("Status Text: " + xhr.statusText);
          alert("responseText: " + xhr.responseText);
        }
        });
    }));        

});
</script>

      </head>    

<body class="animated fadeIn">    
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
									<b> <a href="#">Maria gustami</a></b><br>
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
                          <div class="profile-info col-md-8">
				<div class="panel" id="Profilepanel">
				  <form>
				      <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area" id="TxtPostComment"></textarea>
				  </form>                                   
                                    <form id="imageform" method="post" enctype="multipart/form-data" action="upload_photo/uploadpostphoto">
				  <div class="panel-footer">
                                      <button class="btn btn-info pull-right" id="BtnPostComment" type="button">Post</button>				      
				      <ul class="nav nav-pills">
				          <li>
				              <a href="#"><i class="fa fa-map-marker"></i></a>
				          </li>
				          <li>
				              <a id="imageofpost" > <i class="fa fa-camera"></i></a>
                                             <input type="file" name="photoimg" id="photoimg"   style="visibility:hidden;position:absolute;" >
				          </li>
				          <li>
				              <a href="#"><i class=" fa fa-film"></i></a>
				          </li>
				          <li>
				              <a href="#"><i class="fa fa-microphone"></i></a>
				          </li>
				      </ul>
				  </div>
                                    </form>
				</div>
                              
                              <div id="imgpreview"> amit vani  </div>
                         
                         <div id="PostData"> </div>
                         
                           <?php
                            $count=1;    
                            foreach ($userdataarray as $key => $value)
                                {
                                    if (is_array($value))
                                        {  
                                        
                           ?>
                                                        
                              <!-- first post-->		
                                                
                            <div class="panel panel-white post panel-shadow" id="postdiv<?php echo $userdataarray[$key]['msg_id']; ?>">
				  <div class="post-heading" id="Postheading<?php echo $userdataarray[$key]['msg_id'];?>">
				      <div class="pull-left image" id="pullimage<?php echo $userdataarray[$key]['msg_id'];?>">
				          <img id="Pullleftimage<?php echo $userdataarray[$key]['msg_id'];?>" src="<?php echo $userdataarray[$key]['avatar'];; ?>" class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta" id="Pullleftmeta<?php echo $userdataarray[$key]['msg_id'];?>">
				          <div class="title h5" id="Titleh5<?php echo $userdataarray[$key]['msg_id'];?>">
				              <a href="#" class="post-user-name" id="Postusername<?php echo $userdataarray[$key]['msg_id'];?>">
                                                  <?php                                                                                                         
                                                    //if (session_status() == PHP_SESSION_NONE) 
                                                      //  {
                                                           // session_start();
                                                       //}                                                   
                                                    //echo  $userdataarray[$key]['uid_fk']; ?>
                                              </a>
				              <?php
                                              if($userdataarray[$key]['imageurl']<>'' && $userdataarray[$key]['imageurl']<>'undefined' ) {
                                                 echo "uploaded a photo.";                                                  
                                                    }  else {
                                                 echo "made a post";
                                                }                                              
                                              ?>	
				          </div>				          
                                                <h6 class="text-muted time" id="Time<?php echo $userdataarray[$key]['msg_id'];?>">
                                                    <?php
                                                     $full=false;
                                                     date_default_timezone_set("Asia/Kolkata"); 
                                                     $today = time();
                                                     $today=strtotime(date('Y-m-d H:i:s', $today));                                                                                                                                                              
                                                     $createdday= strtotime($userdataarray[$key]['created'],0);
                                                     $datediff = abs($today - $createdday);  
                                                     $difftext="";  
                                                     $years = floor($datediff / (365*60*60*24));  
                                                     $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
                                                     $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                     $hours= floor($datediff/3600);  
                                                     $minutes= floor($datediff/60);  
                                                     $seconds= floor($datediff);  
                                                     //year checker                                                       
                                                     if($difftext=="")  
                                                     {  
                                                       if($years>1)  
                                                        $difftext=$years." years ago";  
                                                       elseif($years==1)  
                                                        $difftext=$years." year ago";  
                                                     }  
                                                     //month checker  
                                                     if($difftext=="")  
                                                     {  
                                                        if($months>1)  
                                                        $difftext=$months." months ago";  
                                                        elseif($months==1)  
                                                        $difftext=$months." month ago";  
                                                     }  
                                                     //month checker  
                                                     if($difftext=="")  
                                                     {  
                                                        if($days>1)  
                                                        $difftext=$days." days ago";  
                                                        elseif($days==1)  
                                                        $difftext=$days." day ago";  
                                                     }  
                                                     //hour checker  
                                                     if($difftext=="")  
                                                     {  
                                                        if($hours>1)  
                                                        $difftext=$hours." hours ago";  
                                                        elseif($hours==1)  
                                                        $difftext=$hours." hour ago";  
                                                     }  
                                                     //minutes checker  
                                                     if($difftext=="")  
                                                     {  
                                                        if($minutes>1)  
                                                        $difftext=$minutes." minutes ago";  
                                                        elseif($minutes==1)  
                                                        $difftext=$minutes." minute ago";  
                                                     }  
                                                     //seconds checker  
                                                     if($difftext=="")  
                                                     {  
                                                        if($seconds>1)  
                                                        $difftext=$seconds." seconds ago";  
                                                        elseif($seconds==1)  
                                                        $difftext=$seconds." second ago";  
                                                     }  
                                                     echo $difftext;                                                      
                                                    ?>
                                          
                                              </h6>
				      </div>
				  </div>
                                
                                <?php
                                        if (strtoupper($userdataarray[$key]['uploads'])=="VIDEO")
                                            {                                            
                                             if($userdataarray[$key]['imageurl']<>'')
                                                {                                                                                                                         
                                                    $imgurl=$userdataarray[$key]['imageurl'];
                                                    $vidurl=$userdataarray[$key]['imageurl'];                                                                                                                                            
                                                } else {                                            
                                                $imgurl="none" ;     
                                             }
                                            } else
                                        {
                                            $vidurl="";
                                            $imgurl="";
                                            if($userdataarray[$key]['imageurl']<>'')
                                                {                                                                                                                         
                                                    $imgurl=$userdataarray[$key]['imageurl'];
                                        } }
                                   ?> 
				  <div class="post-image" id="Postimage<?php echo $userdataarray[$key]['msg_id'];?>">
				      <?php 
                                      if ($vidurl<>'')
                                        {
                                      ?>
                                      <object id="video<?php echo $userdataarray[$key]['msg_id'];?>" width="320" height="320" data="http://www.youtube.com/v/Ahg6qcgoay4" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" /></object>
                                      <?php
                                        }else
                                        {
                                      ?>
                                      <img id="Postimageshowmodal<?php echo $userdataarray[$key]['msg_id'];?>" src="<?php echo $imgurl; ?> " class="image show-in-modal" alt="image post" >
                                      <?php
                                        }
                                      ?>
				  </div>
				  <div class="post-description" id="Postdescription<?php echo $userdataarray[$key]['msg_id']; ?>">
				      <p><?php echo $userdataarray[$key]['message']; ?></p>
				      <div class="stats" id="Stat<?php echo $userdataarray[$key]['msg_id']; ?>">
				          <a class="stat-item" id="like<?php echo $count;?>" href="javascript:void()"> 
                                              
				              <?php if($loginuser==$userdataarray[$key]['usernameforlike'])
                                              //if (is_null($userdataarray[$key]['msg_id_fk'])==0 ) 
                                                    {  ?>
                                                            UnLike
                                                    <?php                                                     
                                                        }
                                                        else
                                                        { 
                                                    ?>  Like  
                                                    <?php                                                    
                                                        }
                                                    ?>                                             
				          </a>
				          <a class="stat-item" id="share<?php echo $count;?>">
				              <i class="fa fa-retweet icon"></i><?php echo $userdataarray[$key]['share_count'] ?>
				          </a>
				          <a class="stat-item" id="comment<?php echo $count;?>"> 
				              <i class="fa fa-comments-o icon"> <?php echo $userdataarray[$key]['comment_count']; ?> </i>
				          </a>
                                          <!-- claim/nomination button   data-featherlight="#f2"  -->                                             
                                          <a id="Nominate<?php echo $count; ?>" class = "Nomination" /> Nominate  </a>                                          
                                    
                                              <br> <br>
    				  <b class="stat-item" id="Boldlikeunlike<?php echo $userdataarray[$key]['msg_id']; ?>"> <?php echo $userdataarray[$key]['like_count'] ?> Other People Like this</b> 
                                  </div>       
                                      </div>
                                
                                <div class="post-footer" id="post-footer<?php echo $userdataarray[$key]['msg_id']; ?>">
                                      <input class="form-control add-comment-input" placeholder="Add a comment..." type="text" id="footerpost<?php echo $userdataarray[$key]['msg_id']?>" >
                                      <ul class="comments-list" id="commentslist<?php echo $userdataarray[$key]['msg_id'];?>">
                                 <?php
                                        
                                        //Test
                                            $commentcount=0; 
                                            foreach ($commentdataarray as $key1 => $value1)
                                                {
                                                  //if (is_array($value1))
                                                   //{  
                                                      //foreach($value1 as $key2=>$value2)
                                                      //{
                                                          //echo "key2=" .$key2 . " value2=" . $value2 . "<br>";                                                          
                                                          //echo $commentdataarray['comment'];
                                                     // }
                                                     if ($commentdataarray[$key1]['msg_id_fk']<>'') 
                                                      {
                                                        $midval=substr($commentdataarray[$key1]['msg_id_fk'],7);                                                          
                                                        if($midval==$userdataarray[$key]['msg_id']) 
                                                            {
                                                          //echo $midval . " = " .$userdataarray[$key]['msg_id'] . " = " . $commentcount;                                                          
                                                        //for($commentcount=0;$commentcount<$userdataarray[$key]['comment_count'];$commentcount++)                                        
                                                        //{                                                                                 
                                                  ?>
                                                <li class="comment" id="comment<?php echo $commentcount;?>">
                                                    <a class="pull-left" href="#">
                                                        <img class="avatar" src="<?php echo $commentdataarray[$key1]['commentavatar']; ?>" alt="avatar">
                                                    </a>
                                                    <div class="comment-body">
                                                        <div class="comment-heading">
                                                            <h4 class="comment-user-name"><a href="#"><?php echo $commentdataarray[$key1]['commentusername'] ?> </a></h4>
                                                            <h5 class="time"><?php  
                                                                               echo $commentdataarray[$key1]['commenttime'];
                                                                               //echo $commenttime;
                                                                               //echo $this->mylibrary->getlatesttime($commenttime) ;
                                                                               
                                                                               
                                                                                  
                                                                               //$CI =& get_instance();
                                                                              
                                                                    ?></h5>
                                                        </div>
                                                        <p><?php echo $commentdataarray[$key1]['comment']; ?></p>
                                                    </div>
                                                </li>
                                <?php
                                    }}}                                     
                                 ?>
                                      </ul>
				  </div>
				</div><!-- first post-->                                                                    

		        	<?php
                                       }$count++;}
                                        ?>
                            </div>	      
			  </div>
                          
			  <!-- right  content-->
			  <!--end right  content-->
			</div>
    	</div>
    </div><!-- end timeline content-->
	 
</body>
</html>