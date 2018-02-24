<?php
	global $avia_config;


	// REGISTER STORIES
	$labels = array(
		'name' => _x('Stories', 'post type general name','avia_framework'),
		'singular_name' => _x('Stories Entry', 'post type singular name','avia_framework'),
		'add_new' => _x('Add New', 'portfolio','avia_framework'),
		'add_new_item' => __('Add New Story','avia_framework'),
		'edit_item' => __('Edit Story','avia_framework'),
		'new_item' => __('New Story','avia_framework'),
		'view_item' => __('View Stories','avia_framework'),
		'search_items' => __('Search Stories','avia_framework'),
		'not_found' =>  __('No Stories found','avia_framework'),
		'not_found_in_trash' => __('No Stories found in Trash','avia_framework'),
		'parent_item_colon' => ''
	);

	$permalinks = get_option('avia_permalink_settings');
		if(!$permalinks) $permalinks = array();

		$permalinks['stories_permalink_base'] = empty($permalinks['stories_permalink_base']) ? __('story', 'avia_framework') : $permalinks['stories_permalink_base'];
		$permalinks['stories_entries_taxonomy_base'] = empty($permalinks['stories_entries_taxonomy_base']) ? __('story_entries', 'avia_framework') : $permalinks['stories_entries_taxonomy_base'];

	$args = array(
		'labels' => $labels,
		'_builtin' => false,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug'=>_x($permalinks['stories_permalink_base'],'URL slug','avia_framework'), 'with_front'=>false),
		'query_var' => true,
		'show_in_nav_menus'=> true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title','thumbnail','excerpt','editor','comments')
	);

	$args = apply_filters('avf_portfolio_cpt_args', $args);
	$avia_config['custom_post']['stories']['args'] = $args;

	register_post_type( 'stories' , $args );



	$tax_args = array(
		"hierarchical" => true,
		"label" => "Stories Categories",
		"singular_label" => "Stories Category",
		"rewrite" => array('slug'=>_x($permalinks['stories_entries_taxonomy_base'],'URL slug','avia_framework'), 'with_front'=>true),
		"query_var" => true
	);

		$avia_config['custom_taxonomy']['stories']['story_entries']['args'] = $tax_args;

	register_taxonomy("story_entries", array("stories"), $tax_args);



	// REGISTER NEWS
	$labels = array(
		'name' => _x('News', 'post type general name','avia_framework'),
		'singular_name' => _x('News Entry', 'post type singular name','avia_framework'),
		'add_new' => _x('Add New', 'portfolio','avia_framework'),
		'add_new_item' => __('Add New','avia_framework'),
		'edit_item' => __('Edit News','avia_framework'),
		'new_item' => __('New News','avia_framework'),
		'view_item' => __('View News','avia_framework'),
		'search_items' => __('Search News','avia_framework'),
		'not_found' =>  __('No News found','avia_framework'),
		'not_found_in_trash' => __('No News found in Trash','avia_framework'),
		'parent_item_colon' => ''
	);

	$permalinks = get_option('avia_permalink_settings');
		if(!$permalinks) $permalinks = array();

		$permalinks['news_permalink_base'] = empty($permalinks['news_permalink_base']) ? __('news', 'avia_framework') : $permalinks['news_permalink_base'];
		$permalinks['news_entries_taxonomy_base'] = empty($permalinks['news_entries_taxonomy_base']) ? __('news_entries', 'avia_framework') : $permalinks['news_entries_taxonomy_base'];

	$args = array(
		'labels' => $labels,
		'_builtin' => false,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug'=>_x($permalinks['news_permalink_base'],'URL slug','avia_framework'), 'with_front'=>false),
		'query_var' => true,
		'show_in_nav_menus'=> true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title','thumbnail','excerpt','editor','comments')
	);

	$args = apply_filters('avf_portfolio_cpt_args', $args);
	$avia_config['custom_post']['news']['args'] = $args;
	register_post_type( 'news' , $args );


	$tax_args = array(
		"hierarchical" => true,
		"label" => "News Categories",
		"singular_label" => "Stories Category",
		"rewrite" => array('slug'=>_x($permalinks['news_entries_taxonomy_base'],'URL slug','avia_framework'), 'with_front'=>true),
		"query_var" => true
	);

		$avia_config['custom_taxonomy']['news']['story_entries']['args'] = $tax_args;

	register_taxonomy("news_entries", array("news"), $tax_args);


	//deactivate the avia_flush_rewrites() function - not required because we rely on the default wordpress permalink settings
	remove_action('wp_loaded', 'avia_flush_rewrites');


