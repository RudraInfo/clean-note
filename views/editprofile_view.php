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

foreach ($result as $row)
    {
        $firstname = $row->firstname;
        $lastname = $row->lastname;
        $email = $row->email;
        $country = $row->country;
        $city = $row->city;
        $school = $row->school;
        $birthday = $row->birthdate;
        $work = $row->work;
        $mobile = $row->mobile;
        $phone = $row->phone;
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <script type="text/javascript">
  
    $(document).ready(function(){
        
        $("#btn1").click(function(){
                
        $("input").attr("disabled",false);
                
        $("#btncontrol").append('<input type="button" id="savebtn" class="btn btn-info" value="Save">');
        
        $("#btn1").attr("disabled",true);
        
         
        
        
     })
       
       
    })
  
$(document).on("click","#savebtn",function(){
    $("#msg_success").fadeIn(1000);
   var firstname = $("#firstname").val();
   var lastname = $("#lastname").val();
   var birthdate = $("#birthdate").val();
   var country = $("#country").val();
   var city = $("#city").val();
   var school = $("#school").val();
   var work = $("#work").val();
   var mobile = $("#mobile").val();
   var phone = $("#phone").val();
   
   var send = {'firstname':firstname,'lastname':lastname,'birthdate':birthdate,'country':country,'city':city ,'school':school,'work':work,'mobile':mobile,'phone':phone}
   
        $.ajax({
            
            type:"post",
            url:"<?php base_url();?> editprofile_controller/update_profile",
            data:send,
            success:function(htm){
                
            $("#msg_success").html(htm);
            $("#msg_success").fadeOut(5000);
            },
            error:function(err){
                
                alert(err);
                
            }          
            
            
        })
   
$(this).remove();    
$("input").attr("disabled",true)
$("#new_pass").attr("disabled",false);
$("#curr_pass").attr("disabled",false);
$("#btn1").attr("disabled",false);

})

$(document).on("click","#btn2",function(){

   $("#pass_btn").append('<input type="button" id="savepass" class="btn btn-info" value="Save">');
   $("#curr_pass").attr("disabled",false);
   $("#new_pass").attr("disabled", false);
   $("#btn2").attr("disabled",true);
})
    
$(document).on("click","#savepass",function(){
  

    $("#change_pass").fadeIn(3000)
    
  
  
  var cur_pass = $("#curr_pass").val();
  var new_pass = $("#new_pass").val();
   
   var send = {'cur_pass':cur_pass,'new_pass':new_pass}
   
        $.ajax({
            
            type:"post",
            url:"<?php base_url();?> editprofile_controller/change_password",
            data:send,
            success:function(htm){
                
            $("#change_pass").html(htm);
            $("#change_pass").fadeOut(5000);
            },
            error:function(err){
                
                alert(err);
                
            }          
            
            
        })   
        
    $("#curr_pass").val("");
    $("#new_pass").val("");    
    $(this).remove();
    $("#btn2").attr("disabled",false);
    $("#new_pass").attr("disabled",true);
    $("#curr_pass").attr("disabled",true);
    
})  
  
  </script>
  
  
  
  <body class="animated fadeIn">

    <!-- Fixed navbar -->
    

    <!-- Timeline content -->
    <div class="container" style="margin-top:50px;">
      <div class="row">
        <div class="col-md-10 no-paddin-xs">
          <div class="profile-nav col-md-4">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                       <img src="<?php echo $user_avtar; ?>" alt="">
                    </a>
                    <?php echo $u; ?>
                    <p><?php echo $email; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li><a href="upload_photo"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="about_controller"> <i class="fa fa-info-circle"></i> About</a></li>
                    <li><a href="friends.html"> <i class="fa fa-users"></i> Friends</a></li>
                    <li><a href="photos.html"> <i class="fa fa-file-image-o"></i> Photos</a></li>
                    <li class="active"><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
          </div>
          <div class="profile-info col-md-8">
           <!-- update info -->
            <div class="panel panel-info post panel-shadow">
              <div class="panel-heading">
                <h3 class="panel-title">Edit info</h3>
              </div>            
              <div class="panel-body">
                
                  
                <div class="form-group">
                  <label class="col-md-3 control-label">First name</label>
                  <div class="col-md-8">
                      <input class="form-control" id="firstname" type="text" value="<?php echo $firstname; ?>" disabled >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Last name</label>
                  <div class="col-md-8">
                      <input class="form-control" id="lastname" type="text" value="<?php echo $lastname; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Birth Date</label>
                  <div class="col-md-8">
                    <input class="form-control" id="birthdate"type="text" value="<?php echo $birthday; ?>" disabled >
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-md-3 control-label">Country</label>
                  <div class="col-md-8">
                    <input class="form-control" id="country"type="text" value="<?php echo $country; ?>" disabled>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-md-3 control-label">City</label>
                  <div class="col-md-8">
                    <input class="form-control" id="city"type="text" value="<?php echo $city; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">School</label>
                  <div class="col-md-8">
                    <input class="form-control" id="school"type="text" value="<?php echo $school; ?>" disabled>
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-md-3  control-label">Occupation</label>
                  <div class="col-md-8">
                      <input class="form-control" type="text" id="work" value="<?php echo $work; ?>" disabled>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-md-3 control-label">Mobile No</label>
                  <div class="col-md-8">
                    <input class="form-control" id="mobile" type="text" value="<?php echo $mobile; ?>" disabled>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-md-3 control-label">Phone No</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="phone" value="<?php echo $phone; ?>" disabled>
                  </div>
                </div>
                  
                  <div class="form-group" id ="btncontrol">
                  <button type="submit" id="btn1" class="btn btn-info">Edit</button>
                </div>
                   
                  <div id="msg_success"> </div>
                  
              </div>
            </div><!-- end update info-->
           <!-- update info -->
            <div class="panel panel-info post panel-shadow">
              <div class="panel-heading">
                <h3 class="panel-title">Change password</h3>
              </div>            
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-4 control-label">Current password</label>
                  <div class="col-md-7">
                    <input class="form-control" id="curr_pass" type="password" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">New password</label>
                  <div class="col-md-7">
                    <input class="form-control" id="new_pass"type="password" value="" disabled>
                  </div>
                </div>
                <div class="form-group" id="pass_btn">
                  <button type="submit" id ="btn2"class="btn btn-info">Edit</button>
                </div>                
              </div>
                <div id="change_pass">
                    
                    
                </div>
                
            </div><!-- end update info-->
          </div>
      </div>
    </div><!--End Timeline content -->
   </body>
</html>
