<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/6/15
 * Time: 4:03 PM
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Ethio-Doc Online</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<!-- start header -->
<div class="header_bg">
    <div class="wrap">
        <div class="header" style="padding-top: 0;">
            <div style="width: 100%; height:50px; margin: 5px 2px;">


                <div class="logo">
                    <h1><a href="<?php echo base_url("welcome"); ?>"><img src="<?php echo base_url("images/logo.png"); ?>" alt="Ethio Online Doctor" class="main_logo"/></a></h1>
                </div>
                <?php
                include_once('store_session.php');
                ?>



            </div>
            <div class="h_right" style="margin-top: 5px;">
                <ul class="menu">
                    <li><a href="<?php echo base_url("welcome"); ?>">home</a></li>
                    <li><a href="<?php echo base_url("welcome/questions"); ?>">Question</a></li>
                    <li class="active"><a href="<?php echo base_url("welcome/portfolio"); ?>">post</a></li>
                    <li><a href="<?php echo base_url("welcome/blog"); ?>">blog</a></li>
                    <li><a href="<?php echo base_url("welcome/about"); ?>">about</a></li>
                    <li><a href="<?php echo base_url("welcome/contact"); ?>">contact</a></li>
                </ul>
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"></span>
                    </form>
                </div>
                <script src="<?php echo base_url("js/classie.js"); ?>"></script>
                <script src="<?php echo base_url("js/uisearch.js"); ?>"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>
                <!-- start smart_nav * -->
                <nav class="nav">
                    <ul class="nav-list">
                        <li><a href="<?php echo base_url("welcome"); ?>">home</a></li>
                        <li><a href="<?php echo base_url("welcome/about"); ?>">about</a></li>
                        <li><a href="<?php echo base_url("welcome/portfolio"); ?>">post</a></li>
                        <li class="nav-item"><a href="<?php echo base_url("welcome/blog"); ?>">Blog</a></li>
                        <li class="nav-item"><a href="<?php echo base_url("welcome/contact"); ?>">Contact</a></li>
                        <div class="clear"></div>
                    </ul>
                </nav>
                <script type="text/javascript" src="<?php echo base_url("js/responsive.menu.js"); ?>"></script>
                <!-- end smart_nav * -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start slider -->
<div class="slider_bg">
    <div class="wrap">
        <div class="slider">
            <h2>Post</h2>
            <h3>What we Think, latest news...</h3>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
