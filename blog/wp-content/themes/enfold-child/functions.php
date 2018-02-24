<?php

global $avia_config;

$avia_config['use_child_theme_functions_only'] = true;

/*
	* create a global var which stores the ids of all posts which are displayed on the current page. It will help us to filter duplicate posts
	*/
$avia_config['posts_on_current_page'] = array();


/*
	* wpml multi site config file
	* needs to be loaded before the framework
	*/

require_once( TEMPLATEPATH.'/'.'config-wpml/config.php' );


/*
	* These are the available color sets in your backend.
	* If more sets are added users will be able to create additional color schemes for certain areas
	*
	* The array key has to be the class name, the value is only used as tab heading on the styling page
	*/


$avia_config['color_sets'] = array(
		'band_content'      => 'Band',
		'darkband_content'  => 'Dark Band',
		'header_color'      => 'Logo Area',
		'main_color'        => 'Main Content',
		'alternate_color'   => 'Alternate Content',
		'footer_color'      => 'Footer',
		//'socket_color'      => 'Socket'
	);



/*
	* add support for responsive mega menus
	*/

add_theme_support('avia_mega_menu');




/*
	* deactivates the default mega menu and allows us to pass individual menu walkers when calling a menu
	*/

add_filter('avia_mega_menu_walker', '__return_false');


/*
	* adds support for the new avia sidebar manager
	*/

add_theme_support('avia_sidebar_manager');

/*
	* Filters for post formats etc
	*/
//add_theme_support('avia_queryfilter');


##################################################################
# AVIA FRAMEWORK by Kriesi

# this include calls a file that automatically includes all
# the files within the folder framework and therefore makes
# all functions and classes available for later use

require_once( TEMPLATEPATH.'/'.'framework/avia_framework.php' );

##################################################################


/*
	* Register additional image thumbnail sizes
	* Those thumbnails are generated on image upload!
	*
	* If the size of an array was changed after an image was uploaded you either need to re-upload the image
	* or use the thumbnail regeneration plugin: http://wordpress.org/extend/plugins/regenerate-thumbnails/
	*/

$avia_config['imgSize']['widget'] 			 	= array('width'=>36,  'height'=>36);						// small preview pics eg sidebar news
$avia_config['imgSize']['square'] 		 	    = array('width'=>180, 'height'=>180);		                 // small image for blogs
$avia_config['imgSize']['featured'] 		 	= array('width'=>1500, 'height'=>430 );						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['featured_large'] 		= array('width'=>1500, 'height'=>630 );						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['extra_large'] 		 	= array('width'=>1500, 'height'=>1500 , 'crop' => false);	// images for fullscrren slider
$avia_config['imgSize']['portfolio'] 		 	= array('width'=>495, 'height'=>400 );						// images for portfolio entries (2,3 column)
$avia_config['imgSize']['portfolio_small'] 		= array('width'=>260, 'height'=>185 );						// images for portfolio 4 columns
$avia_config['imgSize']['gallery'] 		 		= array('width'=>845, 'height'=>684 );						// images for portfolio entries (2,3 column)
$avia_config['imgSize']['magazine'] 		 	= array('width'=>710, 'height'=>375 );						// images for magazines
$avia_config['imgSize']['masonry'] 		 		= array('width'=>705, 'height'=>705 , 'crop' => false);		// images for fullscreen masonry
$avia_config['imgSize']['entry_with_sidebar'] 	= array('width'=>845, 'height'=>321);		            	// big images for blog and page entries
$avia_config['imgSize']['entry_without_sidebar']= array('width'=>1210, 'height'=>423 );						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['news_half']= 		array('width'=>270, 'height'=>270 );

$avia_config['imgSize']['preview'] 				= array('width'=>309, 'height'=>341 );
$avia_config['imgSize']['program_signup'] 				= array('width'=>270, 'height'=>321 );


