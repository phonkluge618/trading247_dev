<?php
global $post;	
if(empty($post))
		$meta = null;
else
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
if(!empty($meta['page_type']) && in_array($meta['page_type'], array(2,3,4,5,6) )):
	?>
    <div class="navigationContainer">
	<h3 class="title"><?php _e('My Account','spot');?></h3>
	<?php
            wp_nav_menu( array( 'theme_location' => 'myaccount-menu', 'menu_class' => 'side-myaccount-menu'  ) );
        ?>
    </div>
    <div class="clear"></div>
    <a href="/home" id="MyAccount_backToTradingBtn">BACK TO TRADING</a>
<?php
else:


?>
    

    <?php dynamic_sidebar('sidebar-1');?>
    <?php include "liveChat.php" ?>
    <?php // include "newsBox.php" ?>
<?php endif;?>