// REGISTER OFFICES
	$labels = array(
		'name' => _x('Offices', 'post type general name','avia_framework'),
		'singular_name' => _x('Offices Entry', 'post type singular name','avia_framework'),
		'add_new' => _x('Add New', 'portfolio','avia_framework'),
		'add_new_item' => __('Add New','avia_framework'),
		'edit_item' => __('Edit Offices','avia_framework'),
		'new_item' => __('New Offices','avia_framework'),
		'view_item' => __('View Offices','avia_framework'),
		'search_items' => __('Search Offices','avia_framework'),
		'not_found' =>  __('No Offices found','avia_framework'),
		'not_found_in_trash' => __('No Offices found in Trash','avia_framework'),
		'parent_item_colon' => ''
	);

	$permalinks = get_option('avia_permalink_settings');
		if(!$permalinks) $permalinks = array();

		$permalinks['offices_permalink_base'] = empty($permalinks['offices_permalink_base']) ? __('offices', 'avia_framework') : $permalinks['offices_permalink_base'];
		//$permalinks['offices_entries_taxonomy_base'] = empty($permalinks['offices_entries_taxonomy_base']) ? __('offices_entries', 'avia_framework') : $permalinks['offices_entries_taxonomy_base'];

	$args = array(
		'labels' => $labels,
		'_builtin' => false,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug'=>_x($permalinks['offices_permalink_base'],'URL slug','avia_framework'), 'with_front'=>false),
		'query_var' => true,
		'show_in_nav_menus'=> true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title', 'editor')
	);

	$args = apply_filters('avf_portfolio_cpt_args', $args);
	$avia_config['custom_post']['offices']['args'] = $args;
	register_post_type( 'offices' , $args );




// REGISTER timeline
	$labels = array(
		'name' => _x('Timeline', 'post type general name','avia_framework'),
		'singular_name' => _x('Timeline Entry', 'post type singular name','avia_framework'),
		'add_new' => _x('Add New', 'portfolio','avia_framework'),
		'add_new_item' => __('Add New','avia_framework'),
		'edit_item' => __('Edit Timepoint','avia_framework'),
		'new_item' => __('New Timepoint','avia_framework'),
		'view_item' => __('View Timepoints','avia_framework'),
		'search_items' => __('Search Timepoint','avia_framework'),
		'not_found' =>  __('No Timepoints found','avia_framework'),
		'not_found_in_trash' => __('No Timepoints found in Trash','avia_framework'),
		'parent_item_colon' => ''
	);

	$permalinks = get_option('avia_permalink_settings');
		if(!$permalinks) $permalinks = array();

		$permalinks['timeline_permalink_base'] = empty($permalinks['timeline_permalink_base']) ? __('timeline', 'avia_framework') : $permalinks['timeline_permalink_base'];
		//$permalinks['offices_entries_taxonomy_base'] = empty($permalinks['offices_entries_taxonomy_base']) ? __('offices_entries', 'avia_framework') : $permalinks['offices_entries_taxonomy_base'];

	$args = array(
		'labels' => $labels,
		'_builtin' => false,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug'=>_x($permalinks['timeline_permalink_base'],'URL slug','avia_framework'), 'with_front'=>false),
		'query_var' => true,
		'show_in_nav_menus'=> true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title', 'editor', 'thumbnail')
	);

	$args = apply_filters('avf_portfolio_cpt_args', $args);
	$avia_config['custom_post']['timeline']['args'] = $args;
	register_post_type( 'timeline' , $args );
?>
