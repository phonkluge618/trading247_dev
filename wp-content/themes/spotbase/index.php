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
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="post" id="post-<?php echo $post->ID;?>">
			<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
			<?php the_excerpt();?>
		</div>
	
	<?php endwhile; endif; ?>
   
    
</div>
    

    <?php get_footer();?>