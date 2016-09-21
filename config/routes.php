<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'signup';
$route['login_control/(:any)'] = 'login_control';
$route['upload_photo/(:any)'] = 'upload_photo';
$route['upload_photo/uploadpostphoto'] = 'upload_photo/uploadpostphoto';
$route['upload_photo/loadprofile'] = 'upload_photo/loadprofile';
$route['search_profile_controller/(:any)'] =   'search_profile_controller';
$route['search_profile_controller/profile_clicked'] = 'search_profile_controller/profile_clicked';
$route['editprofile_controller'] = 'editprofile_controller' ;
$route['editprofile_controller/update_profile'] = 'editprofile_controller/update_profile' ;
$route['editprofile_controller/change_password'] = 'editprofile_controller/change_password' ;
$route['friendreq_controller']= 'friendreq_controller';
$route['friendreq_controller/friend_action'] = 'friendreq_controller/friend_action';
$route['friendreq_controller/cancel_friend_request'] = 'friendreq_controller/cancel_friend_request';
$route['all_friends_controller/user_all_friends']= 'all_friends_controller/user_all_friends';
$route['unfriend_controller/do_unfriend']='unfriend_controller/do_unfriend';
$route['photo_controller/create_album']='photo_controller/create_album';
$route['photo_controller/display_album']= 'photo_controller/display_album';
$route['upload_video_controller/share_video']= 'upload_video_controller/share_video';
$route['upload_video_controller/process_video']= 'upload_video_controller/process_video';
$route['upload_video_controller/load_album']= 'upload_video_controller/load_album';
$route['upload_video_controller/save_videolink']= 'upload_video_controller/save_videolink';
$route['upload_video_controller/show_existing_album_name']= 'upload_video_controller/show_existing_album_name';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */