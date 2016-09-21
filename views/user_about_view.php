
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



foreach ($result as $row)
    {
        $firstname = $row->firstname;
        $lastname = $row->lastname;
        $email = $row->email;
        $country = $row->country;
        $birthday = $row->birthdate;
        $work = $row->work;
        $mobile = $row->mobile;
        $phone = $row->phone;
        $log_avtar = $row->avatar;
    }

    if (!isset($log_avtar))
{
    $log_avtar = "http://localhost/PhpProject1/user/no-image.jpg";
}
    if($birthday=="0000-00-00")
    {
        $birthday = "";
    }
    if($mobile== "0")
    {
        $mobile = "";
    }
    
    if($phone == "0")
    {       
       $phone = "";
         
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        <img src="<?php echo $log_avtar ; ?>" alt="">
                    </a>
                    <h1><?php echo $loguser; ?></h1>
                    <p><?php echo $email; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="about_controller/user_profile"> <i class="fa fa-user"></i> Profile</a></li>
                    <li class="active"><a href="about_controller/user_about"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li><a href="all_friends_controller/user_all_friends"> <i class="fa fa-users"></i> Friends</a></li>
                    <li><a href="photos.html"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
            </div>
            <div class="profile-info col-md-8">
              
             
                
                <div class="panel">
                  <div class="panel-body bio-graph-info">
                      <h1>Bio Graph</h1>
                      <div class="row">
                          <div class="bio-row">
                              <p><span>First Name </span>:<?php echo $firstname; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Last Name </span>:<?php echo $lastname; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Country </span>: <?php echo $country; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Birthday</span>:<?php echo $birthday; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Occupation </span>:<?php echo $work; ?></p>
                          </div>
                          <div class="bio-row ">
                              <p>Email :<?php echo $email; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Mobile </span>:<?php echo $mobile; ?></p>
                          </div>
                          <div class="bio-row">
                              <p><span>Phone </span>:<?php echo $phone; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
      </div>
    </div><!--End Timeline content -->

    
      </body>
</html>