$avia_config['selectableImgSize'] = array(
	'square' 				=> __('Square','avia_framework'),
	'preview' 				=> __('Preview','avia_framework'),
	'program_signup' 		=> __('Programs Signup','avia_framework'),
	'featured'  			=> __('Featured Thin','avia_framework'),
	'featured_large'  		=> __('Featured Large','avia_framework'),
	'portfolio' 			=> __('Portfolio','avia_framework'),
	'gallery' 				=> __('Gallery','avia_framework'),
	'news_half' 			=> __('News half','avia_framework'),
	'entry_with_sidebar' 	=> __('Entry with Sidebar','avia_framework'),
	'entry_without_sidebar'	=> __('Entry without Sidebar','avia_framework'),
	'extra_large' 			=> __('Fullscreen Sections/Sliders','avia_framework'),

);


avia_backend_add_thumbnail_size($avia_config);

if ( ! isset( $content_width ) ) $content_width = $avia_config['imgSize']['featured']['width'];




/*
	* register the layout classes
	*
	*/

$avia_config['layout']['fullsize'] 		= array('content' => 'av-content-full alpha', 'sidebar' => 'hidden', 	  	  'meta' => '','entry' => '');
$avia_config['layout']['sidebar_left'] 	= array('content' => 'av-content-small', 	  'sidebar' => 'alpha' ,'meta' => 'alpha', 'entry' => '');
$avia_config['layout']['sidebar_right'] = array('content' => 'av-content-small alpha','sidebar' => 'alpha', 'meta' => 'alpha', 'entry' => 'alpha');





/*
	* These are some of the font icons used in the theme, defined by the entypo icon font. the font files are included by the new aviaBuilder
	* common icons are stored here for easy retrieval
	*/

	$avia_config['font_icons'] = apply_filters('avf_default_icons', array(

		//post formats +  types
		'standard' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue836'),
		'link'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue822'),
		'image'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80f'),
		'audio'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue801'),
		'quote'   		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue833'),
		'gallery'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80e'),
		'video'   		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80d'),
		'portfolio'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue849'),
		'product'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue859'),

		//social
		'behance' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue915'),
	'dribbble' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fe'),
	'facebook' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f3'),
	'flickr' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8ed'),
	'gplus' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f6'),
	'linkedin' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fc'),
	'instagram' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue909'),
	'pinterest' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f8'),
	'skype' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue90d'),
	'tumblr' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fa'),
	'twitter' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f1'),
	'vimeo' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8ef'),
	'rss' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue853'),
	'youtube'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue921'),
	'xing'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue923'),
	'soundcloud'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue913'),
	'five_100_px'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue91d'),
	'vk'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue926'),
	'reddit'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue927'),
	'digg'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue928'),
	'delicious'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue929'),
	'mail' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue805'),

	//woocomemrce
	'cart' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue859'),
	'details'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue84b'),

	//bbpress
	'supersticky'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue808'),
	'sticky'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue809'),
	'one_voice'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue83b'),
	'multi_voice'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue83c'),
	'closed'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue824'),
	'sticky_closed' => array( 'font' =>'entypo-fontello', 'icon' => 'ue808\ue824'),
	'supersticky_closed' => array( 'font' =>'entypo-fontello', 'icon' => 'ue809\ue824'),

	//navigation, slider & controls
	'play' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue897'),
	'pause'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue899'),
	'next'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue879'),
		'prev'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue878'),
		'next_big'  	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue87d'),
		'prev_big'  	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue87c'),
	'close'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue814'),
	'reload'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue891'),
	'mobile_menu'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8a5'),

	//image hover overlays
		'ov_external'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue832'),
		'ov_image'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue869'),
		'ov_video'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue897'),


	//misc
		'search'  		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue803'),
		'info'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue81e'),
	'clipboard' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8d1'),
	'scrolltop' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue876'),
	'scrolldown' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue877'),
	'bitcoin' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue92a'),

));






add_theme_support( 'automatic-feed-links' );

##################################################################
# Frontend Stuff necessary for the theme:
##################################################################
/*
	* Register theme text domain
	*/
