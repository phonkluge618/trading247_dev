<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
          <div class="cBody clearfix">
            <?php dynamic_sidebar('sidebar-3'); ?>
            <section>
                <article class="wrap">
                    <h1>What is Binary Trading?</h1>
                    <p>The web is cluttered with complicated financial products whose clever marketing lures you in with promises of riches, but instead drain your bank (and can often times leave you in debt). Binary Options are the most exciting advance in online finance in recent history.</p>
                    <p>Binary options are, at their core, a simple prediction as to whether or not the price of an asset will rise or fall. That's it. No smoke and mirrors. No complications.</p>
                    <p>Because you control your exposure to the markets, you'll never have any nasty surprises. At Trading247, you can never lose more than your initial investment, unlike with spread betting. If you buy a SmartOption for £10, you can't lose a penny more than that, but you stand to gain over 70% profit if your prediction is correct.</p>
                    <p>SmartOptions, Trading247's binary option product, are the most simple way to take advantage of short-term market movements. By correctly predicting if the assets price will rise or fall, you can outsmart the market and get paid up to 85% instantly.</p>
                    <p>So, for example, Apple is about to launch it's brand new iThing and excitement is high. You buy a Smart Option for Apple's stock price to rise and invest £500.00. When the iThing was announced, Apple's price soared and your simple decision made you a profit of £350.00. Trading binary options is that simple.</p>
                    <img class="pull-right" src="<?php bloginfo('template_url'); ?>/images/body-img-02.jpg" />
                    <p>SmartOptions are so easy to use that you need no prior knowledge of online trading - just open your free acccount and start trading. Trading247 have great video tutorials to walk you through the trading basics, offer unrivaled customer support every step of the way, and feature daily market reviews and analysis so that you can always be one step ahead of the markets. We also hold free seminars for clients at our London offices, as well as one on one meetings with our market analyst and your dedicated manager.</p>
                    <p>Join the leader in binary options trading today.</p>
                    <div class="start-trade">
                        <p>
                            <a href="#" class="btn medium proceed expand">START TRADING TODAY</a>
                        </p>
                    </div>
                    
                </article>
            </section>
        </div>
			
                             
		</div><!-- #content -->
	</div><!-- #primary -->
       
<?php  // get_sidebar();sdfsdf ?>
<?php get_footer(); ?>