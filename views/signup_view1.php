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
    <link href="C:\xampp\htdocs\PhpProject1\bootstrap-combobox-master\css\bootstrap-combobox.css">
    <script type="text/javascript" src="C:\xampp\htdocs\PhpProject1\bootstrap-combobox-master\js\bootstrap-combobox.js"></script>
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
	var gender = $('input[name=gender]:checked').val()        
	alert("gender="+gender);
        var btn = 1;        
	var send = {'username':username,'email':email,'password':pass,'confirm_pass':pass2,'gender':gender,'btn-submit':btn};
       
                 
         
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
 <script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
  });
</script>
  <body class="welcome-page">
      
    <div class="row row-welcome">
        
      <div class="login-page">         
          
          <div class="row">    
           <div class=" col-md-2">
                <a href="profile.html">
                    <img src="img/Friends/woman-1.jpg" style="height:80px;width:80px;position:absolute;margin-top:170px;margin-left:190px;" class="img-circle" />
                </a>
                  <a href="profile.html">
                    <img src="img/Friends/woman-2.jpg" style="height:80px;width:80px;margin-left:190px;margin-top:20px;position:absolute" class="img-circle" />
                </a>                  
                  <a href="profile.html">
                  <img src="img/Friends/guy-3.jpg" style="height:80px;width:80px;margin-top:110px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/woman-3.jpg" style="height:80px;width:80px;margin-top:60px;margin-left:270px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/guy-5.jpg" style="height:80px;width:80px;margin-top:170px;margin-left:100px;position:absolute" class="img-circle" />
                </a>
                <a href="profile.html">
                  <img src="img/Friends/guy-7.jpg" style="height:80px;width:80px;margin-top:150px;margin-left:300px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/guy-4.jpg" style="height:80px;width:80px;margin-top:40px;margin-left:90px;position:absolute" class="img-circle" />
                </a>
               
               <a href="profile.html">
                  <img src="img/Friends/woman-4.jpg" style="height:80px;width:80px;margin-top:300px;margin-left:180px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/guy-8.jpg" style="height:80px;width:80px;margin-top:300px;margin-left:80px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/woman-5.jpg" style="height:80px;width:80px;margin-top:250px;margin-left:280px;position:absolute" class="img-circle" />
                </a>
               <a href="profile.html">
                  <img src="img/Friends/woman-6.jpg" style="height:80px;width:80px;margin-top:230px;margin-right:30px ;position:absolute" class="img-circle" />
                </a>
                     
               
              </div>
                
              <div class="row "> 
                   
                  <h2 style="position:absolute;margin-top:400px;margin-left:20px"> Meet your region's most appreciated people ! </h2>
                  <h2 style="position:absolute;margin-top:430px;margin-left:80px; color:greenyellow"> Let's make them your neighbors! </h2>
             
              </div>          
              <div class="col-md-6 col-md-offset-0" >
                  <div class="row" style="position:relative;margin-top:530px;display:block">
                  <img src="img/celeb.png" />                  
                  <a href="#"> 
                  <img src="img/Friends/guy-8.jpg" style="position:absolute;left:20%;margin-top:60px; " class="img-circle" />
                  </a> 
                  
                  <a href="#">
                  <img src="img/Friends/woman-5.jpg" style="position:absolute;left:40%;margin-top:60px " class="img-circle" />    
                  </a>                 
                  
                  <a href="#">
                  <img src="img/Friends/guy-5.jpg" style="position:absolute;left:60%;margin-top:60px; " class="img-circle" />    
                 </a>          
                                
                  </div>
                                            
                  
              </div>
                             
          <div class="col-md-4 col-md-offset-2">
                        
            <h4><img src="img/logo.png" style="height:70px;width:60px" class="img-logo">Clean-Note </h4> 
            <form role="form" class="frm"> 
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
                    
                    <label class="radio-inline"><input type="radio" name="gender" value="m">Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="f">Female</label>
                  
                    
                 <div id="lbl1"></div>        
             	</div>
                  
              </div> 
              <a href="#" class="btn btn-info btn-lg btn-frm">Log in</a>
              <button type="button" name="btn" class="btn btn-info btn-lg" id="btn-submit" >Register</button>
            	<div id="showmsg"></div>
                
            </form> 	
          </div> 
                        
        </div> 
          <!-- this is new coding-->
          
           
          <div class="row" style="margin-top:100px ">
                      
          <div class="container">
              
                    
                
              <div class="footer footer-links">
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