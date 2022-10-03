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
            <div style="width: 100%; height:150px;">
                <div class="logo">
                    <h1><a href="<?php echo base_url("welcome"); ?>"><img src="<?php echo base_url("images/logo.png"); ?>" alt="Ethio Online Doctor" class="main_logo"/></a></h1>
                </div>
                <div class="contact_right" style="padding: 5px;width: auto; float: right;">
                    <div class="contact-form" >
                        <?php echo form_open('welcome/login'); ?>
                            <table style="padding: 5px;margin-right: 20px;">
                                <tr>
                                    <td><h3>sign in</h3></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><label>Username</label></span>
                                        <span><input required="required" name="Username" type="text" class="textbox" style="width: 200px; padding: 5px;"></span>
                                    </td>
                                    <td colspan="2">
                                        <span><label style="margin-left: 5px;">Password</label></span>
                                        <span><input required="required" name="Password" type="password" class="textbox" style="width: 200px; padding: 5px;margin-left: 5px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span><label><a href="<?php echo base_url("welcome/register"); ?>">Create New Account</a></label></span></td>
                                    <td style="width: 140px;">
                                        <span style="margin:0px; padding:0px; color: red;font-style: italic;font-size:x-small;"><?php echo validation_errors();?></span>
                                    </td>
                                    <td style="width: 70px;">
                                        <span><input name="loginButton" type="submit" value="Login" style="width: 70px; padding: 5px;margin-top: 8px"></span>
                                    </td>
                                </tr>
                            </table>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="h_right">
                <ul class="menu">
                    <li class="active"><a href="<?php echo base_url("welcome"); ?>">home</a></li>
                    <li><a href="<?php echo base_url("welcome/about"); ?>">about</a></li>
                    <li><a href="<?php echo base_url("welcome/portfolio"); ?>">post</a></li>
                    <li><a href="<?php echo base_url("welcome/blog"); ?>">blog</a></li>
                    <li><a href="<?php echo base_url("welcome/contact"); ?>">contact</a></li>
                </ul>
                <div id="sb-search" class="sb-search">
                    <form method="post" action="welcome/Main_search">
                        <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search" >
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
        <div class="main" style="min-height: 500px;">
            <!-- start gallery  -->
            <div class="container">
                <ul id="filters" class="clearfix">
                    <li><span class="filter active" data-filter="Cancer Sexual Malaria Food Fitness">All</span></li> /
                    <li><span class="filter" data-filter="Cancer">Cancer</span></li> /
                    <li><span class="filter" data-filter="Sexual">Sexual</span></li> /
                    <li><span class="filter" data-filter="Malaria">Malaria</span></li> /
                    <li><span class="filter" data-filter="Food">Food</span></li> /
                    <li><span class="filter" data-filter="Fitness">Fitness</span></li> /
                    <li><span class="filter" data-filter="Others">Others</span></li>
                </ul>
                <div id="portfoliolist">
                    <?php foreach($index_posts as $val){ ?>
                        <!-- start popup -->
                            <div id="<?php echo $val->post_id; ?>"  class="mfp-hide small-dialog">
                                <div class="pop_up">
                                    <h2><?php echo $val->ptitle; ?></h2>
                                    <img src="<?php echo $val->pimage; ?>" title="image-name">
                                    <p><?php echo $val->pcontent; ?></p>
                                    <a class="btn" href="details.html">Read more</a>
                                </div>
                            </div>
                        <!-- end popup -->
                        <a class="popup-with-zoom-anim" href="#<?php echo $val->post_id; ?>">
                            <div class="portfolio <?php echo $val->pcatagory; ?>" data-cat="<?php echo $val->pcatagory; ?>">
                                <div class="portfolio-wrapper">
                                    <img src="<?php echo $val->pimage; ?>"  alt="image" style="color: #ffffff; height: 180px;width: 270px;" />
                                    <div class="label">
                                        <div class="label-text">
                                            <p class="text-title"><?php echo $val->ptitle; ?></p>
                                            <span class="text-category"><?php echo $val->pcatagory; ?></span>
                                        </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div><!-- end container -->
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>