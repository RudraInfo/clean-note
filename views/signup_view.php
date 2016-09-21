<!DOCTYPE html>
<html lang="en">
  <head>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="JQuery/jquery.form.js"></script>

<script src="assets/js/jquery.1.11.1.min.js"></script>
    <script src="bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <script src="JQuery/jquery.form.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <script type="text/javascript">
  $(document).ready (function() {
    
	$("#email").blur(function(){
		
	$("#status1").html('Checking Availibility....');
				$("#status1").fadeIn(1000);
            
           if ($("#email").val()== "") 
          { 
             	$("#status1").html("Either Email is Empty");
                exit();
            }         
            
			$.ajax({ 
			url:"http://localhost/PhpProject1/",
                        type:"POST",			
			data: "email=" + $("#email").val(),
			 success: function(response){
 
				$("#status1").html(response)
                		$("#status1").fadeOut(5000); 				 			 			
				}
			 			
			})
					
	})
	
	
	$("#username").blur(function(){
			
	$("#status").html('Checking Availibility....');
				$("#status").fadeIn(1000);
                                
                                if ($("#username").val()== "") 
          {
               	$("#status").html("Username is Empty");
                exit();
            }
			$.ajax({ 
			url:"http://localhost/PhpProject1/",
                        type:"POST",			
			data: "username=" + $("#username").val(),
			success: function(response){
				 
				$("#status").html(response)
				$("#status").fadeOut(5000) 
				 			 			
			 	}
			 			
			})
		})
			
	});

 
  </script>
  
  
  <script type="text/javascript">
  
  $(document).ready(function() {
	 
	 	  $("#pass1").blur(function(){
		  	
		 	pass1 = $("#pass1").val();
		  	$("#confirm1").fadeIn(1000);
		  if(pass1 == "")
		  {
			$("#confirm1").html("Password Can't be Empty").css("color","#F00");
			 $("#confirm1").fadeOut(5000);
			
		  } else 
		  
		  {
			$("#confirm1").html("ok").css("color","#FF0");  
			$("#confirm1").fadeOut(5000);
		  } 
		  
			  
	  })
        
		$("#pass2").blur(function(){
		   
			
		 	 pass2 = $("#pass2").val();
			
		  	$("#confirm2").fadeIn(1000);
		  if(pass2 == "")
		  {
			$("#confirm2").html("Please Confirm Password").css("color","#F00");
			 $("#confirm2").fadeOut(5000);
			
		  } else if($("#pass1").val() == $("#pass2").val()) 
		  
		  {  
					  
			$("#confirm2").html("Confirmed Succesfully !").css("color","#FF0");  
			$("#confirm2").fadeOut(5000);
		  } 
		  
		  else 
		 
		  {
			  $("#confirm2").html("Not Matching ! Please Recheck Password").css("color","#F00");
			  $("#confirm2").fadeOut(5000);
		  }
		  
			  
	  })
	  
	 $("#gender").focusout(function() {
       
		if($("#gender").val()== "")
		{	
		 $("#lbl1").fadeIn(1000);
				
			$("#lbl1").html("Please Select Gender").css("color","#F00");	
			$("#lbl1").fadeOut(5000);
		}
		else 
		{
			
			$("#lbl1").fadeOut(5000);	
		}	
		
    });
        
	$("#cont").focusout(function() {
		if($("#cont").val()== "")
		{	
		 $("#lbl2").fadeIn(1000);
					
			$("#lbl2").html("Please Select Gender").css("color","#F00");	
			$("#lbl2").fadeOut(5000);
		}
		else 
		{
			
			$("#lbl2").fadeOut(5000);	
		}	
		
    });
    

	
});
  
