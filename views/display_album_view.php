
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
    <link href="CSS/searchbox/notification.css" rel="stylesheet">
   <link rel="stylesheet" href="lightbox/css/lightbox.css">
    <script src="lightbox/js/lightbox.js"></script> 
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
        <div class="profile-info col-md-12">                
            <!-- panel photos -->
            <div class="panel panel-info panel-list-photos">
                  <div class="panel-heading">
                        <h3 class="panel-title">View Photos</h3>               
                             </div>
                        <div class="panel-body">
                                
                            <ul style="list-style-type: none">
                     <?php foreach ($album_img as $row): ?>   
                  <div class="col-md-4 col-sm-6 col-xs-6 photo-content gallery-img">
                      <li>
                      <a><img src="<?php echo $row->gallery ?> " alt="" class="img-responsive  show-in-modal"></a>
                   <div data-desc="Image2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry Image2"></div>
                      </li>
                  </div>
                     <?php endforeach; ?>    
                                </ul> 
                                         
                            </br>
                             </br>
                             </br>
                             </br>
                            </br>
                             </br>
                             </br>
                             </br>
                              </br>
                             </br>
                             </br>
                             </br>
                            </br>
                             </br>
                             </br>
                             </br>             
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
 <div class="clear"></div>

     <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
       </script>
     
  </body>
</html>
