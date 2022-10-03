<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/4/15
 * Time: 10:48 PM
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
    <link href="<?php echo base_url("css/menu_style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
    <!--  jquery plguin -->
    <script type="text/javascript" src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
    <!-- start gallery -->
    <script type="text/javascript" src="<?php echo base_url("js/jquery.easing.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("js/jquery.mixitup.min.js"); ?>"></script>
    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {

                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                    );

                }

            };

            // Run the show!
            filterList.init();

        });
    </script>
    <!-- Add fancyBox main JS and CSS files -->
    <link href="<?php echo base_url("css/magnific-popup.css"); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url("js/jquery.magnific-popup.js"); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>

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
            <div class="clear"></div>
            <div class="h_right" style="margin-top: 5px;">
                <ul class="menu">
                    <li class="active"><a href="<?php echo base_url("welcome"); ?>"><< home</a></li>
                </ul>
                <script src="<?php echo base_url("js/classie.js"); ?>"></script>
                <script src="<?php echo base_url("js/uisearch.js"); ?>"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>
                <!-- start smart_nav * -->
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="<?php echo base_url("welcome"); ?>">Home</a></li>
                        <li class="nav-item"><a href="<?php echo base_url("welcome/about"); ?>">About</a></li>
                        <li class="nav-item"><a href="<?php echo base_url("welcome/portfolio"); ?>">Post</a></li>
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
<!-- start main -->

<div class="main_bg">
    <div class="wrap">
        <div class="main" style="min-height: 340px;">
            <div style="width: 100%;">
                <div id="left_menu" style="width: 310px;display: flex; margin-right: 50px; float:left;">
                    <?php
                    include_once('menus.php');
                    ?>
                </div>
                <div id="right_content" style="display: flex;width: 700px;">



                    <div class="facts" style="width: 100%;">
                        <span style="color: white; font-weight: lighter;font-style: italic;"> <u>Unchecked Comments:</u></span>
                        <?php foreach($allComents as $row){ ?>
                            <?php echo form_open('Welcome/verifyItems');?>
                            <ul class="tab-left" style="border-bottom: 1px solid white; padding-bottom: 5px;">

                                <div style="width: 65%;">
                                <span class="tab-img"><img src="<?php echo base_url("images/tab_pic5.jpg"); ?>" alt=""/></span>
                                <div class="tab-text">

                                    <?php
                                    if(strlen($row->usubject) > 65 )
                                        echo "<p><a href='#' style='color:white;'>".substr($row->usubject,0,65)."</a></p>";
                                    else if(strlen($row->usubject) > 0 )
                                        echo "<p><a href='#' style='color:white;'>".$row->usubject."</a></p>";
                                    else
                                        echo $row->usubject;?>

                                    <div class="post-meta">
                                        <img src="<?php echo base_url("images/date.png"); ?>" alt=""><a href="#" class="date"><?php echo substr($row->currenttime,0,10);?></a>
                                    </div>
                                    <div style="display: none;">
                                        <input type="text" name="uname" value="<?php echo $row->uname;?>"/>
                                        <input type="text" name="uemail" value="<?php echo $row->uemail;?>"/>
                                        <input type="text" name="uphone" value="<?php echo $row->uphone;?>"/>
                                        <input type="text" name="usubject" value="<?php echo $row->usubject;?>"/>
                                        <input type="text" name="currenttime" value="<?php echo $row->currenttime;?>"/>
                                        <input type="text" name="item" value="comments"/>
                                    </div>

                                </div>

                                </div>
                                <div class="post-meta" style="float: right;width: 34%;">
                                    <input type="submit" name="submitButton" value="Accept" class="customSubmit"/>
                                    <input type="submit" name="submitButton" value="Spam" class="customSubmit"/>
                                </div>
                                <div class="clear"></div>
                            </ul>
                            <?php echo form_close();?>
                        <?php } ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once('admin_footer.php');
?>
</body>
</html>