<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/21/15
 * Time: 11:26 AM
 */ ?>
<!DOCTYPE html>
<html lang="en">

<?php
if($this->session->userdata('user_type') == "admin"){
    ?>
    <div id="templatemo_menu">
        <ul>
            <li><a href="<?php echo base_url("welcome")?>" >Home</a></li>
            <li ><a href="<?php echo base_url("welcome/adminUserManagment")?>" id="searchmenu">User Management</a></li>
            <li ><a href="<?php echo base_url("welcome/admin_post")?>" id="searchmenu">Post</a></li>
            <li ><a href="<?php echo base_url("welcome/displayNewQuestion")?>" id="searchmenu">Question
                <span style="color: red;"><?php
                    if($this->session->userdata('numNewQuestion') != 0)
                        echo "(".$this->session->userdata('numNewQuestion').")"; ?></span></a>
            </li>
            <li ><a href="<?php echo base_url("welcome/uncheckedComments")?>" id="newComment">Comment
                <span style="color: red;"><?php
                    if($this->session->userdata('numNewComment') != 0)
                        echo "(".$this->session->userdata('numNewComment').")"; ?></span></a>
            </li>
        </ul>
    </div> <!-- end of menu -->
<?php } ?>
</html>