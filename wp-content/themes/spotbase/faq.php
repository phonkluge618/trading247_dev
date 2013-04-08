<?php
/*
Template Name: faq
*/
wp_register_script( 'assetIndex', get_bloginfo('template_directory').'/js/assetIndex.js', FALSE, FALSE, TRUE);
wp_enqueue_script( 'assetIndex' );
?>
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
   	<div class="box"><h2><?php the_title();?></h2></div>
       <ul class="faqTitles faq">
		<?php 
		$args=array(
		 'types'
		);
		$output = 'objects'; // or objects
		$taxonomies= get_terms($args); 
		
		$selected = 'selected';
        	foreach ($taxonomies as $taxonomy ) {
                    echo '<li class="'.$selected.'" id="taxcat-'.$taxonomy->term_id.'">'. $taxonomy->name. '</li>';
                    $selected = '';
		}
		?>
	</ul>
        <div class="curTab faq">
	<?php 
        
        $i=1;
	foreach ($taxonomies as $taxonomy ) {
            
	?>
        <div  id="tax-block-<?php echo $taxonomy->term_id;?>"<?php if($i++>1) echo 'class="hidden"';?> >
	<?php
	$args = array('posts_per_page'=> -1,	'post_type' => 'faq',  'types' => $taxonomy->slug  );
	query_posts( $args );
	
	 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	 
            <div class="asset" id="asset-<?php echo $post->ID;?>"><h2> <?php the_title();?></h2><div class="assetBotton"></div></div>
		<div class="post hidden" id="post-<?php echo $post->ID;?>">
			
			<?php the_content();?>
		</div>
	
	<?php endwhile; endif;
	?></div>
	<?php
	}
	?>
   </div>
   </div>
    
    
</div>
    

    <?php get_footer();?>