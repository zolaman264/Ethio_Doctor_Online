<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/5/15
 * Time: 12:11 AM
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
                    <li><a href="<?php echo base_url("welcome/portfolio"); ?>">Post</a></li>
                    <li><a href="<?php echo base_url("welcome/blog"); ?>">Blog</a></li>
                    <li class="active"><a href="<?php echo base_url("welcome/about"); ?>">About</a></li>
                    <li><a href="<?php echo base_url("welcome/contact"); ?>">Contact</a></li>
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
<!-- start slider -->
<div class="slider_bg">
    <div class="wrap">
        <div class="slider">
            <h2>about us</h2>
            <h3>What we Think, Express us...</h3>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="content">
                <!-- start about -->
                <div class="about">
                    <div class="cont-grid-img img_style">
                        <img src="<?php echo base_url("images/about_pic.jpg"); ?>" alt="">
                    </div>
                    <div class="cont-grid">
                        <h4>Ethio-Online Doctor</h4>
                        <p class="para">Medical Service is one of the critical social services need to be delivered for the public.
                            The lack of medical equipment and shortage of health professionals challenges the delivery of medical service in Ethiopia.
                            Shortage and high turnover of human resource and inadequacy of essential drugs and supplies have also contributed to the burden
                            of medical service provision. Ethio-Doctor Online will focus on creating awareness through the public by giving valuable
                            information for its users. It will facilitate the provision of health service in-terms of giving online medical
                            awareness, medical solutions and recommendation for the registered users. </p>

                    </div>
                    <div class="clear"></div>
                    <div class="about-p">
                        <p class="para"> <u><b>Mission:</b></u> </p>
                        <p class="para"> Our mission — the reason the system developed — is Caring, Teaching and Discovering.</p>
                        <p class="para"> <u><b>Vision:</b></u></p>
                        <p class="para">Our vision — what we want to be — is to be the best provider of online health care services, the best place to discuss on different kinds of medical issues.</p>
                        <p class="para"> <u><b>Values: </b></u></p>
                        <p class="para">Our values statement — is embodied in the acronym PRIDE:</p>
                        <p class="para"> P: for Professionalism</p>
                        <p class="para"> R: for Respect </p>
                        <p class="para"> I: for Integrity </p>
                        <p class="para"> D: for Diversity of ideas</p>
                        <p class="para"> E for Excellence</p>
                    </div>
                </div>
                <!-- end about -->
            </div>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>