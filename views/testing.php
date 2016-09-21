<script>
$(document).ready(function(){         
          $(".commentimageclass").on("change",function(){		
                //commentimage
               
                alert('in file change event of comment image');
                alert($(this).attr('id'));                 
                       
                            
                 $("#frm1").ajaxForm({                                          
                 target: '#Commentimage1',
                       success:function(response){                           
                           alert(response);
                           
                          if (response.substr(0,5).toUpperCase()=="ERROR")
                              {
                                alert(response);
                                $("#Commentimage1").css('visibility','visible')
                                  
                              }                          
                       },
                       error:function(err){                           
                          alert(err);
                       }
			 
                     }).submit();           
            
            
       });
})    
</script>
    
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
    <script src="assets/js/jquery.livequery.js"></script>    
    <script src="JQuery/jquery.form.js"></script>    
    <script src="CSS/JQuery/searchbox.js"></script>
    <link href="CSS/searchbox/searchbox.css" rel="stylesheet">
    <link href="CSS/searchbox/notification.css" rel="stylesheet">
    <link rel="stylesheet" href="lightbox/css/lightbox.css">
    
    <script src="lightbox/js/lightbox.js"></script>     
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>    
  
    
    <!-- FeatherLight -->     
        <link href="assets/featherlight/assets/stylesheets/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" rel="stylesheet" href="assets/featherlight/release/featherlight.min.css" />	
        <script src="assets/featherlight/assets/javascripts/jquery-1.7.0.min.js"></script>
	<script src="assets/featherlight/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>	
            <form  id = "frm1"  enctype="multipart/form-data" method="post" action="postCommentBtnHandler/uploadcommentimage" >
                                            <input type="file" class="commentimageclass" id="photoofcomment1" name="photoofcomment1" >
                                            <div id="Commentimage1" style="visibility:hidden"> </div>                                     
                                       </form>