if(!function_exists('avia_lang_setup'))
{
	add_action('after_setup_theme', 'avia_lang_setup');
	function avia_lang_setup()
	{
		$lang = apply_filters('ava_theme_textdomain_path', get_template_directory()  . '/lang');
		load_theme_textdomain('avia_framework', $lang);
	}
}


/*
	* Register frontend javascripts:
	*/
if(!function_exists('avia_register_frontend_scripts'))
{
	if(!is_admin()){
		add_action('wp_enqueue_scripts', 'avia_register_frontend_scripts');
	}

	function avia_register_frontend_scripts()
	{
		$template_url = get_template_directory_uri();
		$child_theme_url = get_stylesheet_directory_uri();

		//register js
		wp_enqueue_script( 'avia-compat', $template_url.'/js/avia-compat.js', array('jquery'), 2, false ); //needs to be loaded at the top to prevent bugs
		wp_enqueue_script( 'avia-default', $template_url.'/js/avia.js', array('jquery'), 3, true );
		wp_enqueue_script( 'avia-shortcodes', $template_url.'/js/shortcodes.js', array('jquery'), 3, true );
		wp_enqueue_script( 'avia-popup',  $template_url.'/js/aviapopup/jquery.magnific-popup.min.js', array('jquery'), 2, true);

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wp-mediaelement' );


		if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }


		//register styles
		wp_register_style( 'avia-style' ,  $child_theme_url."/style.css", array(), 		'2', 'all' ); //register default style.css file. only include in childthemes. has no purpose in main theme
		wp_register_style( 'avia-custom',  $template_url."/css/custom.css", array(), 	'2', 'all' );

		wp_enqueue_style( 'avia-grid' ,   $template_url."/css/grid.css", array(), 		'2', 'all' );
		wp_enqueue_style( 'avia-base' ,   $template_url."/css/base.css", array(), 		'2', 'all' );
		wp_enqueue_style( 'avia-layout',  $template_url."/css/layout.css", array(), 	'2', 'all' );
		wp_enqueue_style( 'avia-scs',     $template_url."/css/shortcodes.css", array(), '2', 'all' );
		wp_enqueue_style( 'avia-popup-css', $template_url."/js/aviapopup/magnific-popup.css", array(), '1', 'screen' );
		wp_enqueue_style( 'avia-media'  , $template_url."/js/mediaelement/skin-1/mediaelementplayer.css", array(), '1', 'screen' );
		wp_enqueue_style( 'avia-print' ,  $template_url."/css/print.css", array(), '1', 'print' );


		if ( is_rtl() ) {
			wp_enqueue_style(  'avia-rtl',  $template_url."/css/rtl.css", array(), '1', 'all' );
		}


				global $avia;
		$safe_name = avia_backend_safe_string($avia->base_data['prefix']);

				if( get_option('avia_stylesheet_exists'.$safe_name) == 'true' )
				{
						$avia_upload_dir = wp_upload_dir();
						if(is_ssl()) $avia_upload_dir['baseurl'] = str_replace("http://", "https://", $avia_upload_dir['baseurl']);

						$avia_dyn_stylesheet_url = $avia_upload_dir['baseurl'] . '/dynamic_avia/'.$safe_name.'.css';
			$version_number = get_option('avia_stylesheet_dynamic_version'.$safe_name);
			if(empty($version_number)) $version_number = '1';

						wp_enqueue_style( 'avia-dynamic', $avia_dyn_stylesheet_url, array(), $version_number, 'all' );
				}

		wp_enqueue_style( 'avia-custom');


		if($child_theme_url !=  $template_url)
		{
			wp_enqueue_style( 'avia-style');
		}

	}
}


if(!function_exists('avia_remove_default_video_styling'))
{
	if(!is_admin()){
		add_action('wp_footer', 'avia_remove_default_video_styling', 1);
	}

	function avia_remove_default_video_styling()
	{
		//remove default style for videos
		wp_dequeue_style( 'mediaelement' );
		// wp_dequeue_script( 'wp-mediaelement' );
		// wp_dequeue_style( 'wp-mediaelement' );
	}
}






/*
	* Activate native wordpress navigation menu and register a menu location
	*/
