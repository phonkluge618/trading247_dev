<?php
/**
 * Template Name: BinaryTrading Template 
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
    <div class="top-banner">
            <figure>
                <img src="<?php bloginfo('template_url'); ?>/images/what_isbinarytrading_banner.png" alt="Top Banner Image" />
            </figure>
            
    </div>
	<div id="primary" class="site-content">
		<div id="content" role="main">
          <div class="cBody clearfix">
            <?php dynamic_sidebar('sidebar-3'); ?>
            <section>
                <article class="wrap">
                      <?php while ( have_posts() ) : the_post(); ?>

                         <div class="entry-content">
                            <?php if(is_page('what-can-i-trade')) { ?>
                                
                                 <div class="htmlStr" style="display:none;"></div>
                    <form class="search-bar">
                        <input id="searchAssets" type="text" />
                    </form>
                    <h1>What assets can I trade?</h1>
                    <p>Trading247 feature hundreds of assets, including stocks, commodities, currencies and indices from a range of global markets. Explore our extensive, and ever-growing, collection below. </p>
                    
                    <div class="customTabs">
                        <ul class="ct-nav">
                            <li><a href="#tab-1">Stocks</a></li>
                            <li><a href="#tab-2">Currencies</a></li>
                            <li><a href="#tab-3">Commodities</a></li>
                            <li><a href="#tab-4">Indices</a></li>
                        </ul>

                        <div id="assets" class="tabs clearfix">
                            <div id="tab-1" class="tab">

                                <div class="cScroll">
                                    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                    <div class="viewport">
                                        <div class="overview">
                                            <div class="atrade clearfix">
                                          
                                                <?php
    
                                                        $type = 'stock';
                                                        $args=array(
                                                          'post_type' => $type,
                                                          'orderby' => 'title',
                                                          'order' => 'ASC',
                                                          'post_status' => 'publish');
                                                        
                                                        $stocksDetail = array();
                                                        $i = 0;

                                                        $my_query = null;   
                                                        $my_query = new WP_Query($args);

                                                         if($my_query->have_posts()) {
                                                           
                                                           while ($my_query->have_posts()) : $my_query->the_post();
                                                               $post_id = get_the_ID();
                                                               
                                                               $img_url = get_post_meta($post_id,'wpcf-stock_image',true);
                                                               
                                                               $company_name = get_post_meta($post_id,'wpcf-company_name',true);
                                                               $trading_hours = get_post_meta($post_id,'wpcf-trading_hours',true); 
                                                               $reuters_code =  get_post_meta($post_id,'wpcf-reuters_code',true); 
                                                               
                                                               $stocksDetail[$i]['img_url'] = $img_url;
                                                               $stocksDetail[$i]['company_name'] = $company_name;
                                                               $stocksDetail[$i]['trading_hours'] = $trading_hours;
                                                               $stocksDetail[$i]['reuters_code'] = $reuters_code;
                                                               $i++;
                                                               
                                                               
                                                               
                                                               
                                                           endwhile;
                                                           
                                                         }
                                                         
                                                          wp_reset_query();  // Restore global post data stomped by the_post().
                                                         
                                                ?>
                                              
                                                <?php for($n = 0; $n < count($stocksDetail); $n++){?>
                                                    <figure>
                                                    <div class="image-wrapper">
                                                        <img src="<?php echo $stocksDetail[$n]['img_url']; ?>" />
                                                    </div>
                                                    <p>
                                                        <?php echo $stocksDetail[$n]['company_name']; ?><br />
                                                        Trading Hours: <?php echo $stocksDetail[$n]['trading_hours']; ?><br />
                                                        Reuters Code: <?php echo $stocksDetail[$n]['reuters_code']; ?>
                                                    </p>
                                                </figure> 
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div id="tab-2" class="tab">
                                <div class="cScroll">
                                    <div class="scrollbar">
                                        <div class="track">
                                            <div class="thumb">
                                                <div class="end"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewport">
                                        <div class="overview">
                                            <div class="atrade clearfix">
                                                  <?php
    
                                                        $type1 = 'currency';
                                                        $args1=array(
                                                          'post_type' => $type1,
                                                          'orderby' => 'title',
                                                          'order' => 'ASC',
                                                          'post_status' => 'publish');
                                                        
                                                        $currencyDetail = array();
                                                        $i = 0;

                                                        $my_query1 = null;   
                                                        $my_query1 = new WP_Query($args1);

                                                         if($my_query1->have_posts()) {
                                                           
                                                           while ($my_query1->have_posts()) : $my_query1->the_post();
                                                               $post_id = get_the_ID();
                                                               
                                                               $img_url = get_post_meta($post_id,'wpcf-image_url',true);
                                                               
                                                               
                                                               $company_name = get_post_meta($post_id,'wpcf-currency_switch',true);
                                                               $trading_hours = get_post_meta($post_id,'wpcf-trading_hours',true); 
                                                               $reuters_code =  get_post_meta($post_id,'wpcf-reuters_code',true); 
                                                               
                                                               $currencyDetail[$i]['image_url'] = $img_url;
                                                               $currencyDetail[$i]['currency_switch'] = $company_name;
                                                               $currencyDetail[$i]['trading_hours'] = $trading_hours;
                                                               $currencyDetail[$i]['reuters_code'] = $reuters_code;
                                                               $i++;
                                                               
                                                               
                                                               
                                                               
                                                           endwhile;
                                                           
                                                         }
                                                         
                                                          wp_reset_query();  // Restore global post data stomped by the_post().
                                                         
                                                ?>
                                              
                                                <?php for($n = 0; $n < count($currencyDetail); $n++){?>
                                                    <figure>
                                                    <div class="image-wrapper">
                                                        <img src="<?php echo $currencyDetail[$n]['image_url']; ?>" />
                                                    </div>
                                                    <p>
                                                        <?php echo $currencyDetail[$n]['currency_switch']; ?><br />
                                                        Trading Hours: <?php echo $currencyDetail[$n]['trading_hours']; ?><br />
                                                        Reuters Code: <?php echo $currencyDetail[$n]['reuters_code']; ?>
                                                    </p>
                                                </figure> 
                                                <?php } ?>
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="tab-3" class="tab">
                                <div class="cScroll">
                                    <div class="scrollbar">
                                        <div class="track">
                                            <div class="thumb">
                                                <div class="end"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewport">
                                        <div class="overview">
                                            <div class="atrade clearfix">
                                        
                                                 <?php
    
                                                        $type2 = 'commodity';
                                                        $args2=array(
                                                          'post_type' => $type2,
                                                          'orderby' => 'title',
                                                          'order' => 'ASC',
                                                          'post_status' => 'publish');
                                                        
                                                        $commodityDetail = array();
                                                        $i = 0;

                                                        $my_query2 = null;   
                                                        $my_query2 = new WP_Query($args2);

                                                         if($my_query2->have_posts()) {
                                                           
                                                           while ($my_query2->have_posts()) : $my_query2->the_post();
                                                               $post_id = get_the_ID();
                                                               
                                                               $img_url = get_post_meta($post_id,'wpcf-image_url',true);
                                                               
                                                               
                                                               $commodity_name = get_post_meta($post_id,'wpcf-commodity_name',true);
                                                               $trading_hours = get_post_meta($post_id,'wpcf-trading_hours',true); 
                                                               $reuters_code =  get_post_meta($post_id,'wpcf-reuters_code',true); 
                                                               
                                                               $commodityDetail[$i]['image_url'] = $img_url;
                                                               $commodityDetail[$i]['commodity_name'] = $commodity_name;
                                                               $commodityDetail[$i]['trading_hours'] = $trading_hours;
                                                               $commodityDetail[$i]['reuters_code'] = $reuters_code;
                                                               $i++;
                                                                   
                                                           endwhile;
                                                           
                                                         }
                                                         
                                                          wp_reset_query();  // Restore global post data stomped by the_post().
                                                         
                                                ?>
                                              
                                                <?php for($n = 0; $n < count($commodityDetail); $n++){?>
                                                    <figure>
                                                    <div class="image-wrapper">
                                                        <img src="<?php echo $commodityDetail[$n]['image_url']; ?>" />
                                                    </div>
                                                    <p>
                                                        <?php echo $commodityDetail[$n]['commodity_name']; ?><br />
                                                        Trading Hours: <?php echo $commodityDetail[$n]['trading_hours']; ?><br />
                                                        Reuters Code: <?php echo $commodityDetail[$n]['reuters_code']; ?>
                                                    </p>
                                                </figure> 
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="tab-4" class="tab">
                                <div class="cScroll">
                                    <div class="scrollbar">
                                        <div class="track">
                                            <div class="thumb">
                                                <div class="end"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewport">
                                        <div class="overview">
                                            <div class="atrade clearfix">
                                                
                                                 <?php
    
                                                        $type3 = 'Indice';
                                                        $args3=array(
                                                          'post_type' => $type3,
                                                          'orderby' => 'title',
                                                          'order' => 'ASC',
                                                          'post_status' => 'publish');
                                                        
                                                        $indicesDetail = array();
                                                        $i = 0;

                                                        $my_query3 = null;   
                                                        $my_query3 = new WP_Query($args3);

                                                         if($my_query3->have_posts()) {
                                                           
                                                           while ($my_query3->have_posts()) : $my_query3->the_post();
                                                               $post_id = get_the_ID();
                                                               
                                                               $img_url = get_post_meta($post_id,'wpcf-image_url',true);
                                                               
                                                               
                                                               $indice_name = get_post_meta($post_id,'wpcf-indice_name',true);
                                                               $trading_hours = get_post_meta($post_id,'wpcf-trading_hours',true); 
                                                               $reuters_code =  get_post_meta($post_id,'wpcf-reuters_code',true); 
                                                               
                                                               $indicesDetail[$i]['image_url'] = $img_url;
                                                               $indicesDetail[$i]['indice_name'] = $indice_name;
                                                               $indicesDetail[$i]['trading_hours'] = $trading_hours;
                                                               $indicesDetail[$i]['reuters_code'] = $reuters_code;
                                                               $i++;
                                                               
                                                               
                                                               
                                                               
                                                           endwhile;
                                                           
                                                         }
                                                         
                                                          wp_reset_query();  // Restore global post data stomped by the_post().
                                                         
                                                ?>
                                              
                                                <?php for($n = 0; $n < count($indicesDetail); $n++){?>
                                                    <figure>
                                                    <div class="image-wrapper">
                                                        <img src="<?php echo $indicesDetail[$n]['image_url']; ?>" />
                                                    </div>
                                                    <p>
                                                        <?php echo $indicesDetail[$n]['indice_name']; ?><br />
                                                        Trading Hours: <?php echo $indicesDetail[$n]['trading_hours']; ?><br />
                                                        Reuters Code: <?php echo $indicesDetail[$n]['reuters_code']; ?>
                                                    </p>
                                                </figure> 
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="start-trade">
                        <p>
                            <a class="btn medium proceed expand" href="#">START TRADING TODAY</a>
                        </p>
                    </div>
                                
                                
                            <?php } else {?>
                            <?php the_content(); } ?>
                            
                           
                         </div><!-- .entry-content -->

                     <?php endwhile; // end of the loop. ?>
                            
                </article>
            </section>
        </div>
			
                             
		</div><!-- #content -->
	</div><!-- #primary -->
       
<?php  // get_sidebar();sdfsdf ?>
<?php get_footer(); ?>
