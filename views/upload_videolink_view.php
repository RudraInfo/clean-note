
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
    <script src="JQuery/jquery.form.js"></script>    
    <script src="CSS/JQuery/searchbox.js"></script>
    <link href="CSS/searchbox/searchbox.css" rel="stylesheet">
    <link href="CSS/searchbox/album.css" rel="stylesheet">
    <link href="CSS/searchbox/notification.css" rel="stylesheet">
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <script type="text/javascript">
    
                 
        $(document).ready(function(){
         
          $("#upload_videolink").on("change",(function(event){
              
              
               event.preventDefault();
                event.stopImmediatePropagation();
                var video_link = $("#video_link").val();
               
                $("#show_video").fadeIn(500);
              var send = {'video_link':video_link};
        $.ajax({
            
            type:"POST",
            url:"upload_video_controller/process_video",
            data:send,
            success:function(htm){
                
            $("#show_video").html(htm);
               
            },
            error:function(err){
                
             $("#show_video").html(err);   
            }
        })
        
        
        }))
        
        $(".btn").click(function(){
        
           var Video = $("#video_link").val(); 
           var Album = $("#album_name").val();
           var send = {"Video":Video,"Album":Album};
           $("#show_video").fadeIn(500);  
            $.ajax({
            
            type:"POST",
            url:"upload_video_controller/save_videolink",
            data:send,
            success:function(htm){
                
            $("#show_video").html(htm);
            $("#show_video").fadeOut(5000)
            $("#video_link").val('');     
            },
            error:function(err){
                
             $("#show_video").html(err);
             $("#show_video").fadeOut(5000);
            }
            })           
           
        
            })        
            })
        
    </script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#show_data").hide();
          $(".album").keyup(function(){
              
          var searchbox1 = $(this).val();
          var datastring = 'albumname='+ searchbox1;    
           if(searchbox1=='')
               {
                   
               }
               else 
               {                   
                       $.ajax({
                       type:"post",
                       url: "http://localhost/PhpProject1/upload_video_controller/show_existing_album_name",
                       data:datastring,
                       success:function(html){                       
                       $("#show_data").html(html).show();                        
                      },
                      error:function(e){
                          
                   alert("error="+e);
               }                       
          })             
                   
        } 
            
      }) 
           
    
      
      })
   
$(document).mouseup(function(){

        $("#show_data").hide();   
        $(".search").val("");
        
      })        

    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){
              
   if($("#show_data").on("click","b",(function(event){
          
        event.preventDefault();
        var existing_album = $(this).html();     
        
        $("#album_name").val(existing_album);      
          
         
      })));
 
           
    })
    
    </script>
    
    
    
  </head>

 <body class="animated fadeIn">   
    <!-- Timeline content -->
<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col-md-10 no-paddin-xs">           
        <div class="profile-info col-md-12">                
            <!-- panel photos -->
            <div class="panel panel-info panel-list-photos">
                  <div class="panel-heading">
                        <h3 class="panel-title">Share Video Link...</h3>               
                             </div>
                        <div class="panel-body">
                            
                            <form>
                            <div class="form-group col-md-5">
                                <label>Album Name</label><input class="form-control album" type="text" id="album_name" name="album_name" placeholder="Album Name" />
                                </br>
                                
                                <div id="show_data" style="position:absolute"> 
                                
                                <div class="dropbox1"> </div> 
                                
                                </div>
                                
                                <div id="upload_videolink"><label>Video Link</label><input class="form-control" type="text" id="video_link" name="video_link" placeholder="Video Link" /> </div>        
                            
                          <p><div id="show_video">
                                
                                
                                
                            </div></p>
                            </div>
                                <div class="btn btn-primary" style="float:right">Post</div>
                            </form>  
                            
                                            
                                    </div>               
                                
                                </div><!-- end panel photos -->           
                          </div>           
                    </div><!--End Timeline content -->
              </div>
         </div>
    </br>
    </br>
    </br>
    </br>
   </br>
    </br>
    </br>
    </br>
  </body>
</html>
