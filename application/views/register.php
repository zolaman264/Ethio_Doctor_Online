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
<div class="header_bg">
    <div class="wrap">
        <div class="header" style="padding: 1% 4%;">
            <div class="logo">
                <h1><a href="<?php echo base_url("welcome"); ?>"><img src="<?php echo base_url("images/logo.png"); ?>" alt="Ethio Online Doctor" class="main_logo" style="height: 80px;"/></a></h1>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
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
                            <input name="usertype" value="user" style="visibility: hidden;">
                                <div>
                                    <span><label>First Name</label></span>
                                    <span><input name="fName" type="text" class="textbox" required="required"></span>
                                </div>
                                <div>
                                    <span><label>Middle Name</label></span>
                                    <span><input name="lName" type="text" class="textbox" required="required"></span>
                                </div>
                                <div>
                                    <span><label>Last Name</label></span>
                                    <span><input name="mName" type="text" class="textbox" required="required"></span>
                                </div>
                                <div class="clear"></div>
                                <div style="width: 100%; padding: 1%;">
                                    <div style="width: 49%;float: right;">
                                        <span><label>Age</label></span>
                                        <select name="age" style="width: 80%;" required="required">
                                            <option value="">Select...</option>
                                            <?php $values = 18;
                                            for( ;$values<130;$values++ ){ ?>
                                                <option value="<?php echo $values;?>"><?php echo $values;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="width: 49%;">
                                    <span><label>Gender</label></span>
                                    <select name="gender" style="width: 80%;" required="required">
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