if(!function_exists('avia_nav_menus'))
{
	function avia_nav_menus()
	{
		global $avia_config, $wp_customize;

		add_theme_support('nav_menus');

		foreach($avia_config['nav_menus'] as $key => $value)
		{
			//wp-admin\customize.php does not support html code in the menu description - thus we need to strip it
			$name = (!empty($value['plain']) && !empty($wp_customize)) ? $value['plain'] : $value['html'];
			register_nav_menu($key, THEMENAME.' '.$name);
		}
	}

	$avia_config['nav_menus'] = array(	'avia' => array('html' => __('Main Menu', 'avia_framework')),
										'avia2' => array(
													'html' => __('Secondary Menu <br/><small>(Will be displayed if you selected a header layout that supports a submenu <a target="_blank" href="'.admin_url('?page=avia#goto_header').'">here</a>)</small>', 'avia_framework'),
													'plain'=> __('Secondary Menu - will be displayed if you selected a header layout that supports a submenu', 'avia_framework')),
										'avia3' => array(
													'html' => __('Footer Menu <br/><small>(no dropdowns)</small>', 'avia_framework'),
													'plain'=> __('Footer Menu (no dropdowns)', 'avia_framework'))
									);

	avia_nav_menus(); //call the function immediatly to activate
}










/*
	*  load some frontend functions in folder include:
	*/

require_once( TEMPLATEPATH.'/'.'includes/admin/register-portfolio.php' );		// register custom post types for portfolio entries
require_once( TEMPLATEPATH.'/'.'includes/admin/register-widget-area.php' );		// register sidebar widgets for the sidebar and footer
require_once( TEMPLATEPATH.'/'.'includes/loop-comments.php' );					// necessary to display the comments properly
require_once( TEMPLATEPATH.'/'.'includes/helper-template-logic.php' ); 			// holds the template logic so the theme knows which tempaltes to use
require_once( TEMPLATEPATH.'/'.'includes/helper-social-media.php' ); 			// holds some helper functions necessary for twitter and facebook buttons
require_once( TEMPLATEPATH.'/'.'includes/helper-post-format.php' ); 				// holds actions and filter necessary for post formats
require_once( TEMPLATEPATH.'/'.'includes/helper-markup.php' ); 					// holds the markup logic (schema.org and html5)
require_once( TEMPLATEPATH.'/'.'includes/admin/register-plugins.php');			// register the plugins we need

if(current_theme_supports('avia_conditionals_for_mega_menu'))
{
	require_once( TEMPLATEPATH.'/'.'includes/helper-conditional-megamenu.php' );  // holds the walker for the responsive mega menu
}

require_once( TEMPLATEPATH.'/'.'includes/helper-responsive-megamenu.php' ); 		// holds the walker for the responsive mega menu




//adds the plugin initalization scripts that add styles and functions

if(!current_theme_supports('deactivate_layerslider')) require_once( TEMPLATEPATH.'/'.'config-layerslider/config.php' );//layerslider plugin

require_once( TEMPLATEPATH.'/'.'config-bbpress/config.php' );					//compatibility with  bbpress forum plugin
require_once( TEMPLATEPATH.'/'.'config-templatebuilder/config.php' );			//templatebuilder plugin
require_once( TEMPLATEPATH.'/'.'config-gravityforms/config.php' );				//compatibility with gravityforms plugin
require_once( TEMPLATEPATH.'/'.'config-woocommerce/config.php' );				//compatibility with woocommerce plugin
require_once( TEMPLATEPATH.'/'.'config-wordpress-seo/config.php' );				//compatibility with Yoast WordPress SEO plugin
require_once( TEMPLATEPATH.'/'.'config-events-calendar/config.php' );			//compatibility with the Events Calendar plugin


if(is_admin())
{
	require_once( TEMPLATEPATH.'/'.'includes/admin/helper-compat-update.php');	// include helper functions for new versions
}




/*
	*  dynamic styles for front and backend
	*/
