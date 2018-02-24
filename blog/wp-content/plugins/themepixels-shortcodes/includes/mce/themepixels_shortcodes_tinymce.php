<?php
/**
 * This file has all the main shortcode functions
 *
 * @package Themepixels Shortcodes Plugin
 * @since 1.0
 */


function themepixels_shortcodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'themepixels_shortcodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'themepixels_shortcodes_register_mce_button' );
	}
}
add_action('admin_head', 'themepixels_shortcodes_add_mce_button');


function themepixels_shortcodes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['themepixels_shortcodes_mce_button'] = plugins_url( '/js/themepixels_shortcodes_tinymce.js', __FILE__ );
	return $plugin_array;
}


function themepixels_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'themepixels_shortcodes_mce_button' );
	return $buttons;
}


function themepixels_shortcodes_mce_css() {
	wp_enqueue_style('themepixels_shortcodes-tc', plugins_url('/css/themepixels_shortcodes_tinymce_style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'themepixels_shortcodes_mce_css' );