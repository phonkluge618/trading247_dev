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
	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	 <div class="box"><h3><?php the_title();?></h3></div>
		<div class="post" id="post-<?php echo $post->ID;?>">
			
			<?php the_content();?>
		</div>
	
	<?php endwhile; endif; ?>
  
   </div>
    
</div>
    

    <?php get_footer();?>