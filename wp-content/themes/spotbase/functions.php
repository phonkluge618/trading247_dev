<?php

add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}

function spot_menus() {
  register_nav_menus(
    array( 
            'header-menu' => __( 'Header Menu','spot' ) ,
            'first-footer-menu' => __( 'First Footer Menu','spot' ), 
            'second-footer-menu' => __( 'Second Footer Menu','spot' ),
            'third-footer-menu' => __( 'Third Footer Menu','spot' ),
            'forth-footer-menu' => __( 'Forth Footer Menu','spot' ),
            'fifth-footer-menu' => __( 'Fifth Footer Menu','spot' ),
            'myaccount-menu' => __( 'My Account Menu','spot' ),
            'error-menu' => __( 'error Menu','spot' ),
        )
  );
  register_sidebar( array(
		'name' => __( 'Main Sidebar', 'spot' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'spot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Side bar', 'spot' ),
		'id' => 'header-sidebar',
		'description' => __( 'Goes on the site header', 'spot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        
}
add_action( 'init', 'spot_menus' );



function learnMorebox1($atts, $content = null)
{
        $html ='  <div class="pageContainer">';
        $html .='  <div class="box"><span>My position</span></div>';
        $html .='  <div id="secbox">';
        $html .='    <div id="continerTop">';
        $html .='       <div id="step1">';
        $html .='           <div class="twoStep">';
        $html .='               <div class="title"><span>'.  $atts['title'] .'</span></div>';
        $html .='               <div class="bgContent" id="bodyStep1">';
        $html .='                 <center><div class="bodyTilte">'.$atts['fitrtsline'].'</div>';
        $html .='                   <img id="'.$atts['imgdiv'] .'"></center>';
        $html .=                    $content;
        $html .='                   <br/><br/><font size="1">'. $atts['notice'] .'</font></div>';
        $html .='               </div>';
        $html .='          </div>';
       
        return $html;
}
function learnMorebox2($atts, $content = null)
{
   
        $html ='       <div id="step2">';
        $html .='           <div class="twoStep">';
        $html .='               <div class="title"><span>'. $atts['title'].'</span></div>';
        $html .='               <div class="bgContent" id="bodyStep2">';
        $html .='                 <center><div class="bodyTilte">'. $atts['fitrtsline'].'</div>';
        $html .='                   <img id="imgDeposit"></center>';
        $html .=                    $content;
        $html .='               </div>';
        $html .='          </div>';
        $html .='       </div>';
        $html .='    </div>';
                      
	return $html;
}

function learnMorebox3($atts)
{
        $html ='   <div id="continermiddle">';
        $html .='           <div class="step3">';
        $html .='               <div class="title"><span>'. $atts['title'].'</span></div>';
        $html .='               <div id="bodyMovie">';
        $html .='               <div id="thirdStepMovie"> ';
        $html .='               <object type="application/x-shockwave-flash" data="'.get_bloginfo('template_directory') . $atts['src'].'" width="611" height="216" id="thirdStepMovie" style="visibility: visible;"><param name="wmode" value="transparent"><param name="loop" value="false"></object>';
        $html .= '              </div>';
        $html .='               </div>';
        $html .='          </div>';
        $html .= '  </div>';
       	
	return $html;
}
function learnMorebox4($atts , $content = null)
{

        $html ='   <div id="continerbotton">';
        $html .='           <div class="step4">';
        $html .='               <div class="title"><span>'. $atts['title'].'</span></div>';
        $html .='               <div id="bodystep4">';
        $html .=                    $content;
        $html .='                   <img class="imgOpenPos">';
        $html .='                   <img class="imgOpenPosExpanded">';
        $html .='               </div>';
        $html .='          </div>';
        $html .= '  </div>';
        $html .= '</div>';
	$html .= '</div>';
	
	return $html;
}

function wire($atts)
{

    $html = '                      <li class="dollar">';
    $html .= '                          <div class="wireBankAccounts_title">';
    $html .= '                              <span class="sing">'.$atts['sing']. '</span><span>'.$atts['singname'].'</span><span class="sub">'.$atts['deposit'].'</span>';
    $html .= '                          </div>';
    $html .= '                          <div class="content">';
    $html .= '                              <div>'. __('Bank Name:','spot') .'<span>'.$atts['bankname'].'</span></div>';
    $html .= '                              <div>'. __('Bank Address:','spot') .'<span>'.$atts['bankaddress'].'</span></div>';
    $html .= '                              <div>'. __('SWIFT:','spot') .'<span>'.$atts['swift'].'</span></div>';
    $html .= '                              <div>'. __('Account Name:','spot') .'<span>'.$atts['accountname'].'</span></div>';
    $html .= '                              <div>'. __('Account Holder Address:','spot') .'<span>'.$atts['accountaddress'].'</span></div>';
    $html .= '                              <div>'. __('Account Number:','spot') .'<span>'.$atts['accountnumber'].'</span></div>';
    $html .= '                              <div>'. __('EUR Account:','spot') .'<span>'.$atts['euraccount'].'</span></div>';
    $html .= '                              <div>'. __('Deposit Message:','spot') .'<span>'.$atts['depositmassage'].'</span></div>';
    $html .= '                              <div><span>'.$atts['notice'].'</span></div>';
    $html .= '                          </div>';
    $html .= '                      </li>';

    return $html;
}

function Thanku($atts , $content = null)
{
        $form = '<div class="continerContect">';
        $form .=  '  <div class="mune-registrantion">';
	$form .= '      <ul class="registrationSteps ">';
        $form .= '          <li class=""><span class="registrationStepsText">'.$atts['reg'].'</span></li>';
        $form .= '          <li class="current"><span class="registrationStepsText">'.$atts['var'].'</span></li>';
        $form .= '          <li class=""><span class="registrationStepsText">'.$atts['deposit'].'</span></li>';
        $form .= '      </ul>';
        $form .= '  </div>';
        $form .= '  <div class="contectConntent">';
        $form .=                    $content;
        $form .= '  </div>';
        $form .= '       <div id="boxBtn">';
        $form .= '          <a class="btn nextDeposit" href="/thank-you/" value="NEXT" name="newAccount">NEXT</a>';
        $form .= '      </div>';
        $form .= '</div>';
	
	return $form;
}

add_shortcode( 'learnMore_first_box', 'learnMorebox1' );
add_shortcode( 'learnMore_second_box', 'learnMorebox2' );
add_shortcode( 'learnMore_third_box', 'learnMorebox3' );
add_shortcode( 'learnMore_four_box', 'learnMorebox4' );
add_shortcode( 'Thanku_box', 'Thanku' );
add_shortcode( 'wire_box', 'wire' );


function spot_scripts() {
	wp_register_script( 'general', get_bloginfo('template_directory').'/js/general.js', FALSE, FALSE, TRUE);
	wp_enqueue_script( 'general' );	           
}    
 
add_action('wp_enqueue_scripts', 'spot_scripts'); // For use on the Front end (ie. Theme)

