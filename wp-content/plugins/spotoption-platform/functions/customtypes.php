<?php
/***
*	customtypes.php
*
*	Three new custom post types:
*		1.	FAQ
*		2.	Asset Index
*		3.	Dictionary
*
*****/

add_action( 'init', 'spot_create_post_type' );
function spot_create_post_type() {
    
    /**
	
		Setting the FAQ
	
	**/
    $questions = array(
                    'name' => __( 'Questions' , 'spot'),
                    'singular_name' => __( 'Question' , 'spot'),
                    'add_new' => __( 'Add New' , 'spot'),
                    'add_new_item' => __( 'Add New Question' , 'spot'),
                    'edit' => __( 'Edit' , 'spot'),
                    'edit_item' => __( 'Edit Question' , 'spot'),
                    'new_item' => __( 'New Question' , 'spot'),
                    'view' => __( 'View Question' , 'spot'),
                    'view_item' => __( 'View Question' , 'spot'),
                    'search_items' => __( 'Search Questions' , 'spot'),
                    'not_found' => __( 'No Question found' , 'spot'),
                    'not_found_in_trash' => __( 'No Questions found in Trash' , 'spot'),
                    'parent' => __( 'Parent Question' , 'spot'),
                 );
	register_post_type( 'faq',
		array(
			'labels' => $questions ,
                        'public' => true,
                        'rewrite' => array( 'slug' => 'question', 'with_front' => false ),
                        'has_archive' => true,
                        'capability_type' => 'post',
            //            'menu_icon' => get_bloginfo('stylesheet_directory').'/img/question.png',
                        'supports' => array('title', 'thumbnail', 'custom-fields','excerpt','editor'),
                        'taxonomies' => array('types') 
                    
		)
	);
	
	
	
	
    $faqTax = array(
    'name'                          => __( 'Types', 'spot'),
    'singular_name'                 => __( 'Type', 'spot'),
    'search_items'                  => __( 'Search Types', 'spot'),
    'popular_items'                 => __( 'Popular Types', 'spot'),
    'all_items'                     => __( 'All Types', 'spot'),
    'parent_item'                   => __( 'Parent Type', 'spot'),
    'edit_item'                     => __( 'Edit Type', 'spot'),
    'update_item'                   => __( 'Update Type', 'spot'),
    'add_new_item'                  => __( 'Add New Type', 'spot'),
    'new_item_name'                 => __( 'New Type', 'spot'),
    'separate_items_with_commas'    => __( 'Separate Types with commas', 'spot'),
    'add_or_remove_items'           => __( 'Add or remove Types', 'spot'),
    'choose_from_most_used'         => __( 'Choose from most used Types', 'spot')
    );

	$FAQargs = array(
		'label'                         => 'Types',
		'labels'                        => $faqTax,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_admin_column'  			=> true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'rewrite'                       => array( 'slug' => 'types', 'with_front' => false ),
		'query_var'                     => true
	);
	
	/**
	
		Setting the Asset Index
	
	**/    
        
    $assets = array(
                    'name' => __( 'Assets', 'spot'),
                    'singular_name' => __( 'Asset' , 'spot'),
                    'add_new' => __( 'Add New' , 'spot'),
                    'add_new_item' => __( 'Add New Asset' , 'spot'),
                    'edit' => __( 'Edit' , 'spot'),
                    'edit_item' => __( 'Edit Asset' , 'spot'),
                    'new_item' => __( 'New Asset' , 'spot'),
                    'view' => __( 'View Asset' , 'spot'),
                    'view_item' => __( 'View Asset' , 'spot'),
                    'search_items' => __( 'Search Assets' , 'spot'),
                    'not_found' => __( 'No Assets found', 'spot'),
                    'not_found_in_trash' => __( 'No Assets found in Trash' , 'spot'),
                    'parent' => __( 'Parent Asset' , 'spot'),
                 );
            
    register_post_type( 'asset',
		array(
			'labels' => $assets ,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'asset', 'with_front' => FALSE),
			'capability_type' => 'post',
			'supports' => array('title', 'thumbnail', 'custom-fields','excerpt','editor'),
			'taxonomies' => array('groups') ,
			//'menu_icon' => get_bloginfo('stylesheet_directory').'/img/question.png'
                    
		)
	);
    
	
    $assetTax = array(
    'name'                          => __( 'Groups', 'spot'),
    'singular_name'                 => __( 'Group', 'spot'),
    'search_items'                  => __( 'Search Groups', 'spot'),
    'popular_items'                 => __( 'Popular Groups', 'spot'),
    'all_items'                     => __( 'All Groups', 'spot'),
    'parent_item'                   => __( 'Parent Group', 'spot'),
    'edit_item'                     => __( 'Edit Group', 'spot'),
    'update_item'                   => __( 'Update Group', 'spot'),
    'add_new_item'                  => __( 'Add New Group', 'spot'),
    'new_item_name'                 => __( 'New Group', 'spot'),
    'separate_items_with_commas'    => __( 'Separate Groups with commas', 'spot'),
    'add_or_remove_items'           => __( 'Add or remove Groups', 'spot'),
    'choose_from_most_used'         => __( 'Choose from most used Groups', 'spot')
    );

	$assetArgs = array(
		'label'                         => 'Groups',
		'labels'                        => $assetTax,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'rewrite'                       => array( 'slug' => 'types', 'with_front' => false ),
		'query_var'                     => true
	); 
	
	/**
	
		Setting the Dictionary
	
	**/  
	$dictionary = array(
                    'name' => __( 'Terms', 'spot'),
                    'singular_name' => __( 'Term' , 'spot'),
                    'add_new' => __( 'Add New' , 'spot'),
                    'add_new_item' => __( 'Add New Term' , 'spot'),
                    'edit' => __( 'Edit' , 'spot'),
                    'edit_item' => __( 'Edit Term' , 'spot'),
                    'new_item' => __( 'New Term' , 'spot'),
                    'view' => __( 'View Term' , 'spot'),
                    'view_item' => __( 'View Term' , 'spot'),
                    'search_items' => __( 'Search Terms' , 'spot'),
                    'not_found' => __( 'No Terms found', 'spot'),
                    'not_found_in_trash' => __( 'No Terms found in Trash' , 'spot'),
                    'parent' => __( 'Parent Term' , 'spot'),
                 );
            
    register_post_type( 'term',
		array(
			'labels' => $dictionary ,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'term', 'with_front' => FALSE),
			'capability_type' => 'post',
			'supports' => array('title', 'thumbnail', 'custom-fields','excerpt','editor'),                      
		//	'menu_icon' => get_bloginfo('stylesheet_directory').'/img/question.png'
                    
		)
	);	
	
	register_taxonomy( 'types', 'faq', $FAQargs );
    register_taxonomy( 'groups', 'asset', $assetArgs );
	
}