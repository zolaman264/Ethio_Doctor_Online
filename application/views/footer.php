<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/20/15
 * Time: 3:56 PM
 */?>
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <div class="span_of_4">
                <div class="span1_of_4">
                    <h4>about us</h4>
                    <p>Ethio Doctor Online is an online bloging website created to solve users health problem...</p>
                    <span>Address</span>
                    <p class="top">Medhanialem Bole str,</p>
                    <p>Addis Ababa,</p>
                    <p>Ethiopia</p>
                    <p>Phone:(00) 222 666 444</p>
                    <p>Fax: (000) 000 00 00 0</p>
                    <div class="f_icons">
                        <ul>
                            <li><a class="icon2" href="#"></a></li>
                            <li><a class="icon1" href="#"></a></li>
                            <li><a class="icon3" href="#"></a></li>
                            <li><a class="icon4" href="#"></a></li>
                            <li><a class="icon5" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span1_of_4">
                    <h4>latest posts</h4>
                    <?php foreach($posts as $row){ ?>
                        <span class="bg" style="min-height: 50px;" >
                            <?php
                                if(strlen($row->pcontent) > 50 ){
                                    echo substr($row->pcontent,0,50)." ...";
                                    echo "<a href='#' style='font-size:13px; line-height: 45px;float:right;'><u>"." See more"."</u></a>";
                                }
                                else if(strlen($row->pcontent) > 0 ){
                                    echo $row->pcontent;
                                    echo "<a href='#' style='font-size:13px; line-height: 45px;float:right;'><u>"." See more"."</u></a>";
                                }
                                else
                                    echo $row->pcontent;

                            ?>
                        </span>
                    <?php } ?>
                </div>
                <div class="span1_of_4">
                    <h4>latest comments</h4>
                    <?php foreach($comment as $row){ ?>
                        <span class="bg" style="min-height: 50px;" >
                            <?php
                            if(strlen($row->com_content) > 60 ){
                                echo substr($row->com_content,0,60)." ...";
                                echo "<a href='#' style='font-size:13px; line-height:45px;float:right;'><u>"." See more"."</u></a>";
                            }
                            else if(strlen($row->com_content) > 0 ){
                                echo $row->com_content;
                                echo "<a href='#' style='font-size:13px; line-height:45px; float:right;'><u>"." See more"."</u></a>";
                            }
                            else
                                echo $row->com_content;

                            ?>
                        </span>
                    <?php } ?>
                </div>
<div class="span1_of_4">
    <h4>flicker photostream</h4>
    <ul class="f_nav">
        <li><a href="#"><img src="<?php echo base_url("images/f_pic1.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic2.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic3.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic4.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic5.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic6.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic7.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic8.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic9.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic10.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic11.jpg"); ?>" alt=""> </a></li>
        <li><a href="#"><img src="<?php echo base_url("images/f_pic12.jpg"); ?>" alt=""> </a></li>
    </ul>
</div>
<div class="clear"></div>
</div>
<div class="footer_top">
    <div class="f_nav1">
        <ul>
            <li><a href="<?php echo base_url("welcome"); ?>">home</a></li>
            <li><a href="<?php echo base_url("welcome/about"); ?>">about</a></li>
            <li><a href="<?php echo base_url("welcome/portfolio"); ?>">post</a></li>
            <li><a href="<?php echo base_url("welcome/blog"); ?>">blog</a></li>
            <li><a href="<?php echo base_url("welcome/contact"); ?>">Contact</a></li>
        </ul>
    </div>
    <div class="copy">
        <p class="link"><span>© All rights reserved | Template by&nbsp;<a href="http://google.com/"> Ethio-Online Doctor</a></span></p>
    </div>
    <div class="clear"></div>
</div>
</div>
</div>
</div>