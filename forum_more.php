<?php include "navbar.html"; ?>
<?php include "../dbconn.php"; ?> 
<!DOCTYPE html>
<html lang="en_US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>STUDENT ROOM</title>
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" href="http://kelaaaaaaaaa.mytalk.io/assets/csssub/common.css?v0.0001" rel="stylesheet" />      

</head>

<body class="main-menu-hide">
<div class="wrapper">
    <div class="container">
        <div class="row main-row">
            <div id="uisearch" class="col col-content">
                <span class="search-title" style="display: none">
                <span class="group-title">Searching results</span>
                </span>
            </div>

            <div class="col col-sidebar hidden-md-down when-search-hide">
            <section class="section">
                <div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                     <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                         <a href="#" itemprop="item"><span itemprop="name">Home</span></a>
                     </span>
                     <span class="back" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                         <a href="forum.php" itemprop="item" class="btn btn-sidebar btn-block">
                            <i class="fa fa-arrow-left"></i>
                                <span itemprop="name">Back to сategory</span>
                         </a>
                     </span>
                     <span class="current"></span>
                </div>
            </section>
            
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4>Other Topics</h4>
                    </div>
                    <div class="list-group">
                         <a href="forum_more.php" class="list-group-item list-topic-item">
                            <p class="message-box with-ava-sm answer">
                                <img src="../forum/2.png" class="ava ava-sm" alt="" title="">Nje teme</p>
                        </a>
                    </div>
                </div>
            </section>
            <section>
                <a href="#shareTopic" class="btn btn-sidebar btn-block" data-toggle="modal" data-target="#shareTopic">
                    <i class="fa fa-share-alt"></i>Share this topic</a>
            </section>
            </div>

           
            
            <div class="col col-content stream when-search-hide">

              <?php

                
              if(isset($_GET['p_id'])){
                
              $the_topic_id = $_GET['p_id'];
                 
             $views_query = "UPDATE topics SET views = views + 1 WHERE topic_id = $the_topic_id ";
             $send_query = mysqli_query($conn, $views_query);
             if(!$send_query){

              die("Failed " . mysqli_error($conn));
             }




             $query = "SELECT * FROM topics WHERE topic_id = $the_topic_id ";

             $select_topic = mysqli_query($conn, $query);

             if(!$select_topic){

             die("Failed" . mysqli_error($conn));

             }


             while($row = mysqli_fetch_assoc($select_topic)){

                  $topic_id = $row['topic_id'];
                  $topic_author = $row['author'];
                  $topic_title = $row['title'];
                  $topic_category_id = $row['category_id'];
                  $topic_status = $row['topic_status'];
                  $topic_image = $row['topic_image'];
                  $topic_content = $row ['content'];
                  $topic_tags = $row['tag'];
                  $topic_date = $row['date_posted'];
                  // $topic_comment_count = $row['topic_comment_count'];
                  $topic_view = $row['views'];
                     ?>
              




            <section class="section section-posts-item">
                    <div class="card card-post-item">
                        <div id="post_id10017" class="post">
                            <div class="post-title">
                                <a href="/profile?id=13322">
                                    <img src="../forum/2.png" class="ava ava-md" alt="" title=""></a>
                                        <h1><?php echo $topic_title; ?></h1>
                                            <div class="post-info">
                                                <a href="/profile?id=13322" class="nickname"><?php echo $topic_author ?></a>
                                                <span class="post-info-item date"><?php echo $topic_date ?></span>
                                                    <div class="dropdown dropdown-more">
                                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                    <div class="dropdown-menu with-icons dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#shareTopic" data-toggle="modal" data-target="#shareTopic">
                                                    <i class="fa fa-share-alt"></i>Share</a>
                                                    <a class="dropdown-item editbut" onclick="editpost($(this)); return false;" alt="10017" href="#">
                                                    <i class="fa fa-edit"></i>Edit</a>
                                                    <a class="dropdown-item deletepost" alt="10017" href="#">
                                                    <i class="fa fa-trash-o"></i>Delete</a>
                                                    </div>
                                                    </div>
                                            </div>
                            </div>
                  
                            <div class="post-body text_10017">

                                    <p class=""><?php echo $topic_content; ?></p>

                            </div>
                   
                            <div class="post-info post-main-info">
                                <span class="post-info-item answer-count">
                                    <i class="fa fa-comment-o"></i>1 answers </span>
                                <span class="post-info-item view-count">
                                    <i class="fa fa-eye"></i><?php echo $topic_view . "views" ?></span>
                            </div>
                    </div>
                </div>
       
                </section>

              





                 <?php  }  } ?> 








