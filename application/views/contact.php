<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/6/15
 * Time: 4:59 PM
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
                if($this->session->userdata('validated')){
                include_once('store_session.php');
                }else{
                    //redirect('welcome/contact');
                }
                ?>

            </div>
            <div class="h_right" style="margin-top: 5px;">
                <ul class="menu">
                    <li><a href="<?php echo base_url("welcome"); ?>">home</a></li>
                    <li><a href="<?php echo base_url("welcome/questions"); ?>">Question</a></li>
                    <li><a href="<?php echo base_url("welcome/portfolio"); ?>">post</a></li>
                    <li><a href="<?php echo base_url("welcome/blog"); ?>">blog</a></li>
                    <li><a href="<?php echo base_url("welcome/about"); ?>">about</a></li>
                    <li class="active"><a href="<?php echo base_url("welcome/contact"); ?>">contact</a></li>
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
            <h2>contact</h2>
            <h3>What we Think, get in touch...</h3>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="content">
                <!-- start contact -->
                <div class="contact">
                    <div class="contact_left">
                        <div class="contact_info">
                            <h3>Find Us Here</h3>
                            <div class="map">
                                <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="font-family: 'Open Sans', sans-serif;color:#555555;text-shadow:0 1px 0 #ffffff; text-align:left;font-size:12px;padding: 5px;">View Larger Map</a></small>
                            </div>
                        </div>
                        <div class="company_address">
                            <h3>Company Information :</h3>
                            <p>Ethio-Doctor Online</p>
                            <p>Medhanialem Bole</p>
                            <p>Ethiopia</p>
                            <p>Phone:+251 910 72 3360</p>
                            <p>Fax: (000) 000 00 00 0</p>
                            <p>Email: <a href="mailto:info@mycompany.com"> ermy143@yahoo.com</a></p>
                            <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
                        </div>
                    </div>
                    <div class="contact_right">
                        <div class="contact-form">
                            <h3>Contact Us</h3>
                            <?php echo form_open('Welcome/takeComment'); ?>
                                <div>
                                    <span><label>name</label></span>
                                    <span><input name="userName" type="text" class="textbox" required="required"></span>
                                </div>
                                <div>
                                    <span><label>e-mail</label></span>
                                    <span><input name="userEmail" type="email" class="textbox" required="required"></span>
                                </div>
                                <div>
                                    <span><label>mobile</label></span>
                                    <span><input name="userPhone" type="text" class="textbox" required="required"></span>
                                </div>
                                <div>
                                    <span><label>subject</label></span>
                                    <span><textarea name="userMsg" required="required"> </textarea></span>
                                </div>
                                <div>
                                    <span><input type="submit" value="submit us"></span>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- end contact -->
            </div>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>