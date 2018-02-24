<?php
/**
 * This file loads the JS necessary for your shortcodes display
 *
 * @package Themepixels Shortcodes Plugin
 * @since 1.0
 */

if( !function_exists ('themepixels_shortcodes_scripts') ) {
	function themepixels_shortcodes_scripts() {

		$scripts_dir = plugin_dir_url( __FILE__ );

		wp_register_script( 'themepixels_toggle', $scripts_dir . 'js/themepixels_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'themepixels_accordion', $scripts_dir . 'js/themepixels_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_register_script( 'themepixels_tabs', $scripts_dir . 'js/themepixels_tabs.js', 'jquery', '1.0', true );
		wp_register_script( 'themepixels_googlemap',  $scripts_dir . 'js/themepixels_googlemap.js', array('jquery'), '1.0', true );
		wp_register_script( 'themepixels_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true );
		
	}
}
add_action('wp_enqueue_scripts', 'themepixels_shortcodes_scripts');