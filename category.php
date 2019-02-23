<?php include "navbar.html"; ?>
<?php include "../dbconn.php"; ?>
<!DOCTYPE html>
<html lang="en_US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>STUDENT ROOM</title>
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css" href="http://kelaaaaaaaaa.mytalk.io/assets/icons/style.css?v0.0001" rel="stylesheet">
    <link type="text/css" href="http://kelaaaaaaaaa.mytalk.io/assets/csssub/common.css?v0.0001" rel="stylesheet" />           	

  
</head>

<body class="main-menu-hide">

    <div class="wrapper">
        <div class="container">
            <div class="row main-row">
                <div class="col col-content col-forum-view">
                    <div id="uisearch">
                    <span class="search-title" style="display: none">
                        <span class="group-title">Searching results</span></span>
                    </div>
                    
                    <section class="section section-posts-list when-search-hide">
                        <ul class="nav nav-tabs for-card" role="tablist">
                            <li class="nav-item"><a class="nav-link" href="forum.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#" role="tab" aria-expanded="true">Categories</a></li>
                        </ul>
                        
                        <div class="list-group forum-classic">

                         <?php


                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($conn, $query);
                             while($row = mysqli_fetch_assoc($select_categories)){
                              $category_title = $row['category_title'];
                              ?>







                            <div class="list-group-item list-group-table-header hidden-md-down list-group-item-space">
                                <div class="row row-padding-2">
                                    <div class="col-6">Categories</div>
                                    <div class="col-3">users</div>          
                                    <div class="col-1 text-center">topics</div>
                                    <div class="col-1 text-center">posts</div>
                                </div>
                            </div>
                            <a href="main_category.php" class="list-group-item list-group-item-space hide-forum-info hide-forum-info">
                                <span style="background-color: #2A9AB0;" class="cat-bg-line"></span>
                                <div class="row align-items-center row-padding-2">
                                    <div class="col-lg-6 col-md-12">
                                          





                                        <div class="message-box with-ava-md answer">
                                            <div class="ava ava-md ava-with-icon" style="background-color: #2A9AB0 !important;"><i class="fa fa-lock"></i></div>
                                    <h3><p class="post-cat-desc"><?php echo $category_title; ?></p></h3>

                                        

                                           


                                              
                                                       

                                        </div>
                                         
                                    </div>
                                    <div class="col-3 text-left hidden-md-down"></div>
                                  
                                    <div class="col-1 text-center hidden-md-down">
                                        <div class="stat-box">
                                            <span class="stat-sum">0</span>
                                        </div>
                                    </div>

                                    <div class="col-1 text-center hidden-md-down">
                                        <div class="stat-box">
                                            <span class="stat-sum">0</span>
                                        </div>

                                    </div>

                      
                                </div>

                            </a>


<!--
                            <a href="/feed/6754" class="list-group-item list-group-item-space hide-forum-info ">
                                <span style="background-color: #506422;" class="cat-bg-line"></span>
                                <div class="row align-items-center row-padding-2">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="message-box with-ava-md answer">
                                            <div class="ava ava-md ava-with-icon" style="background-color: #506422 !important;">
                                                <i class="icon-bubbles"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-left hidden-md-down">
                                        <img src="2.png" class="ava ava-xsm ava-community" alt="kela" title="kela">
                                    </div>
                                <div class="col-1 text-center hidden-md-down">
                                    <div class="stat-box">
                                        <span class="stat-sum">1</span>
                                    </div>
                                </div>
                                <div class="col-1 text-center hidden-md-down">
                                    <div class="stat-box">
                                        <span class="stat-sum">1</span>
                                    </div>
                                </div>
                                <div class="list-group-action">
                                <div class="dropdown dropdown-more">
                                    <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-more"></i>
                                    </span>
                                    <div class="dropdown-menu with-icons dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <span class="dropdown-item openfeed" onclick="postfeed($(this)); return false;" alt="6754" attr="1">
                                            <i class="icon-lock"></i> Close creating topics</span>
                                        <span class="dropdown-item openfeed" onclick="commfeed($(this)); return false;" alt="6754" attr="1">
                                            <i class="icon-lock"></i> Close comments</span>
                                        <span class="dropdown-item accessfeed" onclick="accessfeed($(this)); return false;" alt="6754" attr="1">
                                            <i class="icon-eye"></i>Access to category</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
-->               <?php }  ?>
                </div>
             </section>
        </div>
    </div>
</div>
        	

<footer class="site-footer" role="contentinfo">
    <div class="container">
      	      		<p class="text-center" style="color: #ccc;">Students' Union &copy; 2019</p></div>
</footer>

</div>


</body>
</html>
