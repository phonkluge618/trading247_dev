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