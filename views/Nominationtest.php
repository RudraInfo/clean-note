<html lang="en">
  <head>
    <base href="<?php echo base_url();?>">          
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Featherlight – The ultra slim jQuery lightbox.</title>
    <link rel="icon" href="img/favicon.png">

    <!-- FeatherLight -->    
    <link type="text/css" rel="stylesheet" href="featherlight/release/featherlight.min.css" />
    <script src="featherlight/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <link href="featherlight/release/featherbootstrap.min.js" rel="stylesheet" />
    <link href="CSS/nomination/nomination.css" rel="stylesheet">

<style type="text/css">
			@media all {
				.lightbox { display: none; }
				.fl-page h1,
				.fl-page h3,
				.fl-page h4 {
					font-family: 'HelveticaNeue-UltraLight', 'Helvetica Neue UltraLight', 'Helvetica Neue', Arial, Helvetica, sans-serif;
					font-weight: 100;
					letter-spacing: 1px;
				}
				.fl-page h1 { font-size: 110px; margin-bottom: 0.5em; }
				.fl-page h1 i { font-style: normal; color: #ddd; }
				.fl-page h1 span { font-size: 30px; color: #333;}
				.fl-page h3 { text-align: right; }
				.fl-page h3 { font-size: 15px; }
				.fl-page h4 { font-size: 2em; }
				.fl-page .jumbotron { margin-top: 2em; }
				.fl-page .doc { margin: 2em 0;}
				.fl-page .btn-download { float: right; }
				.fl-page .btn-default { vertical-align: bottom; }

				.fl-page .btn-lg span { font-size: 0.7em; }
				.fl-page .footer { margin-top: 3em; color: #aaa; font-size: 0.9em;}
				.fl-page .footer a { color: #999; text-decoration: none; margin-right: 0.75em;}
				.fl-page .github { margin: 2em 0; }
				.fl-page .github a { vertical-align: top; }
				.fl-page .marketing a { color: #999; }

				/* override default feather style... */
				.fixwidth {
					background: rgba(256,256,256, 0.8);
				}
				.fixwidth .featherlight-content {
					width: 500px;
					padding: 25px;
					color: #fff;
					background: #111;
				}
				.fixwidth .featherlight-close {
					color: #fff;
					background: #333;
				}

			}
			@media(max-width: 768px){
				.fl-page h1 span { display: block; }
				.fl-page .btn-download { float: none; margin-bottom: 1em; }
			}
		</style>    
    <script>
//Featherlight Javascript        
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//stats.g.doubleclick.net/dc.js','ga');
			ga('create', 'UA-5342062-6', 'noelboss.github.io');
			ga('send', 'pageview');
     </script>
     
 <script type="text/javascript">
$('#Btnnominate').click(function(){          
        var current = $.featherlight.current();
        current.close();    
        $.featherlight($("#f2"), 'defaults');          
        
});
$(document).ready(function(){
$(document).on ("click",".Nomination",function(e) {
        alert('in nomination'); 
        $("#postdetail1").html("");        
        var p= $(this).parent().parent().parent();        
        var divparentid= p.attr('id');           
        var d= $.parseHTML($("#" + divparentid).prop('outerHTML'));                
        $("#postdetail1").append($("#" + divparentid).prop('outerHTML'));                
        $("#postdetail1 .form-control").remove();        
        $("#postdetail1 .Nomination").remove();        
        $.featherlight($("#f1"), 'defaults');        
            })
        });    
        
</script>


  </head>    

<body>  
 
    





				              



<!-- claim/nomination button   data-featherlight="#f2"  -->                                             
<a id="Nominate1" class = "Nomination" /> Nominate  </a>                                                                              
</body>
<div class="lightbox" id="f1" style="width:864px;height:432px;">
			<h2><u><font color="blue"> NOMINATION</font></u></h2>
                        <h4> NOMINATE THIS POST FOR </h4>                      
                        	<select name="Nomination">
                                    <option value="">Select...</option>
                                    <option value="M">Entertainment</option>
                                    <option value="F">Social Work</option>
                                </select>                                            
                        <div id="postdetail1"> 
                    </div>                     
        <input type="button" text="Nominate" id="Btnnominate">
        </div>
  
  <div class="lightbox" id="f2" style="width:200px;height:200px;">			
           <h4> Nominated Sucessfully </h4>                                              	
  </div>
</html>

