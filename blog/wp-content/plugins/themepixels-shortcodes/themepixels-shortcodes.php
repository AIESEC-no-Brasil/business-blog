<?php
/*
Plugin Name: Themepixels Shortcodes
Plugin URI: http://www.themepixels.net/themepixels-shortcodes
Description: A free shortcodes plugin
Author: Krishna
Author URI: http://www.themepixels.net
Version: 1.0
License: GNU General Public License version 2.0
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Adds plugin JS and CSS
require_once( dirname(__FILE__) . '/includes/scripts.php' );

// Main shortcode functions
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php');

// Adds mce buttons to post editor
require_once( dirname(__FILE__) . '/includes/mce/themepixels_shortcodes_tinymce.php');