if(!function_exists('avia_custom_styles'))
{
	function avia_custom_styles()
	{
		require_once( TEMPLATEPATH.'/'.'includes/admin/register-dynamic-styles.php' );	// register the styles for dynamic frontend styling
		avia_prepare_dynamic_styles();
	}

	add_action('init', 'avia_custom_styles', 20);
	add_action('admin_init', 'avia_custom_styles', 20);
}




/*
	*  activate framework widgets
	*/
if(!function_exists('avia_register_avia_widgets'))
{
	function avia_register_avia_widgets()
	{
		register_widget( 'avia_newsbox' );
		register_widget( 'avia_portfoliobox' );
		register_widget( 'avia_socialcount' );
		register_widget( 'avia_combo_widget' );
		register_widget( 'avia_partner_widget' );
		register_widget( 'avia_google_maps' );
		register_widget( 'avia_fb_likebox' );


	}

	avia_register_avia_widgets(); //call the function immediatly to activate
}



/*
	*  add post format options
	*/
add_theme_support( 'post-formats', array('link', 'quote', 'gallery','video','image','audio' ) );



/*
	*  Remove the default shortcode function, we got new ones that are better ;)
	*/
add_theme_support( 'avia-disable-default-shortcodes', true);


/*
	* compat mode for easier theme switching from one avia framework theme to another
	*/
add_theme_support( 'avia_post_meta_compat');


/*
	* make sure that enfold widgets dont use the old slideshow parameter in widgets, but default post thumbnails
	*/
add_theme_support('force-post-thumbnails-in-widget');







/*
	*  register custom functions that are not related to the framework but necessary for the theme to run
	*/

require_once( TEMPLATEPATH.'/'.'functions-enfold.php');


/*
	* add option to edit elements via css class
	*/
add_theme_support('avia_template_builder_custom_css');


/// END AVIA OPTIONS



/*
	* Template Custom options
	*/
require_once ( TEMPLATEPATH . '-child/options/options.php' );


/*
	* add option to edit post_type of some builder elements
	*/
add_theme_support('add_avia_builder_post_type_option');


// SASS/SCSS Stylesheet Definition
function generate_css() {
	if(function_exists('wpsass_define_stylesheet')) {
		wpsass_define_stylesheet("custom_styles.scss");
	}
}
add_action( 'after_setup_theme', 'generate_css' );


// Register meta boxes
include_once('meta_boxes.php');

// Register new posttypes
include_once('post_types.php');


function inser_before_footer(){
	echo '<div class="footer_wrapping">';

		echo '<div class="flex_column full_width">';
			$page = get_post( __t('socialfooter') );
			echo apply_filters('the_content', $page->post_content);
		echo "</div>";
}
add_action('avia_before_footer_columns', 'inser_before_footer');


function inser_after_footer(){
		echo '<div class="flex_column full_width">';
			echo "<nav class='footer_navigation' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
			    $avia_theme_location = 'avia3';
			    $avia_menu_class = $avia_theme_location . '-menu';

			    $args = array(
			        'theme_location'=>$avia_theme_location,
			        'menu_id' =>$avia_menu_class,
			        'container_class' =>$avia_menu_class,
			        'fallback_cb' => '',
			        'depth'=>1
			    );

			    wp_nav_menu($args);
			echo "</nav>";
		echo "</div>";

	echo "</div>";
}
add_action('avia_after_footer_columns', 'inser_after_footer', 20);



function inser_after_footer_menu(){
	echo '<div class="copyrights_notice flex_column full_width">';
		_e('AIESEC is a non-governmental not-for-profit organisation in consultative status with the United Nations Economic<br>and Social Council (ECOSOC), affiliated with the UN DPI, member of ICMYO, and is recognized by UNESCO.<br>AIESEC International is registered as a Foundation (Stichting), RSIN #807103895 in<br>Rotterdam, The Netherlands.', 'enfold-child');
	echo "</div>";
	echo '<div class="copyrights  flex_column full_width">' . __('© AIESEC ',  'enfold-child') . date('Y') . '</div>';
}
add_action('avia_after_footer_columns', 'inser_after_footer_menu', 30);





