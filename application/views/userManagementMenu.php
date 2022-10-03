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
            <li><a href="<?php echo base_url("welcome/adminUseeAdd")?>" >Add New Account</a></li>
            <li ><a href="<?php echo base_url("welcome/searchUser/dlt"); ?>" id="searchmenu">Delete Account</a></li>
            <li ><a href="<?php echo base_url("welcome/searchUser/spm")?>" id="dospamuser">Spam User</a></li>
            <li ><a href="<?php echo base_url("welcome/spammedUser")?>" id="spameduser">Spammed User</li>
        </ul>
    </div> <!-- end of menu -->
<?php } ?>
</html>