$(document).ready(function() {
	
	function openindex(){
		window.location.href = '<?php echo 'http://localhost/PhpProject1/login_control'; ?>';
			
	}

$("#btn-submit1").click(function() {
	alert$("btn1");
});


$("#btn-submit").click(function() {
	$("#showmsg").fadeIn(500);
       
       	var username = $("#username").val();
	var email = $("#email").val();
	var pass = $("#pass1").val();
	var pass2 = $("#pass2").val();
	var gender = $("#gender").val();
	var country = $("#country").val();
        var btn = 1;        
	var send = {'username':username,'email':email,'password':pass,'confirm_pass':pass2,'gender':gender,'country':country,'btn-submit':btn};
       
                 
         
 $.ajax({ type:"POST",
 url:"http://localhost/PhpProject1/",
 data: send,
 success: function(response){
		 
			$("#showmsg").html(response);
			
			$("#showmsg").fadeOut(5000);
			
			window.setTimeout( openindex ,5000);
 }
});	
	
	
});
});
  </script>
 
 <script type="text/javascript">
 //* Login Script
 
 $(document).ready(function() {
    
		function openindex(){
	
          
       window.location.href = "<?php echo 'http://localhost/PhpProject1/test'; ?>";
                    
            
		
			
	}
	$("#btnlogin").click(function() {
        $("#login").fadeIn(1000);
		var username = $("#logusername").val();
		var password = $("#logpassword").val();
                alert("username="+ username + "password="+password);
		var send = {'Logusername':username,'Logpassword':password};
		
                 if ($("#logusername").val()== "" || $("#logpassword").val()== "") 
                 {
              
             	$("#login").html("please username or password fields can't be empty");
                exit();
                 }        
            
		$.ajax({ type:"POST",url:"http://localhost/PhpProject1/login_control",data:send,
		      
			  success: function(response){
				
				$("#login").html(response).val(); 
				// alert ($("#login").html(response).text()); 
				//$("#login").fadeOut(5000);
				if($("#login").html(response).text() == "Login Successfully..Please Wait...")
				{ 
				window.setTimeout(openindex,3000);
				}
                          
			  },error:function(err){
                              
                              
                              //alert(err).html().val;
                              alert($("#login").html(err).val());
                              
                          }
                              
                       			
		});
			
    });	
});
</script>
 
  <body class="welcome-page animated fadeIn">
    <div class="row row-welcome">
      <div class="login-page">
        <div class="row"> 
          <div class="col-md-4 col-md-offset-4"> 
            <img src="img/Friends/woman-1.jpg" class="user-avatar img-circle"> 
            <h1><img src="img/logo.png" class="img-logo">Clean-Note </h1> 
            <form role="form" class="frm  animated fadeInRight"> 
              <div class="form-content"> 
                <div class="form-group"> 
                  <input type="text" class="form-control input-underline input-lg" placeholder="Username" id="logusername"> 
                </div> 
                <div class="form-group"> 
                  <input type="password" class="form-control input-underline input-lg" placeholder="Password" id="logpassword"> 
                </div> 
              </div> 
              <button  type="button" class="btn btn-info btn-lg" id="btnlogin">Log in</button>
              <a href="#" class="btn btn-info btn-lg btn-frm">Register</a>
              <div id="login"></div>
            </form> 
            <form role="form" class="frm hidden" id="frmsubmit"> 
              <div class="form-content"> 
                <div class="form-group"> 
                  <input type="text" id = "email" class="form-control input-underline input-lg" placeholder="Email"> 
                  
                  <div id="status1"></div>
                </div> 
                <div class="form-group"> 
                  <input type="text" id="username" class="form-control input-underline input-lg" placeholder="Username"> 
               
               <div id="status"></div>
               
                </div>  
                <div class="form-group"> 
                  <input type="password" id="pass1" class="form-control input-underline input-lg" placeholder="Creat Password"> 
               	<div id="confirm1"></div>
                </div> 
		<div class="form-group"> 
                 <input type="password" id="pass2" class="form-control input-underline input-lg" placeholder="Confirm Password"> 
                <div id="confirm2"></div>
                </div> 
                <div class="form-group">
                <label >Gender</label>        
                                              
                 <Select class=" form-control input-group" id="gender"> 

                  <option value=""></option>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                 </Select>       
                 <div id="lbl1"></div>        
             	</div>
             
              <div class="form-group">
                <label>Country</label>        

                 <Select class="form-control input-group" id="country">                  
                  <?php include_once("template_country_list.php"); ?>                  
                  </Select>               

             	<div id="lbl2"></div>
                </div>
             
              </div> 
              <a href="#" class="btn btn-info btn-lg btn-frm">Log in</a>
              <button type="button" name="btn" class="btn btn-info btn-lg" id="btn-submit" >Register</button>
            	<div id="showmsg"></div>
                
            </form> 	
          </div> 
        </div> 
        <div class="row welcome-full animated fadeInLeft">
          <div class="row-body">
            <!-- some registered users -->
            <div class="welcome-users-inner">
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/guy-3.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-1.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/guy-2.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-2.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/guy-5.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-3.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/guy-8.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-4.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/guy-9.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-7.jpg" class="img-circle" />
                </a>
              </div>
              <div class="welcome-user">
                <a href="profile.html">
                  <img src="img/Friends/woman-7.jpg" class="img-circle" />
                </a>
              </div>
            </div><!-- some registered users -->
          </div>
        </div>
        <div class="row">
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
        </div>
      </div>
    </div>
  </body>
</html>