// Include JS and CSS for options page
add_action('admin_init', 'inc_admin_JS_init_method');
function inc_admin_JS_init_method() {
	wp_enqueue_script('adminjs', get_template_directory_uri() . '-child/options/admin_js.js', 'jquery', false);
	wp_enqueue_style('admincss', get_template_directory_uri() . '-child/options/admin_css.css', 'jquery', false);

}

// Helpers to easyly grab option value
function _t($val){
	$txt = get_option( 're_opt' );
	if( function_exists('icl_get_languages')){
		$lang = ICL_LANGUAGE_CODE;
	}else{
		$lang = 'en';
	}
	//use
	echo $txt[$val.'_'.$lang];
}

function __t($val){
	$txt = get_option( 're_opt' );
	if( function_exists('icl_get_languages')){
		$lang = ICL_LANGUAGE_CODE;
	}else{
		$lang = 'en';
	}
	//use
	return $txt[$val.'_'.$lang];
}


// Title trimmer
//add_filter('the_title', 'wpwr_trimmer');
function wpwr_trimmer($title){
	$length = 30;
	if ( mb_strlen($title) >$length ){
		$title = mb_substr( $title,0,$length);
		return $title . '...';
	}else{
		return $title;
	}
}

// Add shortcode for inserting the search form to office finding page
add_shortcode('wpbsearch', 'get_search_form');



if(!is_admin()){
	add_action('wp_enqueue_scripts', 'custom_register_frontend_scripts');
}

function custom_register_frontend_scripts(){
	wp_enqueue_script( 'knockout-js', get_template_directory_uri().'-child/js/knockout-3.2.0.js', array('jquery'), 3, true );
	wp_enqueue_script( 'custom-scripts', get_template_directory_uri().'-child/js/scripts.js', array('jquery'), 3, true );

	echo '<script>';
		echo 'var adminajax = "'. admin_url( 'admin-ajax.php' ) .'"';
	echo '</script>';
}



function inser_after_search_form(){
	echo '<div id="searchdrop" class="">';
	echo "</div>";
}
add_action('ava_frontend_search_form', 'inser_after_search_form', 30);


function my_deregister_heartbeat() {
    global $pagenow;

    if ( 'admin-ajax.php' != $pagenow ) {
         wp_deregister_script('heartbeat');
         wp_register_script('heartbeat', false);
     }
}
add_action( 'admin_enqueue_scripts', 'my_deregister_heartbeat' );


// Ajax search posts
add_action('wp_ajax_search_get_posts', 'search_get_posts');
add_action('wp_ajax_nopriv_search_get_posts', 'search_get_posts' );
function search_get_posts() {
	if ( !empty($_POST['value']) ) {

		$value = strip_tags($_POST['value']);

		//add_filter( 'posts_search', 'ni_search_by_title_only', 500, 2 );
		$query = new WP_Query( 'posts_per_page=2&post_type=offices&s='.$value );
		//remove_filter( 'posts_search', 'ni_search_by_title_only');

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
				<div class="office">
					<?php echo the_content(); ?>
				</div>
				<?php
				}
		} else {
			echo '<div class="office-not-found">'.__('No offices found', 'enfold-child').'</div>';
		}
		wp_reset_postdata();

		die();
	} else {
		die();
	}
}

/*
function ni_search_by_title_only( $search, &$wp_query ){
	    global $wpdb;
	    if ( empty( $search ) )
	        return $search; // skip processing - no search term in query
	    $q = $wp_query->query_vars;
	    $n = ! empty( $q['exact'] ) ? '' : '%';
	    $search =
	    $searchand = '';
	    foreach ( (array) $q['search_terms'] as $term ) {
	        $term = esc_sql( like_escape( $term ) );
	        $type = 'post';
	        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
					$searchand = ' AND ';
					$search .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
	    }
	    if ( ! empty( $search ) ) {
	        $search = " AND ({$search}) ";
	        if ( ! is_user_logged_in() )
	            $search .= " AND ($wpdb->posts.post_password = '') ";
	    }
	    $search .= "{$searchand}($wpdb->posts.post_type LIKE 'offices')";
	    return $search;
	}
*/


