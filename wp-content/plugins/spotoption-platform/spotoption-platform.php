<?php
/*
Plugin Name: Spotoption Platform
Plugin URI: http://www.spotoption.com/integrationsandplugins/
Description: Intended to add binary options functionality to any wordpress template
Version:: 1.0
Author: Nitzan Brumer
Author URI: http://www.spotoption.com/integrationsandplugins/
License: GPL2
*/

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_PLUGIN_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_PLUGIN_PATH','/' . substr(MY_PLUGIN_FOLDER,stripos(MY_PLUGIN_FOLDER,'wp-content')));

load_plugin_textdomain('spot', false, basename( dirname( __FILE__ ) ) . '/languages' );
include 'custom_meta.php';
include 'admin-panel.php';
include 'functions/forms.php';
include 'functions/customtypes.php';
include 'widgets/leadbox_widget.php';
include 'widgets/loginwidget.php';
include 'widgets/howtotrade.php';




 add_action( 'init', 'register_my_menus' );
 
 function register_my_menus() {
  register_nav_menus(
    array( 'logged-menu' => __( 'login widget menu' ) )
  );
}
// Loading needed Java scrpits
add_action('wp_enqueue_scripts', 'SpotOption_scripts_method');
//Loading needed CSS scripts
add_action('wp_enqueue_scripts', 'SpotOption_style_method');
//Adding content filter for custom pages
add_filter('the_content', 'spotoption_custom_content');
//All secured pages will throw the user if he is not loggedin 
add_action('wp', 'secured_pages');

function SpotOption_style_method()
{
	wp_register_style( 'bootstrap', plugins_url('/css/bootstrap.min.css', __FILE__) );
	wp_register_style( 'platform', plugins_url('/css/platform.css', __FILE__) );
	wp_register_style( 'datepicker', plugins_url('/css/jdpicker.css', __FILE__) );
	
	if(get_option('use_bootstrap_css'))
		wp_enqueue_style('bootstrap');
	if(get_option('use_so_custom_css'))
		wp_enqueue_style('platform');
	
	wp_enqueue_style('datepicker');
		
		
}

function SpotOption_scripts_method() {
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', FALSE, FALSE, FALSE);
    wp_enqueue_script( 'jquery' );
	wp_register_script( 'validate', MY_PLUGIN_PATH.'/js/jquery.validate.min.js', FALSE, FALSE, TRUE);
	
	wp_register_script( 'api', MY_PLUGIN_PATH.'/js/api.js', FALSE, FALSE, TRUE);
//	wp_register_script( 'jstorage', MY_PLUGIN_PATH.'/js/jstorage.js', FALSE, FALSE, TRUE);
	wp_register_script( 'datepicker', MY_PLUGIN_PATH.'/js/jquery.jdpicker.js', FALSE, FALSE, TRUE);

	wp_enqueue_script( 'validate' );
	wp_enqueue_script( 'api' );
//	wp_enqueue_script( 'jstorage' );
	
	
	$translation_array = array	( 	
									'ajaxCallBack' => get_option('platform_url'),
									'mainSite' => get_bloginfo('url')
								);
						
	wp_localize_script( 'jquery', 'SiteSettings', $translation_array );	
	
	
	/*
		Customizing the page template by the page type.
			0 => 'Regular',
			1 => 'Open Account',
			2 => 'Deposit',
			3 => 'History',
			4 => 'Protfolio',
			5 => 'Withdeawal'
			6 => 'Personal Info'
			7 => 'Platform Page'
			8 => 'Expiry rates'
			
	*/
	
	global $post;	
	if(empty($post))
		return;
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
	if(empty($meta)) return;
	switch ($meta['page_type']){
		case(1):
			wp_register_script( 'openAccount', MY_PLUGIN_PATH.'/js/openAccount.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'openAccount' );
			break;
		case(2):
			wp_register_script( 'deposit', MY_PLUGIN_PATH.'/js/deposit.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'deposit' );
			break;
		case(3):
			wp_register_script( 'history', MY_PLUGIN_PATH.'/js/history.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'history' );
			wp_enqueue_script( 'datepicker' );
			break;
		case(4):
			wp_register_script( 'investments', MY_PLUGIN_PATH.'/js/investments.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'investments' );
			wp_enqueue_script( 'datepicker' );
			break;
		case(5):
			wp_register_script( 'withdrwal', MY_PLUGIN_PATH.'/js/withdrwal.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'withdrwal' );
			break;
		case(6):
			wp_register_script( 'personalinfo', MY_PLUGIN_PATH.'/js/personalinfo.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'personalinfo' );
			break;
		case(7):
		//	wp_register_script( 'trading', 'http://www.qa.trade.spotoption.com/SpotOptionPlugin.js?so_embed=1', FALSE, FALSE, FALSE);
			//wp_register_script( 'platform',  MY_PLUGIN_PATH.'/js/trade.js', FALSE, FALSE, FALSE);
			//wp_enqueue_script( 'trading' );
			//wp_enqueue_script( 'platform' );
			break;
		case(8):
			wp_register_script( 'expiryrates', MY_PLUGIN_PATH.'/js/expiryrates.js', FALSE, FALSE, TRUE);
			wp_enqueue_script( 'expiryrates' );
			wp_enqueue_script( 'datepicker' );
			break;
	
	}
							
}

function spotoption_custom_content($content) {
	/*
		0 => 'Regular',
		1 => 'Open Account',
		2 => 'Deposit',
		3 => 'History',
		4 => 'Protfolio',
		5 => 'Withdeawal'
		6 => 'Personal Info'
		7 => 'Platform Page'		
	*/
	global $post;
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
	if(empty($meta)) return $content;
	
	switch ($meta['page_type']){
		case(1):
			$content .= drawOpenAccountForm();			
			break;
		case(2):
			$content = drawDepositForm($content);
			break;
		case(3):
			$content .= drawHistoryPage();
			break;
		case(4):
			$content .= drawPositionPage();
			break;
		case(5):
			$content .= drawWitdrawalForm();
			break;
		case(6):
			$content .= drawpersonalInfoForm();
			break;
		case(7):
		//	$content =  do_shortcode( '[meteor_slideshow]' ) . $content;
			$content .= drawTradingPlatform();
			break;	
		case(8):
			$content .= drawExpiryRateForm();
			break;
	
	}
	
	return $content;
}



function secured_pages()
{
////remove this before commit!!!!!!!!!!!!!!!
//return;
	global $post;
	if(empty($post))
		return;
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);	
	if(empty($meta) || $meta['page_type'] == 0) 
		return;		
	else if($meta['page_type'] == 7 || $meta['page_type'] == 8)
		return;
	else if(spot_loggedin() && $meta['page_type'] == 1){
		
		header( 'Location: '. get_bloginfo('url') ) ;	
		return;
		}
	else if(!spot_loggedin() && $meta['page_type'] != 1){
        
		header( 'Location: '. get_bloginfo('url') ) ;		
		return;
	}	
	
	

}

function get_spot_plugin_path()
{
	return MY_PLUGIN_PATH;
}

function spot_loggedin(){
	
	if(isset($_COOKIE['customerId']))
		return true;		
	return false;

}

function handle_marketing()
{
	/*
	campaignId
	subCampaign
	a_aid
	a_bid
	a_cid
*/
}