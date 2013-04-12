<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
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
<link href="<?php bloginfo('template_url'); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css"> 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.min.css">

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.tinyscrollbar.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header class="_wrap">
        <a href="#" class="logo"></a>

        <div class="admin">
            <div class="login">
                <?php dynamic_sidebar('sidebar-1'); ?>
                 <div class="shw"></div>   
            </div>
        <div class="hFoot">
                <div class="dateTime">&nbsp;</div>

                <div id="dd" class="language">
                    <span><i class="eng"></i>English</span>
                    <ul class="dropdown">
                        <li><a href="#"><i class="ger"></i>German</a></li>
                        <li><a href="#"><i class="jap"></i>Japanese</a></li>
                        <li><a href="#"><i class="eng"></i>English</a></li>
                    </ul>
                </div>
            </div>   
            <div class="sharethis">
                <a class="fb" title="Like us on Facebook"></a>
                <a class="twit" title="Follow us on Twitter"></a>
                <a class="mail" title="Mail Us"></a>
                <a class="liveChat" title="Live Chat!"></a>
            </div>
            <a href="#" class="btn medium proceed tradeNow">TRADE NOW</a>
        </div>
    </header>
    <nav class="clearfix _wrap">
      
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
    
	<div id="main" class="wrapper">