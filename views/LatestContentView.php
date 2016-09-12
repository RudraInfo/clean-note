<?php
if ($_SESSION['username'] == "")
{
	header('Location:Index.php');	        
}
else 
{
	$u = $_SESSION['username'];	       
        $loguser = $_SESSION['username']; 
        
}

if (!isset($avtar))
{
    $avtar = "http://localhost/PhpProject1/user/no-image.jpg";
}
$this->load->helper('array');
  $user_friends = array();
  $user_friends[] =  element('ids', $loginuser_friend_data);  
  $user_friend_photo = array();
  $user_friend_photo[]= element('profile_pic', $loginuser_friend_data);  
 // print_r($user_friend_photo);  
  
?>
<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
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
    <script type="text/javascript">
    $(document).ready(function() {	
	$("#img1").click(function(){
		$("#file1").click();
		});
	});
 
 
        $(document).ready(function() {
	
       
        $("#img1").hide();
       	$("#photoframe").hover(function(){
            $("#img1").show();
		},function(){
	$("#img1").hide();			
	 });
	 }); 
  $(document).ready(function() {  
function h(e) {
  alert('in textarea auto')
        $(e).css({'height':'auto','overflow-y':'hidden'}).height(e.scrollHeight);
}
$('textarea').each(function () {
  h(this);
}).on('input', function () {
  h(this);
});      });   
    </script>
  
    <script type="text/javascript">        
        $(document).ready(function(){         
          $("#file1").on("change",(function(){
		$("#showimage").fadeIn("slow").html('');		
		$("#showimage").fadeIn("slow").html('Plaese Wait...');		
                
                      $("#frm1").ajaxForm({
			target: '#showimage',
                       success:function(response){
                           
                          if (response.substr(0,5).toUpperCase()=="ERROR")
                              {
                                  $("#showimage").css('visibility','visible')
                                  
                              }
                          else
                              {
                                   
                                    $("#pro_pic").attr('src', response);                                   
                                    $("#ajax_img1").attr('src',response);
                                    $("#ajax_img2").attr('src',response);
                                    $("#ajax_img3").attr('src',response);
                                    $("#ajax_img4").attr('src',response);
                                    $("#ajax_img5").attr('src',response);
                                    
                                    
                             }                                       
                                               
                        //$("#pro_pic").css= "<img src='" + response + "'>";                        
                       },
                       error:function(err){
                           
                          alert(err);
                       }
			 
                     }).submit();           
            
            
        }))
        
        })
        
    </script>
<script type="text/javascript">            
        $(document).ready(function(){             
            $(".friends li").on("click","strong",function(){               
            var friend_click = $(this).find('img').attr('title');                          
            $("#frm").append("<input type='hidden' id='input_profile' name='input_profile' value='" + friend_click +"'/>" ).submit();           
           })                       
        })
</script>    
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

$(document).ready(function(){
    $('#Btnnominate').click(function(){          
        //var current = $.featherlight.current();
        //current.close();                      
        //$.featherlight($("#f2"));                  
        parentdivid= $(this).parent().find('div:eq(0)').children('div:first').attr('id');        
        username= "<?php echo $loginuser; ?>";                
        //Storing ONly Numeric Value i.e Postdiv7 = 7
        parentdivid=parentdivid.substr(7,parentdivid.length-7);                 
           $.ajax({                              
                        url         : 'index.php/PostCommentBtnHandler/OnNominationclick',
                        type        : 'POST',
                        data        : "Postid=" + parentdivid + "&username=" + username ,                        
                        success  : function (response)
                        {
                         alert('in sucess'  + response);                                               
                         var current = $.featherlight.current();        
                         current.close();
                         alert('1');                                                                                                                     
                         $.featherlight($("#f2"),'defaults');                                 
                         $.featherlight.defaults.closeSpeed=2000;
                         alert('3');                            
                         //$("#f2").css('visibility','none')
                         //alert('4');
                        var current = $.featherlight.current();        
                        current.close();
                        //alert('start ');                                                 
                         
                         //alert('fade outed end ');                         
                         //$('#successalert').css('visibility','visible');
                         //$("#successalert").fadeOut(2000);
                         //current.open();           
                         //var current = $.featherlight.current();
                         //current.close();                      
                         
                        },
                       error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                          alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
                       });
        
});
});