<div class="main">
<div class="content">
<!-- start blog_left -->
<div class="blog_left">
    <div style="min-height: 650px;">
    <?php foreach($pa_posts as $vals){ ?>
    <div class="blog_main">
        <img src="<?php echo base_url($vals->pimage); ?>" alt="" style="width: 699px; height: 313px;"/>
        <div class="b_left">
            <h4 class="bg"><img src="<?php echo base_url("images/note.jpg"); ?>" alt=""/></h4>
        </div>
        <div class="b_right">
            <h4><?php echo $vals->ptitle;?></h4>
            <div class="blog_list">
                <ul>
                    <li><a href="#"> <i class="date"> </i><span><?php echo substr($vals->ptime,0,10);?></span></a></li>
                    <li id="postcomment"><a href="#"> <i class="comment"> </i> <span>Comments</span></a></li>
                    <li><a href="#"> <i class="news"> </i><span>Public, News</span></a></li>
                    <li><a href="#"> <i class="views"> </i><span>124 views</span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="blog_art">
                <ul>
                    <li><a href="#"> <i> </i><span><?php echo $vals->plike;?></span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <p><?php echo substr($vals->pcontent,0,550)."...";?></p>
        <a class="btn" href="details.html">read more</a>
        <div style="min-height: 130px;width: 100%;">
            <div id="<?php echo $vals->post_id;?>" class="droplists" style="display: block;">
                <div class="contact_right" style="padding: 5px 5px 5px 5px;width: 100%;">
                    <?php echo form_open('Welcome/takeCommentIn'); ?>
                    <div class="contact-form" >
                        <input name="owner" value="<?php echo 'p'.$vals->post_id;?>" style="visibility: hidden;"/>
                        <input name="blog" value="posts" style="visibility: hidden;"/>
                        <input name="table" value="comments" style="visibility: hidden;"/>
                        <input type="text" placeholder="leave your comment here..." name="QuestionComment" class="textbox" style="margin-left:20px;width: 73%;float:left;"/>
                        <input type="submit" value="submit" name="QuestionCommentSubmit" style="width: 15%;height: 38px;margin: 0px 15px;float: left;"/>
                    </div>
                    <?php echo form_close();?>
                </div>
                <?php
                $com_counter = 0;
                foreach($comments as $vals3){
                    if('p'.$vals->post_id == $vals3->com_owner){
                        echo "<li>".$vals3->com_content."<span style='float:right;'>".substr($vals3->com_time,0,10)."</span>"."</li>";
                        $com_counter++;
                    }
                }if( $com_counter == 0 )
                    echo "<li>"."There is no comment to display"."</li>";
                ?>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>
    <div>
        <ul>
            <!-- Show pagination links -->
            <?php foreach ($links as $link) {
                echo "<li>". $link."</li>";
            } ?>
        </ul>
    </div>

    <div class="blog_main">
        <!-- start slider-text -->
        <div class="our-mission" id="team">
            <div id="ca-container" class="ca-container">
                <div class="ca-wrapper">
                    <div class="ca-item ca-item-1">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">Top 5 Questions...The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                    <div class="ca-item ca-item-2">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                    <div class="ca-item ca-item-3">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                    <div class="ca-item ca-item-4">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                    <div class="ca-item ca-item-5">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                    <div class="ca-item ca-item-6">
                        <div class="ca-item-main">
                            <h4>
                                <span class="quote"></span>
                                <span class="quote_text">The greatness of a nation and its moral progress can be judged by the way in which its animals are treated.</span>
                            </h4>
                            <h5> - Jackie french koller </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- the jScrollPane script -->
            <script type="text/javascript" src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url("js/jquery.easing.min.js"); ?>"></script>
            <!-- the jScrollPane script -->
            <script type="text/javascript" src="<?php echo base_url("js/jquery.mousewheel.js"); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url("js/jquery.contentcarousel.js"); ?>"></script>
            <script type="text/javascript">
                $('#ca-container').contentcarousel();
            </script>
        </div>
        <!-- end slider-text -->
    </div>
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
    </ul>
</div>
<!-- start blog_sidebar -->
<div class="blog_sidebar">
<div class="sidebar">
<!-- start social_network_likes -->
<div class="social_network_likes">
    <ul>
        <li><a href="#" class="tweets"><div class="followers"><p><span>2k</span>Followers</p></div><div class="social_network"><i class="twitter-icon"> </i> </div></a></li>
        <li><a href="#" class="facebook-followers"><div class="followers"><p><span>5k</span>Followers</p></div><div class="social_network"><i class="facebook-icon"> </i> </div></a></li>
        <li><a href="#" class="email"><div class="followers"><p><span>7.5k</span>members</p></div><div class="social_network"><i class="email-icon"> </i></div> </a></li>
        <li><a href="#" class="dribble"><div class="followers"><p><span>10k</span>Followers</p></div><div class="social_network"><i class="dribble-icon"> </i></div></a></li>
        <div class="clear"> </div>
    </ul>
</div>
<!-- start sap_tabs -->
<div class="sap_tabs">
    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
        <ul class="resp-tabs-list">
            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Recent</span></li>
            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Comments</span></li>
            <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Popular</span></li>
            <div class="clear"></div>
        </ul>
        <div class="resp-tabs-container">
            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                <div class="facts">

                            <?php foreach($posts as $row){ ?>
                    <ul class="tab-left">
                        <span class="tab-img"><img src="<?php echo base_url($row->pimage); ?>" alt="<?php echo base_url('images/postimages/defaultimage.png');?>" style="width: 87px;height: 72px;"/></span>
                        <div class="tab-text">
                            <?php
                            if(strlen($row->pcontent) > 20 )
                                echo "<p><a href='#'>".substr($row->pcontent,0,20)."</a></p>";
                            else if(strlen($row->pcontent) > 0 )
                                echo "<p><a href='#'>".$row->pcontent."</a></p>";
                            else
                                echo $row->pcontent;?>

                            <div class="post-meta">
                                <img src="<?php echo base_url("images/date.png"); ?>" alt=""><a href="#" class="date"><?php echo substr($row->ptime,0,10); ?></a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </ul>
                            <?php } ?>

                </div>
            </div>
            <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                <div class="facts">
                    <?php foreach($comment as $row){ ?>
                    <ul class="tab-left">
                        <span class="tab-img"><img src="<?php echo base_url("images/tab_pic5.jpg"); ?>" alt=""/></span>
                        <div class="tab-text">
                            <?php
                            if(strlen($row->com_content) > 20 )
                                echo "<p><a href='#'>".substr($row->com_content,0,20)."</a></p>";
                            else if(strlen($row->com_content) > 0 )
                                echo "<p><a href='#'>".$row->com_content."</a></p>";
                            else
                                echo $row->com_content;?>

                            <div class="post-meta">
                                <img src="<?php echo base_url("images/date.png"); ?>" alt=""><a href="#" class="date"> <?php echo substr($row->com_time,0,10); ?> </a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </ul>
                    <?php } ?>



                </div>
            </div>
            <div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
                <div class="facts">
                    <?php foreach($popular_posts as $row){ ?>
                    <ul class="tab-left">
                        <span class="tab-img"><img src="<?php echo base_url("images/tab_pic3.jpg"); ?>" alt=""/></span>
                        <div class="tab-text"><?php
                            if(strlen($row->pcontent) > 20 )
                                echo "<p><a href='#'>".substr($row->pcontent,0,20)."</a></p>";
                            else if(strlen($row->pcontent) > 0 )
                                echo "<p><a href='#'>".$row->pcontent."</a></p>";
                            else
                                echo $row->pcontent;?>

                            <div class="post-meta">
                                <img src="<?php echo base_url("images/date.png"); ?>" alt=""><a href="#" class="date"> 21 March 2013</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </ul>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("js/easyResponsiveTabs.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<!-- end sap_tabs -->
<!-- start flicker images -->
<h4>ads 125x125</h4>
<ul class="ads_nav">
    <li><a href="#"><img src="<?php echo base_url("images/ads_pic.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/ads_pic.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/ads_pic.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/ads_pic.jpg"); ?>" alt=""> </a></li>
    <div class="clear"></div>
</ul>
<!-- start flicker images -->
<h4>flicker images</h4>
<ul class="flicker_nav">
    <li><a href="#"><img src="<?php echo base_url("images/f_pic1.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic2.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic3.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic4.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic3.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic4.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic5.jpg"); ?>" alt=""> </a></li>
    <li><a href="#"><img src="<?php echo base_url("images/f_pic6.jpg"); ?>" alt=""> </a></li>
    <div class="clear"></div>
</ul>
<!-- start tag_nav -->
<h4>tags</h4>
<ul class="tag_nav">
    <li><a href="#">art</a></li>
    <li><a href="#">awesome</a></li>
    <li><a href="#">classic</a></li>
    <li><a href="#">photo</a></li>
    <li><a href="#">wordpress</a></li>
    <li><a href="#">videos</a></li>
    <li><a href="#">standard</a></li>
    <li><a href="#">gaming</a></li>
    <li><a href="#">photo</a></li>
    <li><a href="#">music</a></li>
    <li><a href="#">data</a></li>
    <div class="clear"></div>
</ul>
<!-- start news_letter -->
<h4>newsletter</h4>
<div class="news_letter">
    <form>
        <input type="text" placeholder="Your email address" />
        <input type="submit" value="subscibe" />

    </form>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>