<?php get_header(); ?>
<div id="index">
    
    <div id="HeaderNews">
        <div id="marqueeTopParent"></div>
        <div id="phoneDiv">
            <a id="phoneGif" href="/ContactUs">
                
            </a>
        </div>
    </div>
    

    
    <div class="rightSide">
        <?php get_sidebar(); ?>
      
    </div>
	<div class="pageContainer">
	<div class="box"><h2><?php single_cat_title(); ?></h2></div>
	<?php 

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="post" id="post-<?php echo $post->ID;?>">
			<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
			<?php the_excerpt();?>
		</div>
	
	<?php endwhile; endif; ?>
	
	<div class="pagination">                                	
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'framework')) ?></div>
			<div class="nav-prev"><?php previous_posts_link(__('Newer Entries &rarr;', 'framework')) ?></div>
		<?php } ?>             
		
		<div class="clear"></div>
	
	</div>
								
								
   </div>
    
</div>
    

    <?php get_footer();?>