<?php

if(isset($_POST['create_reply'])){

$the_topic_id = $_GET['p_id'];
$reply_author = $_POST['author'];
$reply_content = $_POST['comment'];


if(!empty($reply_author) && !empty($reply_content)){

$query = "INSERT INTO replies (topic_id, author, comment, reply_status, date_posted) ";
$query .= "VALUES({$the_topic_id}, '{$reply_author}', '{$reply_content}', 'unapproved', now()) ";
$send_comment_query = mysqli_query($conn, $query);
if(!$send_comment_query){
  die("Failed" . mysqli_error($conn));
}



}


else if(empty($reply_author && empty($reply_content))) {
    echo "<script> alert('Fields cannot be empty')</script>";

}






}






?>

















                <section class="section section-answers-list" id="mainres">

           <?php
                $query = "SELECT * FROM replies WHERE topic_id = {$the_topic_id} ";
                $query .= "AND reply_status = 'approved' ";
                $query .= "ORDER BY reply_id DESC ";
                
                $select_comment_query = mysqli_query($conn, $query);
                if(!$select_comment_query){
                    
                    die('FAILED'.mysqli_error($conn));
                    
                }
                while($row = mysqli_fetch_assoc($select_comment_query)){

                    
                    $reply_date = $row['date_posted'];
                    $reply_content = $row['comment'];
                    $reply_author = $row['author'];
                
                ?>
                




                    <ul class="nav nav-tabs for-card" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" role="tab" aria-expanded="true">answer</a>
                        </li>
                    </ul>
                    
                    <div class="animation_image" style="display:none;" align="center">
                        <img style="margin: 20px;" src="ajax-loader.gif">
                    </div>
                    
                    <div class="theme-posts" id="resul">
                    
                    </div>
                    
                     <div class="card card-answer-item" id="com_3520">

                      
                       <div class="message-box with-ava-md">
                            <a href="/profile?id=13322">
                                <img src="../forum/2.png" class="ava ava-md" alt="" title="">
                            </a>
                            <div class="post-info post-info-header">
                                <a href="/profile?id=13322" class="nickname"><?php echo $reply_author?></a>
                                <span class="post-info-item date"><?php echo $reply_date ?></span>
                                    <div class="dropdown dropdown-more">
                                        <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                    <div class="dropdown-menu with-icons dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item editbut" alt="3520" onclick="editcom($(this)); return false;" href="#">
                                            <i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item delcom" alt="3520" onclick="delcom($(this)); return false;" href="#">
                                            <i class="fa fa-trash-o"></i>Delete</a>
                                    </div>
                                </div>
                            </div>


                            <p class="text_3520"> <?php echo $reply_content ?> </p>

                        </div>

                        <!-- <?php  //  } ?> -->
                    </div>
                  <?php } ?>
                    
                </section>






          

                <section class="section">
                  <div class="card">
                        <div class="create-answer-box">
            

                           <form id="postForm" method="post" action="" enctype="multipart/form-data">


                           <div class="form-group">
                            <input type="text" class="form-control" name="author" placeholder="Author">
                        </div>



                            <div class="create-answer-content create-answer-md">
                                <textarea name="comment" class="form-control autosize" id="addMessage" data-autoresize="" placeholder="Message" minlength="2"></textarea>
                            </div>
                            <div class="create-answer-actions">
                                <ul class="nav">
                                    <li class="nav-item">
                                            <a class="nav-link file-upload">
                                                <span>
                                                    <i class="fa fa-paperclip"></i>
                                                </span>
                                                <input name="files[]" id="imagePost" type="file" multiple="">
                                            </a>
                                        </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-smile-o"></i></a>
                              </li>
                                </ul>
                                <div id="filecount5" class="pull-left file-count">
                                </div>
                                <div class="create-answer-btn">
                                    <input type="hidden" name="ids" value="10017">
                                    <input type="hidden" name="uids" value="13322">
                                    <button type = "submit" name = "create_reply" class="btn btn-primary" >Send</button>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </section>






























           </div>  
        </div>
    </div>   
<footer class="site-footer" role="contentinfo">
      <div class="container">
        <p class="text-center" style="color: #ccc;">Students' Union &copy; 2019</p>
      </div>
</footer>

    </div>
</body>
</html>