// Nomination Click Button Event
$(document).ready(function(){
$(document).on ("click",".Nomination",function(e) {
        alert('in nomination'); 
        //var current = $.featherlight.current();
        //current.close();           
        
        $("#postdetail1").html("");                
        var p= $(this).parent().parent().parent();                
        var divparentid= p.attr('id');   
        
        //var d= $.parseHTML($("#" + divparentid).prop('outerHTML'));        
        //alert(d);
        $("#postdetail1").append($("#" + divparentid).prop('outerHTML'));    
        $Nomno= $(this).attr('id').substr(8,($(this).attr('id').length)-1);
        alert($Nomno);
        alert($("#postdetail1").find('div:eq(0)').find('.post-description:eq(0)').find('div:eq(0)').remove());
        alert($("#postdetail1").find('div:eq(0)').find('.comment-list').remove());
        alert($("#postdetail1").find('div:eq(0)').find('.post-footer').remove());
        alert($("#postdetail1").html());
        //$("#postdetail1").remove('post-footer' + $Nomno);
        //$("#postdetail1 .form-control").remove();        
        //$("#postdetail1 .Nomination").remove();                           
        alert('1');                       
        //alert($('#postdetail1').innerHTML());
        alert($('#postdetail1').find('img:eq(0)').attr('id'));
        $imgname=$('#postdetail1').find('img:eq(0)');
        var src = $imgname.attr('src'); // "static/images/banner/blue.jpg"
        var tarr = src.split('/');      // ["static","images","banner","blue.jpg"]
        var file = tarr[tarr.length-1]; // "blue.jpg"
        var data = file.split('.')[0];  // "blue"
        alert(data);
        if (data!='')
            {
                $('#postdetail1').find('img:eq(1)').css('width','250px');
                $('#postdetail1').find('img:eq(1)').css('height','250px');
                alert('2');
               }
        
        $.featherlight($("#f1"), 'defaults');        
        //current.open();                                
        //$.featherlight($("#f2"), 'defaults');         
        //$.featherlight($("#f1"), 'defaults');        
            })
        });    
        
</script>

