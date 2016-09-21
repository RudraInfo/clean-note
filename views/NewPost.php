<!DOCTYPE html>
<html lang="en">    
        <?php 
            if (session_status() == PHP_SESSION_NONE) 
                {
                    session_start();
                } 
                //echo $_SESSION['username']; 
                //echo $isimage;                           
         ?>
    
    
    <div class="panel panel-white post panel-shadow" id="postdiv<?php echo $NewPostId;?>">            
			 <div class="post-heading">
				      <div class="pull-left image">
				          <img src= '<?php echo $avtar;?>' class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta">
				          <div class="title h5">
				              <a href="#" class="post-user-name">
                                                    <?php 
                                                     if (session_status() == PHP_SESSION_NONE) 
                                                        {
                                                            session_start();
                                                        }                                                   
                                                    echo $_SESSION['username']; ?>
                                              </a>
                                              <?php
                                              if ( isset($_SESSION['File_Post']))
                                                {
                                                    if($_SESSION['File_Post']=='TRUE')
                                                        {
                                                            echo "uploaded a photo.";                                                  
                                                        }  else {
                                                           echo "made a post";
                                                        }
                                                }
                                              ?>				              
				          </div>
				          <h6 class="text-muted time">Just a few seconds ago</h6>
				      </div>
				  </div>
				  <?php
                                        if ( isset($_SESSION['File_Post']))
                                        {
                                            if($_SESSION['File_Post']=='TRUE')
                                              {              
                                            
                                   ?> 
                                      <div class="post-image">				      
                                      <img src= "<?php echo $ImageUrl; ?>" class="image show-in-modal" alt="image post">
                                        </div>  <?php  $_SESSION['File_Post']='FALSE'; }}?>
				  <div class="post-description">
				      <p>
                                      <?php echo $postvariable; ?></p>
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
				  <div class="post-footer" id="post-footer<?php echo $NewPostId;?>">
				      <input class="form-control add-comment-input" placeholder="Add a comment..." type="text">
                                      <ul class="comments-list"><li></li> </ul>
				  </div>                                  
			</div><!-- first post-->
</html>