// Instagram custom feed fetching
function callInstagram($url) {
	$ch = curl_init();
	curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST => 2
	));

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

// Get instagram images
function get_instagram_feed() {
	return '<div id="sb_instagram">
			<div id="sbi_images">
				<!-- ko foreach: instagramArray -->
				<div class="instagram-feed-item sbi_item">
					<a data-bind="attr: {href: link}" target="_blank">
						<img data-bind="attr: {src: image}" />
					</a>
				</div>
				<!-- /ko -->
			</div>
		</div>';
}

function get_instagram_count() {
	return '<span data-bind="text: instagramMediaCount"></span>';
}

add_shortcode('instagram_custom', 'get_instagram_feed');

function get_linkedin_count() {
	// Return a hardcoded string right now
	return '68963';
/*
	return '<script src="//platform.linkedin.com/in.js" type="text/javascript">
	lang: en_US
</script>
<script type="IN/FollowCompany" data-id="2034" data-counter="top"></script>


<script type="text/javascript" src="http://platform.linkedin.com/in.js">
    api_key: 7597gexoov0ys4
  </script>
 
  <script type="text/javascript">
    function testme(count){
        console.log("That document has been shared: " + count + " times");
    }
		IN.Tags.Share.getCount("https://www.linkedin.com/company/aiesec",testme);
 
  </script>


	<script>
	function httpGet(theUrl) {
		var xmlHttp = null;
		xmlHttp = new XMLHttpRequest();
		xmlHttp.open( "GET", theUrl, false );
		xmlHttp.send( null );
		return xmlHttp.message;
	}
	httpGet("http://api.linkedin.com/v1/companies/2034:(num-followers)");
	</script>
	';
	*/
/*
	print_line("\n********A basic user connections call********");
	$api_url = "https://api.linkedin.com/v1/people/~/connections";
	$oauth->fetch($api_url, null, OAUTH_HTTP_METHOD_GET);
	print_response($oauth);
*/
}

add_shortcode('instagram_feed_custom', 'get_instagram_feed');
add_shortcode('instagram_count', 'get_instagram_count');
add_shortcode('linkedin_count', 'get_linkedin_count');




function do_timeline(){
	ob_start();
	include_once('includes/timeline.php');
	$content = ob_get_clean();
	return $content;
}

add_shortcode('timeline', 'do_timeline');


add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items) {        
	ob_start();        
	//get_search_form();     
	global $avia_config; 


	//allows you to modify the search parameters. for example bbpress search_id needs to be 'bbp_search' instead of 's'. you can also deactivate ajax search by setting ajax_disable to true
	$search_params = apply_filters('avf_frontend_search_form_param', array(
		
		'placeholder'  	=> __('Search','avia_framework'),
		'search_id'	   	=> 's',
		'form_action'	=> home_url( '/' ),
		'ajax_disable'	=> true
	));

	$disable_ajax = $search_params['ajax_disable'] == false ? "" : "av_disable_ajax_search";

	$icon  = av_icon_char('search');
	$class = av_icon_class('search');
	?>


	<form action="<?php echo $search_params['form_action']; ?>" id="mobile_searchform" method="get" class="<?php echo $disable_ajax; ?>">
		<div>
			<input type="submit" value="<?php echo $icon; ?>" id="mobile_searchsubmit" class="button <?php echo $class; ?>" />
			<input type="text" id="s" name="<?php echo $search_params['search_id']; ?>" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>" placeholder='<?php echo $search_params['placeholder']; ?>' />
		</div>
	</form>

   	<?php
	$searchform = ob_get_contents();        
	ob_end_clean();        
	$items .= '<li class="menuSearch">' . $searchform . '</li>';   
	return $items;
}

//add_action('ava_after_main_menu', 'add_search_box');

//add_filter('un_admin_notification_email', 'add_notify_email_rrecipients');
function add_notify_email_rrecipients($email){
	// Multiple recipients may be specified using an array or a comma-separated 
	$email = $email;
	print_r( $email );
	return $email;
}

?>