<script>
$(document).ready(function(){ 				
//$(document.body).on('click',function(){ 				
//$(".fa.fa-thumbs-o-up.icon").on('click',function(){                   
$(document.body).on('click', '.stat-item', function(e){
//$.each($('.stat-item:first') , function(e){
//$.each($('.productDescription'), function (index, value) {     
   // $("#foo")
   // .clone()    //clone the element
   // .children() //select all the children
   // .remove()   //remove all the children
   // .end()  //again go back to selected element
   // .text();
    var a=$(this);
    //alert ( ' this id=' + a.attr('id').substr(a.attr('id').length-1,1) + '     ' + $.trim($(this).text()));    
    //alert('state item' + $.trim($('#' + a.attr('id')).html()));
    var parentdivid= $(this).parent().parent().parent();
    //alert("parentdivid" + parentdivid.attr('id'));   
    var likeunlike='';
    $selectedstatitme=$.trim($(this).text().toUpperCase());
    //alert($.trim($('#' + a.attr('id')).html()));
    //if($.trim($('#' + a.attr('id')).html())=='Like')
    alert($selectedstatitme);
    if($selectedstatitme=='LIKE')
        {
            alert('in like');        
            $('#' + a.attr('id')).html('UnLike');
            likeunlike="LIKE";
            //return;
        //}else if($.trim($('#' + a.attr('id')).html())=='UnLike')
        }else if($selectedstatitme=='UNLIKE')
        {
            alert('in unlike');
            $('#' + a.attr('id')).html('Like');
            likeunlike="UNLIKE";
            //return;
        }else if($selectedstatitme='COMMENT')
        {
            //var p= $(this).parent().parent().parent();        
            //var divparentid= p.attr('id');      
            likeunlike="FRIENDSLIKECOUNT";
            //$('#Commentimage' + $commentimage).attr('style','visibility:visible');
            alert('commentfooter' + a.attr('id').substr(7));
            $('#commentfooter' + a.attr('id').substr(7)).attr('style','visibility:visible');            
            
            //footerpost
            //$('#footerpost' + a.attr('id').substr(a.attr('id').length-1,1)).attr('style','position:static');
            $('#footerpost' + a.attr('id').substr(7)).attr('style','position:static');
            $('#footerpost' + a.attr('id').substr(7)).focus();
            e= $('#footerpost' + a.attr('id').substr(7));
            alert(e.height());
            e.css({'height':'auto','overflow-y':'hidden'}).height(e.scrollHeight);
             
            alert('2');
            //alert('2');
            return;
            //alert(divparentid);
            //alert('exited');
            //return false;
        }
        //alert(likeunlike);
        $(parentdivid).attr('id');
        $.ajax({                              
                        url         : 'index.php/PostCommentBtnHandler/OnLikeClick',
                        type        : 'POST',
                        data        : "ParentDiv=" + $(parentdivid).attr('id') + "&LikeUnlike=" + likeunlike ,
                        
                        success  : function (response)
                        {
                            alert('in' + response);
                            //alert($('#' + a.attr('id')).parent().find("b:first").html());
                            if($.trim(response)=='1')
                                {
                                    alert('total b element = ' + $('#' + a.attr('id')).parent().find("b").length);
                                    //$('#' + a.attr('id')).parent().find("b:first").html('I like this');                 
                                    $('#Boldlikeunlike' + a.attr('id').substr(a.attr('id').length-1,1) ).html('I like this');                 
                                }
                            else if($.trim(response)=='0')
                                {
                                    //$('#' + a.attr('id')).parent().find("b:first").html('');                
                                    $('#Boldlikeunlike' + a.attr('id').substr(a.attr('id').length-1,1) ).html('');                 
                                }
                            else
                              {
                                   // $('#' + a.attr('id')).parent().find("b:first").html('Me and my other' + response + ' friends like this');                                   
                            $('#LikeList').html(response);                                                       
                            $.featherlight($("#f3"), 'defaults')                                   
                                    
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
 
// $(document).ready(function(){
//    $(".form-control.add-comment-input").on('keyup',function(event){

$(document.body).on('keyup', '.input-group .form-control.add-comment-input' ,function(event){
        alert('in');
        var txtid=this; 
         var parentdivid= $(this).parent().parent().parent().parent()//.attr('id');
         var commentid=($(parentdivid).find('ul'));//.attr('id'));
         //parentdivid=parentdivid.substr(7,parentdivid.length-7);                 
         //alert(parentdivid);
         $Totcomment= $(commentid).find('li').length + 1;         
         //alert($(parentdivid).attr('id'));         
         //$Updatecomments=$(commentid).find('.fa fa-comments-o icon').html();
         //alert('tot comment = ' + $Totcomment);
        
        alert($Totcomment);
        var response;         
        alert($(txtid).val());
        if (event.which==13 && $(txtid).val()!= '')
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
                            //$("#" + parentdivid.attr('id')).find('.fa.fa-comments-o.icon:first').html(newtotcomment);
                            $(commentid).append(updateddata);                                                    
                            //txtid.attr('style','visibility:hidden');
                            //$('#footerpost' + txtid.attr('id').substr(txtid.attr('id').length-1,1)).attr('style','visibility:hidden');
                            //$('#commentfooter' + a.attr('id').substr(a.attr('id').length-1,1)).attr('style','visibility:visible');
                            txtid.value="";
                            //$('#footerpost' + txtid.attr('id').substr(10)).attr('style','visibility:visible');).
                            //txtid.hide()a.attr('id').substr(7)).attr('style','visibility:visible');
                            //alert($(txtid).attr('id').substr(10));
                            //$('#footerpost' + $(txtid).attr('id').substr(10)).attr('style','visibility:hidden');
                            $('#commentfooter' + $(txtid).attr('id').substr(10)).attr('style','visibility:hidden');

                          },
                       error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                         alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
                       });
           }else if (event.which==27)
           {                
            $(this).parent().find('span:eq(0)').text($(this).val());
            $(this).parent().hide();
            $('#Commentimage' + $(parentdivid).attr('id').substr(7)).hide();
            
            
            //$(this).parent().find('span:eq(0)').show();            
         
           }
     });
    
    
 

 
$(document).ready(function(){
$('#imageofpost').click(function(){          
    //alert('hello');
    $('#photoimg').click();         
});
})

//Delete Post 
$(document).ready(function(){
$('.DeletePost').click(function(){          
     parentdiv= $(this).parent().parent().parent().parent();
     parentdiv.fadeOut(2000);
});
})

// This Function Performs Image Upload In Comment Section
$(document).ready(function(){
$('.commentuploadphoto').click(function(){          
     alert('click in upload photo in comment');
     //imageofcomment
     alert($(this).attr('id').substr(14));     
     $("#photoofcomment" +  $(this).attr('id').substr(14)).click();     
     
     //Commentimage
     //$(#photoofcomment
});
})

// This Script Performs Ajax Operation Of Upload Image/Photo From Comment Box


        $(document).ready(function(){         
          $(".commentimageclass").on("change",function(){		
                //commentimage
                //alert($("#frm" + $(this).attr('id').substr(14)));
               
                //alert('commimage=' + $('#' + commimage).css('visibility'));
                //alert('in file change event of comment image');
                //alert($(this).attr('id'));                 
                    //$('.handle').attr('style','left: 300px');
                    //$commentimage=$('#Commentimage' + $(this).attr('id').substr(14)).attr('style','visibility:visible');
                    $commentimage=$(this).attr('id').substr(14);
                    alert($commentimage);
                         //alert $commimage.css();   
                 $("#frm" + $(this).attr('id').substr(14)).ajaxForm({                                          
                 target: '#Commentimage' + $(this).attr('id').substr(14) ,
                       success:function(response){                           
                           alert('in success');                                                    
                           $('#Commentimage' + $commentimage).attr('style','visibility:visible');
                           
                           
                           
                          if (response.substr(0,5).toUpperCase()=="ERROR")
                              {
                                alert(response);
                                $("#Commentimage" + $(this).attr('id').substr(14)).css('visibility','visible')
                                  
                              }                          
                       },
                       error:function(err){                           
                          alert(err);
                       }
			 
                     }).submit();           
            
            
       });
})
        
       
        
    




$(document).ready(function(){
$('.Viewmorecomments').click(function(){          
     var parentdivid = $(this).attr("id");
     parentdivid=parentdivid.substr(15,parentdivid.length-15);
     alert('parentdivid=' + parentdivid);
     currviewmoreid= $(this).attr("id");
     commentcount=$(this).attr('id').substr(15,$(this).attr('id').length-15);     
     username= "<?php echo $loginuser; ?>";                     
     $.ajax({
     type: "POST",     
     url: "PostCommentBtnHandler/Onviewmorecomments",
     data: "msg_id=" + parentdivid + "&username=" + username ,     
     success: function(html){        
        alert('in success');
        alert(html);
        //alert('Msg' + )
        //var mstid = 'Mst' + parentdivid + 'comment' + commentcount;
        //alert('mstid=' + mstid); 
        //var p = $('#commentslist' + commentcount)[0].outerHTML;         
        //
        //var p = $('#commentslist' + commentcount).outerHTML;         
        //alert(p);
        //alert('1');
        //alert(parentdivid);
        //alert ($('#' + currviewmoreid).attr('id'));      
        
        //$('#' + currviewmoreid).remove();   
        //$('#' + currviewmoreid).remove();   
        //alert($('#' + currviewmoreid).html());
        
        alert($('#' + currviewmoreid).html());
        $('#' + currviewmoreid).remove();   
        $('#' + currviewmoreid).remove();   
        //parentdiv.fadeOut(2000);
        alert('parentdivid=' + parentdivid);
        
        alert($('#commentslist' + parentdivid).attr('id'));
        $('#commentslist' + parentdivid).append(html);                 
        //alert($('Mst3comment3').innerHTML());
        //alert($('#' + mstid).HTML());
     
     },
    error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                          alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
        //$("#Mst"+parentdivid+"viewmorecomments").prepend(html);
        //$("#view"+ID).remove();
        //$("#two_comments"+ID).remove();

});
       
});
})


//Delete Comment
//$(document).ready(function(){
//$('.DeleteComment').click(function(){               
//$('.DeleteComment').on('click',function(){               
$(document.body).on('click', '.DeleteComment' ,function(){
    alert('in delete comment');
     parentdiv= $(this).parent().parent().parent();
     parentdiv.fadeOut(2000);
     //parentdiv.fadeOut(2000);
});





//Edit Comment
//$(document).ready(function(){
//$('.Editcomment').click(function(){               
$(document.body).on('click', '.Editcomment' ,function(){
     //alert('in edit comment');
     //$(this).hide();
     //Hiding Comment which we want to update
     $(this).parent().find('div:eq(0)').find('p:eq(0)').find('span:eq(0)').hide();
     //fetching value of current comment
     $commentval=$(this).parent().find('div:eq(0)').find('p:eq(0)').find('span:eq(0)').text();
     //alert($commentval);
     //Showing the hiddent textbox for editing value;
     $(this).parent().find('div:eq(0)').find('p:eq(0)').find('input:eq(0)').show();
     //place current comment data to new textbox
     $(this).parent().find('div:eq(0)').find('p:eq(0)').find('input:eq(0)').val($commentval);  
     $(this).parent().find('div:eq(0)').find('p:eq(0)').find('input:eq(0)').focus();
     
     //alert(parentdiv);
     //parentdiv.fadeOut(2000);
});


$(document.body).on('click', '.Likecomment' ,function(){
     //alert('in edit comment');
     //$(this).hide();
     //Hiding Comment which we want to update
    alert('in comment like');
    alert($(this).parent().attr('id'));
     //alert(parentdiv);
     //parentdiv.fadeOut(2000);
});


//Editcommentbox      
//$(document).ready(function(){
//$('.Editcommentbox').on('keyup',function(event){
    //alert(event.which);
$(document.body).on('keyup', '.Editcommentbox' ,function(event){
    if(event.which==27)
     {
         $(this).hide();
         $(this).parent().find('span:eq(0)').show();
         $(this).parent().find('span:eq(0)').text($(this).val());
         
     }
     else if(event.which==13)
        {
            $(this).hide();
            $(this).parent().find('span:eq(0)').show();
            $(this).parent().find('span:eq(0)').text($(this).val());
            //Currentcommentid=($(this).attr('id'));
            
            commentid=$(this).attr('id').substr(18,$(this).attr('id').length-18);     
            alert(commentid);
            $.ajax({                              
                        url         : 'index.php/PostCommentBtnHandler/EditCommentFunction',
                        type        : 'POST',
                        data        : "Commentid=" + commentid + "&commentval=" + $(this).val() ,                        
                        success  : function (response)
                        {
                         alert('response' + response);
                         var current = $.featherlight.current();        
                         current.close();
                         alert('1');                                                                                                                     
                         $.featherlight($("#f2"),'defaults');                                 
                         $.featherlight.defaults.closeSpeed=2000;
                         alert('3');                            
                         //$("#f2").css('visibility','none')
                         //alert('4');
                        var current = $.featherlight.current();        
                        current.close();
                        //alert('start ');                                                 
                         
                         //alert('fade outed end ');                         
                         //$('#successalert').css('visibility','visible');
                         //$("#successalert").fadeOut(2000);
                         //current.open();           
                         //var current = $.featherlight.current();
                         //current.close();                      
                         
                        },
                       error: function(xhr,err){
                         alert("readyState: "+ xhr.readyState + "\nstatus: " +xhr.status);
                          alert("Status Text: " + xhr.statusText);
                         alert("responseText: " + xhr.responseText);
                       }
                       });
            
        } 
    
});




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
<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//stats.g.doubleclick.net/dc.js','ga');
			ga('create', 'UA-5342062-6', 'noelboss.github.io');
			ga('send', 'pageview');
</script>
   

  </head>    
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


<body>  
 
    
<div class="row text-center cover-container">
        
<div id="photoframe">
    <form  name='frm1'  id = "frm1" enctype="multipart/form-data" method="post" action="upload_photo" >
    
    <input type="file" name="file1" id="file1" style="visibility:hidden" />
    
            </form>

    <a  style="color:white"><i class="fa fa-edit" id="img1">Edit Photo</i></a>
       
<div id="showimage" name='showimage' style="visibility:hidden">
  
    
       
</div>


</div>
        
 
       
        <a href="upload_photo">
       <img  id ="pro_pic" src="<?php echo $avtar; ?>"  >
          </a>
            
    	<h1 class="profile-name"><?php echo $loguser; ?></h1>
    	<p class="user-text">sharing awesome ideas with your friends, you can grow, grow fast
               
        
        </p>
        
    </div>
           
    <!-- Timeline content -->
    <div class="container" style="margin-top:2px;">
    	<div class="col-md-10 no-paddin-xs">
            <div class="row">
			<!-- left content-->
			  <div class="profile-nav col-md-4">
				<div class="panel">
				  <ul class="nav nav-pills nav-stacked">
				      <li class="active"><a href="upload_photo"> <i class="fa fa-user"></i> Profile</a></li>
				      <li><a href="about_controller"> <i class="fa fa-info-circle"></i> About</a></li>
				      <li><a href="all_friends_controller"> <i class="fa fa-users"></i> Friends</a></li>
                                      <li><a href="photo_controller"> <i class="fa fa-file-image-o"></i> Photos</a></li>
				      <li><a href="editprofile_controller"> <i class="fa fa-edit"></i> Edit profile</a></li>
				  </ul>
				</div>
				<!-- friends -->
				<div class="panel panel-white panel-friends">
					<div class="panel-heading">
					  <a href="all_friends_controller" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Friends</h3>
					</div>
					<div class="panel-body text-center">
					  <!-- Code for go to clicked friend profile -->
                                              <form id="frm" name="frm" action= "<?php echo base_url();?>search_profile_controller/profile_clicked" method="post" >             
                                                  
                                                  
                                              </form>
                                              <!-- Code for go to clicked friend profile End here -->
                                            
                                            <ul class="friends">

					   
                                              <?php foreach ($loginuser_friend_data as $key => $value): ?>
                                               
                                               <?php for($x = 0; $x < count($value); $x++): ?>  
                                                
                                              <li>
					        <a href="javascript:void(0)">                               
                                                                                              
                                                    <strong>  <img src= "<?php echo($value->avatar); ?>" title="<?php echo $value->user1; ?>" class="img-responsive tip"></strong> 
                                                    
                                                </a>
					    </li>
                                            <?php endfor; ?>
                                            
                                            <?php endforeach;?>
					  </ul>
					</div>
				</div><!-- end friends -->
				<!-- photos -->
                                
                                
				<div class="panel panel-white">
					<div class="panel-heading">
					  <a href="photo_controller" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>
					  <h3 class="panel-title">Photos</h3>
					</div>
					<div class="panel-body text-center">
					  <ul class="photos">
					    <?php $count=1?>
                                            <?php foreach ($photos as $rows):?>  
                                            
                                                    <?php if($count <= 6): ?>
                                                        <li class="gallery-img">
                                                        <a>			                                                          
                                                    <img src="<?php echo $rows->gallery; ?>" alt="" class="img-responsive show-in-modal">
                                                        </a>
                                                    </li>
                                                     <?php else: ?>
                                                    <li class="gallery-img" style="display:none" >
                                                        <a>			                                                          
                                                    <img src="<?php echo $rows->gallery; ?>" style="display:none" alt="" class="img-responsive show-in-modal">
                                                    </a>
                                                    </li>
                                                    
                                                    <?php endif; ?>
                                                    <?php $count++; ?>
					        
					    
					    <?php endforeach; ?>
					  </ul>
					</div>
				</div><!-- end photos-->

				<!-- likes -->
				<div class="panel panel-white panel-likes">
					<div class="panel-heading">
                                          <a href="upload_video_controller" class="pull-right">View all&nbsp;<i class="fa fa-share-square-o"></i></a>  
					  <h3 class="panel-title"><i class="fa fa-film"></i>&nbsp;Video</h3>
					</div>
					<div class="panel-body">
					  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="">
					   				   
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner" role="listbox-likes">
					      <div class="item active">
					        <div class="row">
                                                    <?php foreach ($videos as $row): ?>
                                                    <?php $video_link = $row->gallery; ?>
                                                    <?php $sub_str = substr($video_link, strpos($video_link, "=") + 1); ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-3"><a href="upload_video_controller" class="thumbnail"><img src="http://img.youtube.com/vi/<?php echo $sub_str; ?>/default.jpg" alt=""></a></div>
                                                    <?php endforeach; ?>
					        </div>
					      </div>
					     
					    </div>

					    <!-- Controls -->
					    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					      <span class="sr-only">Next</span>
					    </a>
					  </div>
					</div>
				</div><!-- en likes -->
				<!-- groups -->
				<div class="panel panel-white panel-groups">
					<div class="panel-heading">
					  <h3 class="panel-title">Groups</h3>
					</div>
					<div class="panel-body">
					  <ul class="list-group">
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-5.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Bootdey competitors</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-1.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Git in action</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-6.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Bootdey Snippets</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					    <li class="list-group-item">
					      <div class="col-xs-3 col-sm-6 col-md-3">
					          <img src="img/Likes/likes-2.png" alt="Group" class="img-responsive img-circle" />
					      </div>
					      <div class="col-xs-9 col-sm-6">
					          <span class="name">Html 5 live</span>
					      </div>
					      <div class="clearfix"></div>
					    </li>
					  </ul>
					</div>
				</div><!-- end groups--> 												 			      
			  </div><!-- end left content-->
			  <!-- right  content-->
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
				          <img id="Pullleftimage<?php echo $userdataarray[$key]['msg_id'];?>" src="<?php echo $avtar; ?>" class="avatar" alt="user profile image">
				      </div>
				      <div class="pull-left meta" id="Pullleftmeta<?php echo $userdataarray[$key]['msg_id'];?>">
				          <div class="title h5" id="Titleh5<?php echo $userdataarray[$key]['msg_id'];?>">
				              <a href="#" class="post-user-name" id="Postusername<?php echo $userdataarray[$key]['msg_id'];?>">
                                                  <?php     
                                                                      //       session_start()    ;
                                                    if (session_status() == PHP_SESSION_NONE) 
                                                        {
                                                            session_start();
                                                        }                                                   
                                                    echo $_SESSION['username']; ?>
                                              </a>
				              <?php
                                              if($userdataarray[$key]['imageurl']<>'') {                                                                                                 
                                                 echo "uploaded a photo.";                                                  
                                                    }  else {
                                                 echo "made a post";
                                                }                                              
                                              ?>
                                              <?php /// Delete Post  ?>
                                              <span class="DeletePost" id="DeletePost<?php echo $userdataarray[$key]['msg_id'];?>" style="margin-left:45%;position:absolute"><span class="glyphicon glyphicon-remove" style="color:red" aria-hidden="true"> </span></span>
                                              
                                              
                                              
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
                                      if($imgurl=='undefined')
                                        {
                                          $imgurl='';
                                        }
                                      if ($vidurl<>'')
                                        {
                                      ?>
                                      <object id="video<?php echo $userdataarray[$key]['msg_id'];?>" width="320" height="320" data="http://www.youtube.com/v/Ahg6qcgoay4" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" /></object>
                                      <?php
                                        }else if($imgurl<>'')
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
				          <a class="stat-item" id="like<?php echo $userdataarray[$key]['msg_id'];?>" href="javascript:void()">                                               				              
                                              <?php if($loginuser==$userdataarray[$key]['usernameforlike'])    
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
				          <a class="stat-item" id="share<?php echo $userdataarray[$key]['msg_id'];?>">
				              <i class="fa fa-retweet icon"></i><?php echo $userdataarray[$key]['share_count'] ?>
				          </a>
				          <a class="stat-item" id="comment<?php echo $userdataarray[$key]['msg_id'];?>"> 
                                              <i class="fa fa-comments-o icon"> <b> <?php echo 'Comment' ?> </b> </i>
				          </a>
                                          <!-- claim/nomination button   data-featherlight="#f2"  -->                                             
                                          
                                            <?php if($userdataarray[$key]['Nom_Post_Id']==$userdataarray[$key]['msg_id'])    
                                            { ?>
                                                <a id="Nominate<?php echo $userdataarray[$key]['msg_id']; ?>"  class = "Nominated" >Nominated</a>		
                                            <?php
                                            }
                                            else
                                            {?> 
                                                <a id="Nominate<?php echo $userdataarray[$key]['msg_id']; ?>"  class = "Nomination" >Nominate</a>		
                                            <?php 
                                            }?>
                                              <br> <br>
    				           <b class="stat-item"  id="Boldlikeunlike<?php echo $userdataarray[$key]['msg_id']; ?>">

                                                 <?php if($userdataarray[$key]['like_count']>1) 
                                                     { echo $userdataarray[$key]['like_count'];?> Other Peoples Like this  <?php } 
                                                     elseif($userdataarray[$key]['like_count']==1){ 
                                                     echo $userdataarray[$key]['like_count'];?> Other People Like this  <?php } 
                                                     ?> </b>
                                  </div>       
                                      </div>
                                
                                <div class="post-footer"  id="post-footer<?php echo $userdataarray[$key]['msg_id']; ?>" >
                                    
                                      <div id="commentfooter<?php echo $userdataarray[$key]['msg_id']; ?>" style="visibility: hidden;position:absolute;" >
                                          <div class=" input-group col-sm-11" style="margin-left: 20px">
                                          <input class="form-control add-comment-input" placeholder="Add a comment..." type="text" id="footerpost<?php echo $userdataarray[$key]['msg_id']?>"/>
                                          <span class="input-group-addon">
                                              <a class="commentuploadphoto" id="imageofcomment<?php echo $userdataarray[$key]['msg_id']; ?>"> <i  class="fa fa-camera"></i></a>
                                          
                                          
                                          </span>                                                                                 
                                          </div>
                                                                                
                                         <form  id = "frm<?php echo $userdataarray[$key]['msg_id']; ?>"  enctype="multipart/form-data" method="post" action="postCommentBtnHandler/uploadcommentimage" >
                                              <input type="file" style="visibility:hidden;position:absolute;" class="commentimageclass" name="photoofcomment<?php echo $userdataarray[$key]['msg_id']; ?>" id="photoofcomment<?php echo $userdataarray[$key]['msg_id']; ?>" >
                                              <div id="Commentimage<?php echo $userdataarray[$key]['msg_id'];?>"></div>  
                                              <button id="BtnComment" class="btn btn-success" type="button" style="margin-top:2px;margin-left: 20px">Comment</button>  
                                               
                                         </form> 
                                          
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                 <p></p>
                                      </div>                           
                                                                        
                                    <ul class="comments-list" id="commentslist<?php echo $userdataarray[$key]['msg_id'];?>">
                                 <?php
                                        
                                        //Test
                                            $commentcount=1;                                             
                                            //echo count($commentdataarray);
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
                                        <li   class="comment" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>comment<?php echo $commentdataarray[$key1]['com_id'];?>">
                                                    <a class="pull-left" href="#">
                                                        <?php
                                                        //commentdata phota;
                                                        ?>
                                                        <img class="avatar" src=<?php echo $commentdataarray[$key1]['avatar']; ?> alt="avatar">
                                                    </a>
                                                    <div class="comment-body" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>commentbody<?php echo $commentdataarray[$key1]['com_id'];?>">
                                                        <div class="comment-heading" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>commentheading<?php echo $commentdataarray[$key1]['com_id'];?>">
                                                            <h4 class="comment-user-name"><a href="#">  <?php echo $commentdataarray[$key1]['uid_fk'];?> </a></h4>
                                                            <h5 class="time"><?php  
                                                                               echo $commentdataarray[$key1]['commenttime'];
                                                                               //echo $commenttime;
                                                                               //echo $this->mylibrary->getlatesttime($commenttime) ;
                                                                               
                                                                               
                                                                                  
                                                                               //$CI =& get_instance();
                                                                              
                                                                    ?></h5>
                                                          <span class="DeleteComment" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>DeleteComment<?php echo $commentdataarray[$key1]['com_id'];?>" style="margin-left:50%;position:absolute" ><span class="glyphicon glyphicon-remove" style="color:grey" aria-hidden="true"> </span></span>
                                                        </div>
                                                        <p id="Mst<?php echo $userdataarray[$key]['msg_id'];?>commentdata<?php echo $commentdataarray[$key1]['com_id'];?>"> <span id="commentvalue<?php echo $commentdataarray[$key1]['com_id'];?>"> <?php echo $commentdataarray[$key1]['comment']; ?> </span>
                                                        <input style="display: none;border-width: 0;height:30px;width:380px" class="Editcommentbox" type="text" name="" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>Editcommentbox<?php echo $commentdataarray[$key1]['com_id'];?>" ></p>
                                                    </div>
                                                <a class="Likecomment" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>Likecomment<?php echo $commentdataarray[$key1]['com_id'];?>" style="z-index:9999;margin-left:50px;" >Like</a>
                                                <a class="Editcomment" id="Mst<?php echo $userdataarray[$key]['msg_id'];?>Editcomment<?php echo $commentdataarray[$key1]['com_id'];?>" style="z-index:9999;margin-left:10px;" >Edit</a>
                                                     
                                        </li>
                                <?php
                                    }}
                                    $commentcount=$commentcount+1;
                                    if ($commentcount>=3 and $userdataarray[$key]['comment_count']>=2)
                                    {?>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                        <a  class="Viewmorecomments" id="viewmorecomment<?php echo $userdataarray[$key]['msg_id'];?>" style="z-index:9999;position: absolute;" >View More <?php echo $userdataarray[$key]['comment_count'];?> Comments </a>                                        
                                    <?php break;} 
                                    
                                    }                                     
                                 ?>
                                    
                                      <br>
                                    <br>
                                      </ul>
                                    
                                  
				  </div>
                                
				</div><!-- first post-->                                                                    

		        	<?php
                                       }$count++;}
                                        ?>
                            </div>	      
			  </div><!--end right  content-->
			</div>
    	</div>   
   
    <div class="clear"></div>
     <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
       </script>    
</body>
<div class="Lightbox" id="f1" style="width:864px;height:432px;">
			<h2><u><font color="blue"> NOMINATION</font></u></h2>
                        <h4> NOMINATE THIS POST FOR </h4>                      
                        	<select name="Nomination">
                                    <option value="">Select...</option>
                                    <option value="M">Entertainment</option>
                                    <option value="F">Social Work</option>
                                </select>
                        <div id="postdetail1">
                    </div>                     
        <input type="button" text="Nominate" id="Btnnominate" value="Nominate">
            <div class="alert alert-success" id="successalert" style="visibility: hidden;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Nominated Sucessfully
            </div>
        </div>  
  <div class="Lightbox" id="f2" style="width:200px;height:30px;">			
        <h4> Nominated Sucessfully </h4>                             
  </div>

<div class="Lightbox" id="f3" style="width:200px;height:200px;">			
           People Who Like This Post
           <div id="LikeList"></div>
           </div>
</html>



