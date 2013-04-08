<?php
/*
Template Name: Learn More
*/
?>
<?php get_header(); ?>
<div id="index">
    
    <div id="HeaderNews">
        <div id="marqueeTopParent"></div>
        <div id="phoneDiv">
            <a id="phoneGif" href="/ContactUs"></a>
        </div>
    </div>
    
    
    <div class="rightSide">
        <?php get_sidebar(); ?>
  
    </div>

   <?php the_content();?>
    
</div>
    

    <?php get_footer();?>