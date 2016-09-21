[33mcommit 2061c34e9f88c6738692782f4b37960bb63daa17[m
Author: saiyed9974 <saiyed9974@gmail.com>
Date:   Mon Sep 12 14:28:13 2016 +0530

    commit views

 views/LatestContentView.php        | 1369 [32m++++++++++++++++++++++++++++++++++++[m
 views/NewComment.php               |   21 [32m+[m
 views/NewPost.php                  |   81 [32m+++[m
 views/Nominationtest.php           |  131 [32m++++[m
 views/about_view.php               |  148 [32m++++[m
 views/all_friends_view.php         |  200 [32m++++++[m
 views/all_photo_view.php           |  169 [32m+++++[m
 views/all_video_view.php           |  172 [32m+++++[m
 views/content_view.php             |  Bin [31m0[m -> [32m59388[m bytes
 views/create_album_view.php        |  119 [32m++++[m
 views/display_album_view.php       |   99 [32m+++[m
 views/display_video_album_view.php |  103 [32m+++[m
 views/editprofile_view.php         |  331 [32m+++++++++[m
 views/footer_view.php              |   46 [32m++[m
 views/header_view.php              |  221 [32m++++++[m
 views/home.php                     |  491 [32m+++++++++++++[m
 views/home_content_view.php        |  623 [32m++++++++++++++++[m
 views/home_sub_header_view.php     |   34 [32m+[m
 views/index.html                   |   10 [32m+[m
 views/newEmptyPHP.php              |    7 [32m+[m
 views/notification_view.php        |  813 [32m+++++++++++++++++++++[m
 views/photo.php                    |   24 [32m+[m
 views/profile_view.php             |  804 [32m+++++++++++++++++++++[m
 views/search_profile_view.php      |  661 [32m+++++++++++++++++[m
 views/signup_view.php              |  430 [32m+++++++++++[m
 views/signup_view1.php             |  437 [32m++++++++++++[m
 views/temp.php                     |  950 [32m+++++++++++++++++++++++++[m
 views/temp1.php                    | 1082 [32m++++++++++++++++++++++++++++[m
 views/template_country_list.php    |   58 [32m++[m
 views/testing.php                  |   70 [32m++[m
 views/upload_videolink_view.php    |  216 [32m++++++[m
 views/user_about_view.php          |  161 [32m+++++[m
 views/user_all_friends_view.php    |  382 [32m++++++++++[m
 views/user_all_photo_view.php      |  166 [32m+++++[m
 views/user_all_video_view.php      |  173 [32m+++++[m
 views/user_profile_view.php        |  611 [32m++++++++++++++++[m
 views/welcome_message.php          |   88 [32m+++[m
 37 files changed, 11501 insertions(+)

[33mcommit ff406fca95cf220b256f35ec96d70e5bb5ec0905[m
Author: saiyed9974 <saiyed9974@gmail.com>
Date:   Mon Sep 12 14:27:41 2016 +0530

    commit controllers

 controllers/about_controller.php          |  62 [32m++++[m
 controllers/all_friends_controller.php    |  55 [32m++++[m
 controllers/editprofile_controller.php    |  69 [32m++++[m
 controllers/friendreq_controller.php      |  45 [32m+++[m
 controllers/index.html                    |  10 [32m+[m
 controllers/login_control.php             |  43 [32m+++[m
 controllers/photo_controller.php          | 151 [32m+++++++++[m
 controllers/postCommentBtnHandler.php     | 520 [32m++++++++++++++++++++++++++++++[m
 controllers/search_profile_controller.php |  95 [32m++++++[m
 controllers/signup.php                    |  53 [32m+++[m
 controllers/test.php                      | 142 [32m++++++++[m
 controllers/unfriend_controller.php       |  27 [32m++[m
 controllers/upload_photo.php              | 178 [32m++++++++++[m
 controllers/upload_video_controller.php   | 180 [32m+++++++++++[m
 controllers/welcome.php                   |  34 [32m++[m
 15 files changed, 1664 insertions(+)

[33mcommit d590f6e5eb489ebb132196c33442b4e082805aa0[m
Author: saiyed9974 <saiyed9974@gmail.com>
Date:   Mon Sep 12 14:26:58 2016 +0530

    commit models

 models/InsertPostData.php             |  25 [32m+++[m
 models/Wallmodel.php                  | 153 [32m+++++++++++++++++[m
 models/about_model.php                |  18 [32m++[m
 models/display_photo_model.php        |  67 [32m++++++++[m
 models/display_profile_model.php      |  57 [32m+++++++[m
 models/display_video_model.php        |  62 [32m+++++++[m
 models/editprofile_model.php          |  38 [32m+++++[m
 models/friendreq_model.php            | 308 [32m++++++++++++++++++++++++++++++++++[m
 models/index.html                     |  10 [32m++[m
 models/login_model.php                |  33 [32m++++[m
 models/notification_manager_model.php |  25 [32m+++[m
 models/search_profile_model.php       |  31 [32m++++[m
 models/signupdata.php                 | 152 [32m+++++++++++++++++[m
 models/unfriend_model.php             |  26 [32m+++[m
 models/upload_model.php               |  66 [32m++++++++[m
 models/user_model.php                 | 170 [32m+++++++++++++++++++[m
 16 files changed, 1241 insertions(+)

[33mcommit 754cfca7f74bc2132ed77d22bd063aff69857966[m
Author: saiyed9974 <saiyed9974@gmail.com>
Date:   Mon Sep 12 14:25:54 2016 +0530

    Adding Assets

 assets/css/animate.min.css                         |    6 [32m+[m
 assets/css/timeline.css                            | 1512 [32m++++++++++++++++++++[m
 assets/featherlight/release/.jshintrc              |   15 [32m+[m
 .../featherlight/release/featherbootstrap.min.css  |    9 [32m+[m
 assets/featherlight/release/featherlight.css       |  127 [32m++[m
 .../featherlight/release/featherlight.gallery.css  |  111 [32m++[m
 .../featherlight/release/featherlight.gallery.js   |  163 [32m+++[m
 .../release/featherlight.gallery.min.css           |    8 [32m+[m
 .../release/featherlight.gallery.min.js            |    7 [32m+[m
 assets/featherlight/release/featherlight.js        |  557 [32m+++++++[m
 assets/featherlight/release/featherlight.min.css   |    8 [32m+[m
 assets/featherlight/release/featherlight.min.js    |    8 [32m+[m
 assets/featherlight/release/gallery.html           |  233 [32m+++[m
 assets/featherlight/release/index.html             |  178 [32m+++[m
 assets/featherlight/src/.jshintrc                  |   15 [32m+[m
 assets/featherlight/src/featherlight.css           |  127 [32m++[m
 assets/featherlight/src/featherlight.gallery.css   |  111 [32m++[m
 assets/featherlight/src/featherlight.gallery.js    |  163 [32m+++[m
 assets/featherlight/src/featherlight.js            |  557 [32m+++++++[m
 assets/featherlight/src/gallery.html               |  233 [32m+++[m
 assets/featherlight/src/index.html                 |  178 [32m+++[m
 assets/featherlight/stylesheets/bootstrap.min.css  |    9 [32m+[m
 assets/js/custom.js                                |   26 [32m+[m
 assets/js/html5shiv.min.js                         |    4 [32m+[m
 assets/js/jquery.1.11.1.min.js                     |    4 [32m+[m
 assets/js/jquery.scrollstop.min.js                 |    1 [32m+[m
 assets/js/respond.min.js                           |    5 [32m+[m
 27 files changed, 4375 insertions(+)
