/*  Script for the Meteor Slides 1.5 slideshow
	
	Copy "slideshow.js" from "/meteor-slides/js/" to your theme's directory to replace
	the plugin's default slideshow script.
	
	Learn more about customizing the slideshow script for Meteor Slides: 
	http://www.jleuze.com/plugins/meteor-slides/customizing-the-slideshow-script/
*/

// Set custom shortcut to avoid conflicts
//var $j = jQuery.noConflict();

// Get the slideshow options
var $slidespeed      = parseInt( meteorslidessettings.meteorslideshowspeed );
var $slidetimeout    = parseInt( meteorslidessettings.meteorslideshowduration );
var $slideheight     = parseInt( meteorslidessettings.meteorslideshowheight );
var $slidewidth      = parseInt( meteorslidessettings.meteorslideshowwidth );
var $slidetransition = meteorslidessettings.meteorslideshowtransition;

$(document).ready(function() {

	// Setup jQuery Cycle
	
    $('.meteor-slides').cycle({
		cleartypeNoBg: true,
		fit:           1,
		fx:            $slidetransition,
		height:        $slideheight,
		next:          '#meteor-next',
		pager:         '#meteor-buttons',
		pagerEvent:    'click',
		pause:         1,
		prev:          '#meteor-prev',
		slideExpr:     '.mslide',
		speed:         $slidespeed,
		timeout:       $slidetimeout,
		width:         $slidewidth
	});
	
	// Setup jQuery TouchWipe

    $('.meteor-slides').touchwipe({
        wipeLeft: function() {
            $('.meteor-slides').cycle('next');
        },
        wipeRight: function() {
            $('.meteor-slides').cycle('prev');
        }
    });
	
	// Add class to hide and show prev/next nav on hover
	
    $('.meteor-slides').hover(function () {
		$(this).addClass('navhover');
    }, function () {
		$(this).removeClass('navhover');
    });
	
	// Set a fixed height for prev/next nav in IE6
	
	if(typeof document.body.style.maxWidth === 'undefined') {
		$('.meteor-nav a').height($slideheight);
	}
	
});