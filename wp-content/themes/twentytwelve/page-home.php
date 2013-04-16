<?php
/**
 *  Template Name: Home Template
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
     <?php putRevSlider("homepage_slider"); ?>
    <div class="reuters">
            <span class="rLogo"></span>
            <div class="marquee-wrap"> </div>
    </div>
	<div id="primary" class="site-content">
		<div id="content" role="main">
          <div class="cBody clearfix" style="height: 1094px;float:left;">
            <?php  dynamic_sidebar('home-sidebar-widget'); ?>
            
            <section>
                  <article class="wrap" style="margin-left:0px;margin-right: 0;">
                      <?php while ( have_posts() ) : the_post(); ?>

                         <div class="entry-content">
                            <?php the_content(); ?>
                           
                         </div><!-- .entry-content -->

                     <?php endwhile; // end of the loop. ?>
                            
                </article>
            </section>
        </div>
			
                             
		</div><!-- #content -->
	</div><!-- #primary -->
       
<?php  // get_sidebar();sdfsdf ?>
<?php get_footer(); ?>
