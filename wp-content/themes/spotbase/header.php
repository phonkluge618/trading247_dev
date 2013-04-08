<?php

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="headerBg">
	<div id="headerContainer" class="container">
		<div id="Header">
                    <div id="logo">
			
				<a class="Logo" href="<?php bloginfo('url');?>" title="langz"></a>
			</div>
			<div id="headerForm" class="log"">
                            <?php dynamic_sidebar('header-sidebar');?>
                            <?php if(!isset($_COOKIE['customerId'])):?>
                                <a href="/ForgotPassword" title="Forgot Password?" class="ForgotPassword"><?php _e('Forgot Password?','spot'); ?></a>
                            <?php endif;?>
                                <br/>
				<div class="CurrentDate">
					<div class="Time">
                                            <span id="LShour"><?php echo date("H"); ?></span>
						<span class="point">:</span>
						<span id="LSminute"><?php echo date("i"); ?></span>
						<span class="point">:</span>
						<span id="LSseconds"><?php echo date("s"); ?></span>
                                                
						<span id="timezone" class="clockTimezone"></span>
					</div>
					<span id="LSdate" class="Date"><?php echo date("m.d.y"); ?></span>
					<div id="langContainer">
                                           <?php do_action('icl_language_selector'); ?>
					</div>
				</div>
			</div>
                   
		</div>
	</div>
</div>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu'  ) ); ?>
