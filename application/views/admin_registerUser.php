<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/12/15
 * Time: 1:26 PM
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
        <div class="main" style="padding-top: 10px;">
            <div class="content" style="margin-top: 10px; padding-top: 10px;">
                <!-- start contact -->
                <div class="contact">
                    <div class="contact_right">
                        <div class="contact-form">
                            <h3>Register</h3>
                            <?php echo form_open('Welcome/doRegister'); ?>
                            <div>
                                <span><label>First Name</label></span>
                                <span><input name="fName" type="text" class="textbox" required="required"></span>
                            </div>
                            <div>
                                <span><label>Middle Name</label></span>
                                <span><input name="mName" type="text" class="textbox" required="required"></span>
                            </div>
                            <div>
                                <span><label>Last Name</label></span>
                                <span><input name="lName" type="text" class="textbox" required="required"></span>
                            </div>
                            <div class="clear"></div>
                            <div style="width: 100%; padding: 1%;">
                                <div style="width: 33%;float: right;">
                                    <span><label>User Type</label></span>
                                    <select name="usertype" style="width: 85%;" required="required">
                                        <option value="">Select...</option>
                                        <option value="user">user</option>
                                        <option value="admin">admin</option>
                                        <option value="pro">professional</option>
                                    </select>
                                </div>
                                <div style="width: 33%;float: right;">
                                    <span><label>Age</label></span>
                                    <select name="age" style="width: 85%;" required="required">
                                        <option value="">Select...</option>
                                        <?php $values = 18;
                                            for( ;$values<130;$values++ ){ ?>
                                              <option value="<?php echo $values;?>"><?php echo $values;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div style="width: 33%;">
                                    <span><label>Gender</label></span>
                                    <select name="gender" style="width: 85%;" required="required">
                                        <option value="">Select...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
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
                                <span><label>Username</label></span>
                                <span><input name="userName" type="text" class="textbox" required="required"></span>
                            </div>
                            <div>
                                <span><label>Password</label></span>
                                <span><input name="passwd" type="password" class="textbox" required="required"></span>
                            </div>
                            <div>
                                <span><label>Confirm Password</label></span>
                                <span><input name="cPasswd" type="password" class="textbox" required="required"></span>
                            </div>
                            <div>
                                <span><input type="submit" value="Register"></span>
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
include_once('admin_footer.php');
?>
</body>
</html>