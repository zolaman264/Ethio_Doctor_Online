<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/11/15
 * Time: 4:12 PM
 */
if($this->session->userdata('validated')){ ?>
    <div id="logout">
        <?php echo form_open('Welcome/doLogout'); ?>
        <div class="contact_right" style="padding: 5px;width: auto; float: right;">
            <div class="contact-form" >
                <input name="logoutButton" id="logoutbutton" type="submit" value="Logout" style="float: right; width: 70px; padding: 5px;margin-top: 8px">
                <span style="float: right; font-size: large; margin-right: 10px; margin-top: 8px;"><?php echo $this->session->userdata('username'); ?></span>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
<?php } else{
    redirect('Welcome');
}?>