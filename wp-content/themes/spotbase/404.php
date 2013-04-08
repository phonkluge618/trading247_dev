<?php
/*
Template Name: error404
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
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php //wp_head(); ?>
</head>
    <body <?php body_class(); ?> id="body404">
        <div class="continer404">
            <div id="headerBg404">
               <center><a class="Logo404" href="http://test.platform.com" title="langz"></a></center> 
            </div>
            <div id="content404">
                    <span id="errorMassegatop"><?php _e('Error! This page does not exist.','spot');?></span>
                    <br/>
                    <span id="errorMassegabotton"><?php _e('Please, choose one of the following links to get back to the site:','spot');?></span>
              </div>
        </div>
             <?php wp_nav_menu( array( 'theme_location' => 'error-menu', 'menu_class' => 'nav-menu'  ) ); ?>
            <div id="bottonborder"></div>
         <div id="bodyBotton"></div>
    </boby>
</html>