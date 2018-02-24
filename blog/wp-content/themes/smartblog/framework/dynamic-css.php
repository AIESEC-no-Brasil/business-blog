<?php
/**
 * Dynamic CSS
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'wp_head', 'themepixels_dynamic_css' );
if ( ! function_exists( 'themepixels_dynamic_css' ) ) {
	function themepixels_dynamic_css() {

		$output = '';
		
        /**
            Typography
        **/
		
		// Top Menu Font Size
		$top_menu_font_size = tps_get_option('top_menu_font_size');
		if( $top_menu_font_size ) {
			$output .= '.top-menu > li > a { font-size: '. intval($top_menu_font_size) .'px; }';
		}
		
		// Primary Menu Font Size
		$primary_menu_font_size = tps_get_option('primary_menu_font_size');
		if( $primary_menu_font_size ) {
			$output .= '.header-style-one .primary-menu > li > a, .header-style-two .primary-menu > li > a, .header-style-three .primary-menu > li > a { font-size: '. intval($primary_menu_font_size) .'px; }';
		}
		
		// Dropdown Menu Font Size
		$dropdown_menu_font_size = tps_get_option('dropdown_menu_font_size');
		if( $dropdown_menu_font_size ) {
			$output .= '.sf-menu > .sf-normal-menu ul a { font-size: '. intval($dropdown_menu_font_size) .'px; }';
		}
		
		// Dropdown Megamenu Column Title Font Size
		$dropdown_megamenu_col_title_font_size = tps_get_option('dropdown_megamenu_col_title_font_size');
		if( $dropdown_megamenu_col_title_font_size ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column .megamenu-title { font-size: '. intval($dropdown_megamenu_col_title_font_size) .'px; }';
		}
		
		// Dropdown Megamenu Font Size
		$dropdown_megamenu_font_size = tps_get_option('dropdown_megamenu_font_size');
		if( $dropdown_megamenu_font_size ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column ul a { font-size: '. intval($dropdown_megamenu_font_size) .'px; }';
		}
		
        /**
            Header
        **/
		
		// Logo
		$logo_top_margin = tps_get_option('logo_top_margin');
		if( $logo_top_margin ) {
			$output .= '.header-style-one .logo, .header-style-two .logo, .header-style-three .logo { margin-top: '. intval($logo_top_margin) .'px; }';
		}
		
		$logo_bottom_margin = tps_get_option('logo_bottom_margin');
		if( $logo_bottom_margin ) {
			$output .= '.header-style-one .logo, .header-style-two .logo, .header-style-three .logo { margin-bottom: '. intval($logo_bottom_margin) .'px; }';
		}
		
		// Retina Logo
		if( tps_get_option('retina_logo_image', 'url') !== '' ) {
			$output .= '@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { #header .std-logo, .sticky-header .std-logo { display: none !important; } #header .retina-logo, .sticky-header .retina-logo { display: inline !important; } }';
		}
		
		// Header Ad
		$header_ad_space_top_margin = tps_get_option('header_ad_space_top_margin');
		if( $header_ad_space_top_margin ) {
			$output .= '.header-ad { margin-top: '. intval($header_ad_space_top_margin) .'px; }';
		}
		
		$header_ad_space_bottom_margin = tps_get_option('header_ad_space_bottom_margin');
		if( $header_ad_space_bottom_margin ) {
			$output .= '.header-ad { margin-bottom: '. intval($header_ad_space_bottom_margin) .'px; }';
		}
		
		// Header Height - Version 2
		$header_v2_height = tps_get_option('header_v2_height');
		$header_v2_line_height = intval($header_v2_height) - 2;
		if( $header_v2_height ) {
			$output .= '.header-style-two .primary-menu > li > a { height: '. intval($header_v2_height) .'px; line-height: '. intval($header_v2_line_height) .'px; }';
			$output .= '.header-style-two .header-search-btn { line-height: '. intval($header_v2_height) .'px; }';
		}
		
        /**
            Sticky Header
        **/
		
		// Sticky Header Logo
		$sticky_logo_top_margin = tps_get_option('sticky_logo_top_margin');
		if( $sticky_logo_top_margin ) {
			$output .= '.sticky-header .logo { margin-top: '. intval($sticky_logo_top_margin) .'px; }';
		}
		
		$sticky_logo_bottom_margin = tps_get_option('sticky_logo_bottom_margin');
		if( $sticky_logo_bottom_margin ) {
			$output .= '.sticky-header .logo { margin-bottom: '. intval($sticky_logo_bottom_margin) .'px; }';
		}
		
		// Sticky Header Height
		$sticky_header_height = tps_get_option('sticky_header_height');
		$sticky_header_line_height = intval($sticky_header_height) - 2;
		if( $sticky_header_height ) {
			$output .= '.sticky-header .sticky-menu > li > a { height: '. intval($sticky_header_height) .'px; line-height: '. intval($sticky_header_line_height) .'px; }';
			$output .= '.sticky-header .sticky-header-search-btn { line-height: '. intval($sticky_header_height) .'px; }';
		}
		
        /**
            Styling - General
        **/
		
		// Primary Color
		$primary_color = tps_get_option('theme_primary_color');
		if( $primary_color ) {
			$output .= 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, blockquote:before, .related-post-title a:hover, .related-post-meta a:hover, .post-format-icon > i, .author-box .author-title a:hover, .comment-list .comment-meta .url:hover, .comment-list .comment-meta a:hover, #cancel-comment-reply-link:hover, .comment-navigation a:hover, .posts-navigation a:hover, .post-navigation a:hover, .post-navigation a:hover h3, #wp-calendar tbody td:hover, .sidebar-widget #wp-calendar tbody td a, .btn-primary.btn-outlined, .themepixels-tabs .nav-tabs > li.active > a, .themepixels-tooltip { color: '. $primary_color .'; }';
			$output .= 'blockquote, .post-format-icon > i, .form-control:focus, .btn-primary.btn-outlined, .tabs-widget .tabs-widget-nav > li > a:hover, .tabs-widget .tabs-widget-nav > li > a:focus, .tabs-widget .tabs-widget-nav > li.active > a, .tabs-widget .tabs-widget-nav > li.active > a:hover, .tabs-widget .tabs-widget-nav > li.active > a:focus { border-color: '. $primary_color .'; }';
			$output .= '.featured-slider .featured-post-cats > a, .read-more a, .page-links a:hover, .page-links > span, .tagcloud a, .featured-slider .owl-nav [class*="owl-"]:hover, .featured-slider .owl-dots .owl-dot.active span, .featured-slider .owl-dots .owl-dot:hover span, .scroll-to-top:hover, .btn-primary, .sidr-primary-close, .flex-control-paging li a:hover, .flex-control-paging li a.flex-active, .skill-bar-wrapper.skill-bar-primary .skill-bar-bar, .themepixels-tabs .nav-tabs > li.active > a:after, .featured-carousel .featured-post-cats > a, .featured-carousel .owl-nav [class*="owl-"]:hover, .featured-carousel .owl-dots .owl-dot.active span, .featured-carousel .owl-dots .owl-dot:hover span, .spinner > div { background-color: '. $primary_color .'; }';
		}
		
		// Body Background
		if( tps_get_option('body_background_type') == 'pattern' ) {
			$body_pattern_background_color = tps_get_option('body_pattern_background_color');
			if( $body_pattern_background_color ) {
				$output .= 'body { background-color: '. $body_pattern_background_color .'; }';
			}
			$body_background_pattern = tps_get_option('body_background_pattern');
			if( $body_background_pattern ) {
				$output .= 'body { background-image: url('. $body_background_pattern .'); background-repeat: repeat; }';
			}
		} elseif( tps_get_option('body_background_type') == 'custom' ) {
			$body_background_color = tps_get_option('body_custom_background', 'background-color');
			$body_background_image = tps_get_option('body_custom_background', 'background-image');
			$body_background_repeat = tps_get_option('body_custom_background', 'background-repeat');
			$body_background_size = tps_get_option('body_custom_background', 'background-size');
			$body_background_attachment = tps_get_option('body_custom_background', 'background-attachment');
			$body_background_position = tps_get_option('body_custom_background', 'background-position');
			if ( $body_background_image ) {
				$output .= 'body { background-image: url('. $body_background_image .'); }';
			}
			if ( $body_background_repeat ) {
				$output .= 'body { background-repeat:'. $body_background_repeat .'; }';
			}
			if ( $body_background_size ) {
				$output .= 'body { -webkit-background-size:'. $body_background_size .'; background-size:'. $body_background_size .'; }';
			}
			if ( $body_background_attachment ) {
				$output .= 'body { background-attachment:'. $body_background_attachment .'; }';
			}
			if ( $body_background_position ) {
				$output .= 'body { background-position:'. $body_background_position .'; }';
			}
			if ( $body_background_image && $body_background_color ) {
				$output .= 'body { background-color:'. $body_background_color .'; }';
			} elseif ( empty( $body_background_image ) && $body_background_color ) {
				$output .= 'body { background:'. $body_background_color .'; }';
			}
		}
		
		// Body Text
		$body_text_color = tps_get_option('body_text_color');
		if( $body_text_color ) {
			$output .= 'body { color: '. $body_text_color .'; }';
		}
		
		// Link Color
		$body_link_color_regular = tps_get_option('body_link_color', 'regular');
		$body_link_color_hover = tps_get_option('body_link_color', 'hover');
		if( $body_link_color_regular ) {
			$output .= 'body a, .sitemap-col li a:before, .sitemap-col li a { color: '. $body_link_color_regular .'; }';
		}
		if( $body_link_color_hover ) {
			$output .= 'body a:hover, body a:focus, .sitemap-col li a:hover { color: '. $body_link_color_hover .'; }';
		}
		
		// Headings
		$h1_heading_text_color = tps_get_option('h1_heading_text_color');
		$h2_heading_text_color = tps_get_option('h2_heading_text_color');
		$h3_heading_text_color = tps_get_option('h3_heading_text_color');
		$h4_heading_text_color = tps_get_option('h4_heading_text_color');
		$h5_heading_text_color = tps_get_option('h5_heading_text_color');
		$h6_heading_text_color = tps_get_option('h6_heading_text_color');
		if( $h1_heading_text_color ) {
			$output .= 'h1 { color: '. $h1_heading_text_color .'; }';
		}
		if( $h2_heading_text_color ) {
			$output .= 'h2 { color: '. $h2_heading_text_color .'; }';
		}
		if( $h3_heading_text_color ) {
			$output .= 'h3 { color: '. $h3_heading_text_color .'; }';
		}
		if( $h4_heading_text_color ) {
			$output .= 'h4 { color: '. $h4_heading_text_color .'; }';
		}
		if( $h5_heading_text_color ) {
			$output .= 'h5 { color: '. $h5_heading_text_color .'; }';
		}
		if( $h6_heading_text_color ) {
			$output .= 'h6 { color: '. $h6_heading_text_color .'; }';
		}
		
        /**
            Styling - Topbar
        **/
		
		// Topbar Background
		$top_bar_background = tps_get_option('top_bar_background');
		if( $top_bar_background ) {
			$output .= '.top-bar-wrapper { background: '. $top_bar_background .'; }';
		}
		
		// Topbar Text Color
		$top_bar_text_color = tps_get_option('top_bar_text_color');
		if( $top_bar_text_color ) {
			$output .= '.top-bar-left, .top-bar-right { color: '. $top_bar_text_color .'; }';
		}
		
		// Topbar Link Color
		$top_bar_link_color_regular = tps_get_option('top_bar_link_color', 'regular');
		$top_bar_link_color_hover = tps_get_option('top_bar_link_color', 'hover');
		if( $top_bar_link_color_regular ) {
			$output .= '.top-bar-left a, .top-bar-right a { color: '. $top_bar_link_color_regular .'; }';
		}
		if( $top_bar_link_color_hover ) {
			$output .= '.top-bar-left a:hover, .top-bar-right a:hover { color: '. $top_bar_link_color_hover .'; }';
		}
		
		// Search Icon Background
		$top_bar_search_background = tps_get_option('top_bar_search_background');
		$top_bar_search_background_hover = tps_get_option('top_bar_search_background_hover');
		if( $top_bar_search_background ) {
			$output .= '.top-bar-search-icon > a { background-color: '. $top_bar_search_background .'; }';
		}
		if( $top_bar_search_background_hover ) {
			$output .= '.top-bar-search-icon > a:hover { background-color: '. $top_bar_search_background_hover .'; }';
		}
		
		// Search Icon Color
		$top_bar_search_icon_color_regular = tps_get_option('top_bar_search_icon_color', 'regular');
		$top_bar_search_icon_color_hover = tps_get_option('top_bar_search_icon_color', 'hover');
		if( $top_bar_search_icon_color_regular ) {
			$output .= '.top-bar-search-icon > a { color: '. $top_bar_search_icon_color_regular .'; }';
		}
		if( $top_bar_search_icon_color_hover ) {
			$output .= '.top-bar-search-icon > a:hover { color: '. $top_bar_search_icon_color_hover .'; }';
		}
		
		// Topbar Social Icons Background
		$top_bar_social_icon_background = tps_get_option('top_bar_social_icon_background');
		if( $top_bar_social_icon_background ) {
			$output .= '.top-bar-wrapper .top-bar-social .social-icons li a { background-color: '. $top_bar_social_icon_background .'; }';
		}
		
		// Topbar Social Icons Color
		$top_bar_social_icon_color = tps_get_option('top_bar_social_icon_color');
		if( $top_bar_social_icon_color ) {
			$output .= '.top-bar-wrapper .top-bar-social .social-icons li a i:last-child { color: '. $top_bar_social_icon_color .'; }';
		}
		
        /**
            Styling - Header
        **/
		
		// Header Background
		$header_background_color = tps_get_option('header_background', 'background-color');
		$header_background_image = tps_get_option('header_background', 'background-image');
		$header_background_repeat = tps_get_option('header_background', 'background-repeat');
		$header_background_size = tps_get_option('header_background', 'background-size');
		$header_background_attachment = tps_get_option('header_background', 'background-attachment');
		$header_background_position = tps_get_option('header_background', 'background-position');
		if ( $header_background_image ) {
			$output .= '#header { background-image: url('. $header_background_image .'); }';
		}
		if ( $header_background_repeat ) {
			$output .= '#header { background-repeat:'. $header_background_repeat .'; }';
		}
		if ( $header_background_size ) {
			$output .= '#header { -webkit-background-size:'. $header_background_size .'; background-size:'. $header_background_size .'; }';
		}
		if ( $header_background_attachment ) {
			$output .= '#header { background-attachment:'. $header_background_attachment .'; }';
		}
		if ( $header_background_position ) {
			$output .= '#header { background-position:'. $header_background_position .'; }';
		}
		if ( $header_background_image && $header_background_color ) {
			$output .= '#header { background-color:'. $header_background_color .'; }';
		} elseif ( empty( $header_background_image ) && $header_background_color ) {
			$output .= '#header { background:'. $header_background_color .'; }';
		}
		
		// Header Search Icon Color
		$header_search_icon_color_regular = tps_get_option('header_search_icon_color', 'regular');
		$header_search_icon_color_hover = tps_get_option('header_search_icon_color', 'hover');
		if( $header_search_icon_color_regular ) {
			$output .= '.header-style-one .header-search-btn, .header-style-two .header-search-btn, .header-style-three .header-search-btn { color: '. $header_search_icon_color_regular .'; }';
		}
		if( $header_search_icon_color_hover ) {
			$output .= '.header-style-one .header-search-btn:hover, .header-style-two .header-search-btn:hover, .header-style-three .header-search-btn:hover { color: '. $header_search_icon_color_hover .'; }';
		}
		
        /**
            Styling - Sticky Header
        **/
		
		// Header Background
		$sticky_header_background_color = tps_get_option('sticky_header_background', 'background-color');
		$sticky_header_background_image = tps_get_option('sticky_header_background', 'background-image');
		$sticky_header_background_repeat = tps_get_option('sticky_header_background', 'background-repeat');
		$sticky_header_background_size = tps_get_option('sticky_header_background', 'background-size');
		$sticky_header_background_attachment = tps_get_option('sticky_header_background', 'background-attachment');
		$sticky_header_background_position = tps_get_option('sticky_header_background', 'background-position');
		if ( $sticky_header_background_image ) {
			$output .= '.sticky-header { background-image: url('. $sticky_header_background_image .'); }';
		}
		if ( $sticky_header_background_repeat ) {
			$output .= '.sticky-header { background-repeat:'. $sticky_header_background_repeat .'; }';
		}
		if ( $sticky_header_background_size ) {
			$output .= '.sticky-header { -webkit-background-size:'. $sticky_header_background_size .'; background-size:'. $sticky_header_background_size .'; }';
		}
		if ( $sticky_header_background_attachment ) {
			$output .= '.sticky-header { background-attachment:'. $sticky_header_background_attachment .'; }';
		}
		if ( $sticky_header_background_position ) {
			$output .= '.sticky-header { background-position:'. $sticky_header_background_position .'; }';
		}
		if ( $sticky_header_background_image && $sticky_header_background_color ) {
			$output .= '.sticky-header { background-color:'. $sticky_header_background_color .'; }';
		} elseif ( empty( $sticky_header_background_image ) && $sticky_header_background_color ) {
			$output .= '.sticky-header { background:'. $sticky_header_background_color .'; }';
		}
		
		// Header Search Icon Color
		$sticky_header_search_icon_color_regular = tps_get_option('sticky_header_search_icon_color', 'regular');
		$sticky_header_search_icon_color_hover = tps_get_option('sticky_header_search_icon_color', 'hover');
		if( $sticky_header_search_icon_color_regular ) {
			$output .= '.sticky-header .sticky-header-search-btn { color: '. $sticky_header_search_icon_color_regular .'; }';
		}
		if( $sticky_header_search_icon_color_hover ) {
			$output .= '.sticky-header .sticky-header-search-btn:hover { color: '. $sticky_header_search_icon_color_hover .'; }';
		}
		
        /**
            Styling - Navigation
        **/
		
		// Top Menu Border Color
		$top_menu_border_color = tps_get_option('top_menu_border_color');
		if( $top_menu_border_color ) {
			$output .= '.top-menu > li > a, .top-menu > li:first-child > a { border-color: '. $top_menu_border_color .'; }';
		}
		
		// Top Menu Link Color
		$top_menu_link_color_regular = tps_get_option('top_menu_link_color', 'regular');
		$top_menu_link_color_hover = tps_get_option('top_menu_link_color', 'hover');
		if( $top_menu_link_color_regular ) {
			$output .= '.top-menu > li > a { color: '. $top_menu_link_color_regular .'; }';
		}
		if( $top_menu_link_color_hover ) {
			$output .= '.top-menu > li > a:hover, .top-menu > li.sfHover > a { color: '. $top_menu_link_color_hover .'; }';
		}
		
		// Top Menu Current Link Color
		$top_menu_current_link_color = tps_get_option('top_menu_current_link_color');
		if( $top_menu_current_link_color ) {
			$output .= '.top-menu > li.current-menu-item > a, .top-menu > li.current-menu-ancestor > a { color: '. $top_menu_current_link_color .' !important; }';
		}
		
		// Primary Menu Link Color
		$primary_menu_link_color_regular = tps_get_option('primary_menu_link_color', 'regular');
		$primary_menu_link_color_hover = tps_get_option('primary_menu_link_color', 'hover');
		if( $primary_menu_link_color_regular ) {
			$output .= '.header-style-one .primary-menu > li > a, .header-style-two .primary-menu > li > a, .header-style-three .primary-menu > li > a { color: '. $primary_menu_link_color_regular .'; }';
		}
		if( $primary_menu_link_color_hover ) {
			$output .= '.header-style-one .primary-menu > li > a:hover, .header-style-one .primary-menu > li.sfHover > a, .header-style-two .primary-menu > li > a:hover, .header-style-two .primary-menu > li.sfHover > a, .header-style-three .primary-menu > li > a:hover, .header-style-three .primary-menu > li.sfHover > a { color: '. $primary_menu_link_color_hover .'; }';
		}
		
		// Primary Menu Link Hover Border Color
		$primary_menu_link_hover_border_color = tps_get_option('primary_menu_link_hover_border_color');
		if( $primary_menu_link_hover_border_color ) {
			$output .= '.header-style-one .primary-menu > li > a:hover, .header-style-one .primary-menu > li.sfHover > a, .header-style-two .primary-menu > li > a:hover, .header-style-two .primary-menu > li.sfHover > a, .header-style-three .primary-menu > li > a:hover, .header-style-three .primary-menu > li.sfHover > a { border-color: '. $primary_menu_link_hover_border_color .'; }';
		}
		
		// Primary Menu Current Link Color
		$primary_menu_current_link_color = tps_get_option('primary_menu_current_link_color');
		if( $primary_menu_current_link_color ) {
			$output .= '.header-style-one .primary-menu > li.current-menu-item > a, .header-style-one .primary-menu > li.current-menu-ancestor > a, .header-style-two .primary-menu > li.current-menu-item > a, .header-style-two .primary-menu > li.current-menu-ancestor > a, .header-style-three .primary-menu > li.current-menu-item > a, .header-style-three .primary-menu > li.current-menu-ancestor > a { color: '. $primary_menu_current_link_color .' !important; }';
		}
		
		// Primary Menu Current Link Border Color
		$primary_menu_current_link_border_color = tps_get_option('primary_menu_current_link_border_color');
		if( $primary_menu_current_link_border_color ) {
			$output .= '.header-style-one .primary-menu > li.current-menu-item > a, .header-style-one .primary-menu > li.current-menu-ancestor > a, .header-style-two .primary-menu > li.current-menu-item > a, .header-style-two .primary-menu > li.current-menu-ancestor > a, .header-style-three .primary-menu > li.current-menu-item > a, .header-style-three .primary-menu > li.current-menu-ancestor > a { border-color: '. $primary_menu_current_link_border_color .'; }';
		}
		
		// Sticky Menu Link Color
		$sticky_menu_link_color_regular = tps_get_option('sticky_menu_link_color', 'regular');
		$sticky_menu_link_color_hover = tps_get_option('sticky_menu_link_color', 'hover');
		if( $sticky_menu_link_color_regular ) {
			$output .= '.sticky-header .sticky-menu > li > a { color: '. $sticky_menu_link_color_regular .'; }';
		}
		if( $sticky_menu_link_color_hover ) {
			$output .= '.sticky-header .sticky-menu > li > a:hover, .sticky-header .sticky-menu > li.sfHover > a { color: '. $sticky_menu_link_color_hover .'; }';
		}
		
		// Sticky Menu Link Hover Border Color
		$sticky_menu_link_hover_border_color = tps_get_option('sticky_menu_link_hover_border_color');
		if( $sticky_menu_link_hover_border_color ) {
			$output .= '.sticky-header .sticky-menu > li > a:hover, .sticky-header .sticky-menu > li.sfHover > a { border-color: '. $sticky_menu_link_hover_border_color .'; }';
		}
		
		// Sticky Menu Current Link Color
		$sticky_menu_current_link_color = tps_get_option('sticky_menu_current_link_color');
		if( $sticky_menu_current_link_color ) {
			$output .= '.sticky-header .sticky-menu > li.current-menu-item > a, .sticky-header .sticky-menu > li.current-menu-ancestor > a { color: '. $sticky_menu_current_link_color .' !important; }';
		}
		
		// Sticky Menu Current Link Border Color
		$sticky_menu_current_link_border_color = tps_get_option('sticky_menu_current_link_border_color');
		if( $sticky_menu_current_link_border_color ) {
			$output .= '.sticky-header .sticky-menu > li.current-menu-item > a, .sticky-header .sticky-menu > li.current-menu-ancestor > a { border-color: '. $sticky_menu_current_link_border_color .'; }';
		}
		
		// Dropdown Menu Top Border Color
		$dropdown_menu_top_border_color = tps_get_option('dropdown_menu_top_border_color');
		if( $dropdown_menu_top_border_color ) {
			$output .= '.sf-menu > .sf-normal-menu ul { border-color: '. $dropdown_menu_top_border_color .'; }';
		}
		
		// Dropdown Menu Background Color
		$dropdown_menu_background_color = tps_get_option('dropdown_menu_background_color');
		if( $dropdown_menu_background_color ) {
			$output .= '.sf-menu > .sf-normal-menu ul { background-color: '. $dropdown_menu_background_color .'; }';
		}
		
		// Dropdown Menu Link Color
		$dropdown_menu_link_color_regular = tps_get_option('dropdown_menu_link_color', 'regular');
		$dropdown_menu_link_color_hover = tps_get_option('dropdown_menu_link_color', 'hover');
		if( $dropdown_menu_link_color_regular ) {
			$output .= '.sf-menu > .sf-normal-menu ul a { color: '. $dropdown_menu_link_color_regular .'; }';
		}
		if( $dropdown_menu_link_color_hover ) {
			$output .= '.sf-menu > .sf-normal-menu ul a:hover { color: '. $dropdown_menu_link_color_hover .'; }';
		}
		
		// Dropdown Menu Link Hover Background Color
		$dropdown_menu_link_hover_background_color = tps_get_option('dropdown_menu_link_hover_background_color');
		if( $dropdown_menu_link_hover_background_color ) {
			$output .= '.sf-menu > .sf-normal-menu ul a:hover { background-color: '. $dropdown_menu_link_hover_background_color .'; }';
		}
		
		// Dropdown Menu Border Color
		$dropdown_menu_link_border_color = tps_get_option('dropdown_menu_link_border_color');
		if( $dropdown_menu_link_border_color ) {
			$output .= '.sf-menu > .sf-normal-menu ul a { border-color: '. $dropdown_menu_link_border_color .'; }';
		}
		
		// Dropdown Megamenu Top Border Color
		$megamenu_top_border_color = tps_get_option('megamenu_top_border_color');
		if( $megamenu_top_border_color ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner { border-color: '. $megamenu_top_border_color .'; }';
		}
		
		// Dropdown Megamenu Background Color
		$megamenu_background_color = tps_get_option('megamenu_background_color');
		if( $megamenu_background_color ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner { background-color: '. $megamenu_background_color .'; }';
		}
		
		// Dropdown Megamenu Column Border Color
		$megamenu_column_border_color = tps_get_option('megamenu_column_border_color');
		if( $megamenu_column_border_color ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column { border-color: '. $megamenu_column_border_color .'; }';
		}
		
		// Dropdown Megamenu Column Title Color
		$megamenu_column_title_color_regular = tps_get_option('megamenu_column_title_color', 'regular');
		$megamenu_column_title_color_hover = tps_get_option('megamenu_column_title_color', 'hover');
		if( $megamenu_column_title_color_regular ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column .megamenu-title { color: '. $megamenu_column_title_color_regular .'; }';
		}
		if( $megamenu_column_title_color_hover ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column .megamenu-title:hover { color: '. $megamenu_column_title_color_hover .'; }';
		}
		
		// Dropdown Megamenu Link Color
		$megamenu_link_color_regular = tps_get_option('megamenu_link_color', 'regular');
		$megamenu_link_color_hover = tps_get_option('megamenu_link_color', 'hover');
		if( $megamenu_link_color_regular ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column ul a { color: '. $megamenu_link_color_regular .'; }';
		}
		if( $megamenu_link_color_hover ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column ul a:hover { color: '. $megamenu_link_color_hover .'; }';
		}
		
		// Dropdown Megamenu Link Hover Background Color
		$megamenu_link_hover_background_color = tps_get_option('megamenu_link_hover_background_color');
		if( $megamenu_link_hover_background_color ) {
			$output .= '.sf-menu > .sf-megamenu .sf-megamenu-inner .megamenu-column ul a:hover { background-color: '. $megamenu_link_hover_background_color .'; }';
		}
		
		// Top Mobile Menu Background Color
		$top_mobile_menu_background_color = tps_get_option('top_mobile_menu_background_color');
		if( $top_mobile_menu_background_color ) {
			$output .= '.top-mobile-navigation { background-color: '. $top_mobile_menu_background_color .'; }';
		}
		
		// Top Mobile Menu Link Background Color
		$top_mobile_menu_link_background_color = tps_get_option('top_mobile_menu_link_background_color');
		if( $top_mobile_menu_link_background_color ) {
			$output .= '.top-mobile-menu li a { background-color: '. $top_mobile_menu_link_background_color .'; }';
		}
		
		// Top Mobile Menu Link Color
		$top_mobile_menu_link_color_regular = tps_get_option('top_mobile_menu_link_color', 'regular');
		$top_mobile_menu_link_color_hover = tps_get_option('top_mobile_menu_link_color', 'hover');
		if( $top_mobile_menu_link_color_regular ) {
			$output .= '.top-mobile-menu li a, .top-submenu-toggle { color: '. $top_mobile_menu_link_color_regular .'; }';
		}
		if( $top_mobile_menu_link_color_hover ) {
			$output .= '.top-mobile-menu li a:hover, .top-submenu-toggle:hover { color: '. $top_mobile_menu_link_color_hover .'; }';
		}
		
		// Primary Mobile Menu Background Color
		$primary_mobile_menu_background_color = tps_get_option('primary_mobile_menu_background_color');
		if( $primary_mobile_menu_background_color ) {
			$output .= '.sidr { background-color: '. $primary_mobile_menu_background_color .'; }';
		}
		
		// Primary Mobile Menu Link Color
		$primary_mobile_menu_link_color_regular = tps_get_option('primary_mobile_menu_link_color', 'regular');
		$primary_mobile_menu_link_color_hover = tps_get_option('primary_mobile_menu_link_color', 'hover');
		if( $primary_mobile_menu_link_color_regular ) {
			$output .= '.primary-mobile-menu li a, .primary-submenu-toggle { color: '. $primary_mobile_menu_link_color_regular .'; }';
		}
		if( $primary_mobile_menu_link_color_hover ) {
			$output .= '.primary-mobile-menu li a:hover, .primary-submenu-toggle:hover { color: '. $primary_mobile_menu_link_color_hover .'; }';
		}
		
		// Primary Mobile Menu Link Border Color
		$primary_mobile_menu_link_border_color = tps_get_option('primary_mobile_menu_link_border_color');
		if( $primary_mobile_menu_link_border_color ) {
			$output .= '.primary-mobile-menu li a { border-color: '. $primary_mobile_menu_link_border_color .'; }';
		}
		
        /**
            Styling - Content Area
        **/
		
		// Content Area Background
		$content_area_background_color = tps_get_option('content_area_background', 'background-color');
		$content_area_background_image = tps_get_option('content_area_background', 'background-image');
		$content_area_background_repeat = tps_get_option('content_area_background', 'background-repeat');
		$content_area_background_size = tps_get_option('content_area_background', 'background-size');
		$content_area_background_attachment = tps_get_option('content_area_background', 'background-attachment');
		$content_area_background_position = tps_get_option('content_area_background', 'background-position');
		if ( $content_area_background_image ) {
			$output .= '.boxed #wrapper { background-image: url('. $content_area_background_image .'); }';
		}
		if ( $content_area_background_repeat ) {
			$output .= '.boxed #wrapper { background-repeat:'. $content_area_background_repeat .'; }';
		}
		if ( $content_area_background_size ) {
			$output .= '.boxed #wrapper { -webkit-background-size:'. $content_area_background_size .'; background-size:'. $content_area_background_size .'; }';
		}
		if ( $content_area_background_attachment ) {
			$output .= '.boxed #wrapper { background-attachment:'. $content_area_background_attachment .'; }';
		}
		if ( $content_area_background_position ) {
			$output .= '.boxed #wrapper { background-position:'. $content_area_background_position .'; }';
		}
		if ( $content_area_background_image && $content_area_background_color ) {
			$output .= '.boxed #wrapper { background-color:'. $content_area_background_color .'; }';
		} elseif ( empty( $content_area_background_image ) && $content_area_background_color ) {
			$output .= '.boxed #wrapper { background:'. $content_area_background_color .'; }';
		}
		
		// Post Box Background
		$post_box_background_color = tps_get_option('post_box_background', 'background-color');
		$post_box_background_image = tps_get_option('post_box_background', 'background-image');
		$post_box_background_repeat = tps_get_option('post_box_background', 'background-repeat');
		$post_box_background_size = tps_get_option('post_box_background', 'background-size');
		$post_box_background_attachment = tps_get_option('post_box_background', 'background-attachment');
		$post_box_background_position = tps_get_option('post_box_background', 'background-position');
		if ( $post_box_background_image ) {
			$output .= '.post-box { background-image: url('. $post_box_background_image .'); }';
		}
		if ( $post_box_background_repeat ) {
			$output .= '.post-box { background-repeat:'. $post_box_background_repeat .'; }';
		}
		if ( $post_box_background_size ) {
			$output .= '.post-box { -webkit-background-size:'. $post_box_background_size .'; background-size:'. $post_box_background_size .'; }';
		}
		if ( $post_box_background_attachment ) {
			$output .= '.post-box { background-attachment:'. $post_box_background_attachment .'; }';
		}
		if ( $post_box_background_position ) {
			$output .= '.post-box { background-position:'. $post_box_background_position .'; }';
		}
		if ( $post_box_background_image && $post_box_background_color ) {
			$output .= '.post-box { background-color:'. $post_box_background_color .'; }';
		} elseif ( empty( $post_box_background_image ) && $post_box_background_color ) {
			$output .= '.post-box { background:'. $post_box_background_color .'; }';
		}
		
		// Post Box Outer Border Color
		$post_box_outer_border_color = tps_get_option('post_box_outer_border_color');
		if( $post_box_outer_border_color ) {
			$output .= '.post-box, .post-header, .post-footer, .post-footer .social-icons li { border-color: '. $post_box_outer_border_color .'; }';
		}
		
		// Post Title Color
		$post_box_title_color_regular = tps_get_option('post_box_title_color', 'regular');
		$post_box_title_color_hover = tps_get_option('post_box_title_color', 'hover');
		if( $post_box_title_color_regular ) {
			$output .= '.post-box .post-title, .post-box .post-title a { color: '. $post_box_title_color_regular .'; }';
		}
		if( $post_box_title_color_hover ) {
			$output .= '.post-box .post-title a:hover { color: '. $post_box_title_color_hover .'; }';
		}
		
		// Post Meta Color
		$post_box_meta_color_regular = tps_get_option('post_box_meta_color', 'regular');
		$post_box_meta_color_hover = tps_get_option('post_box_meta_color', 'hover');
		if( $post_box_meta_color_regular ) {
			$output .= '.post-meta, .post-meta a, .post-meta-footer a { color: '. $post_box_meta_color_regular .'; }';
		}
		if( $post_box_meta_color_hover ) {
			$output .= '.post-meta a:hover, .post-meta-footer a:hover, a.tp-post-like:hover, a.tp-post-like:active, a.tp-post-like:focus, a.liked:hover, a.liked:active, a.liked:focus { color: '. $post_box_meta_color_hover .'; }';
		}
		
		// Post Box Footer Social Icons Background
		$post_box_social_icon_background = tps_get_option('post_box_social_icon_background');
		if( $post_box_social_icon_background ) {
			$output .= '.post-footer .social-icons li a { background-color: '. $post_box_social_icon_background .'; }';
		}
		
		// Post Box Footer Social Icons Color
		$post_box_social_icon_color = tps_get_option('post_box_social_icon_color');
		if( $post_box_social_icon_color ) {
			$output .= '.post-footer .social-icons li a i:last-child { color: '. $post_box_social_icon_color .'; }';
		}
		
		// Numbered Pagination Background Color
		$post_numbered_pagination_background_color_regular = tps_get_option('post_numbered_pagination_background_color', 'regular');
		$post_numbered_pagination_background_color_hover = tps_get_option('post_numbered_pagination_background_color', 'hover');
		$post_numbered_pagination_background_color_active = tps_get_option('post_numbered_pagination_background_color', 'active');
		if( $post_numbered_pagination_background_color_regular ) {
			$output .= '.page-numbers span, .page-numbers a { background-color: '. $post_numbered_pagination_background_color_regular .'; }';
		}
		if( $post_numbered_pagination_background_color_hover ) {
			$output .= '.page-numbers a:hover { background-color: '. $post_numbered_pagination_background_color_hover .'; }';
		}
		if( $post_numbered_pagination_background_color_active ) {
			$output .= '.page-numbers .current { background-color: '. $post_numbered_pagination_background_color_active .'; }';
		}
		
		// Numbered Pagination Text Color
		$post_numbered_pagination_text_color_regular = tps_get_option('post_numbered_pagination_text_color', 'regular');
		$post_numbered_pagination_text_color_hover = tps_get_option('post_numbered_pagination_text_color', 'hover');
		$post_numbered_pagination_text_color_active = tps_get_option('post_numbered_pagination_text_color', 'active');
		if( $post_numbered_pagination_text_color_regular ) {
			$output .= '.page-numbers span, .page-numbers a { color: '. $post_numbered_pagination_text_color_regular .'; }';
		}
		if( $post_numbered_pagination_text_color_hover ) {
			$output .= '.page-numbers a:hover { color: '. $post_numbered_pagination_text_color_hover .'; }';
		}
		if( $post_numbered_pagination_text_color_active ) {
			$output .= '.page-numbers .current { color: '. $post_numbered_pagination_text_color_active .'; }';
		}
		
        /**
            Styling - Sidebar
        **/
		
		// Sidebar Widget Box Background
		$sidebar_widgets_background_color = tps_get_option('sidebar_widgets_background', 'background-color');
		$sidebar_widgets_background_image = tps_get_option('sidebar_widgets_background', 'background-image');
		$sidebar_widgets_background_repeat = tps_get_option('sidebar_widgets_background', 'background-repeat');
		$sidebar_widgets_background_size = tps_get_option('sidebar_widgets_background', 'background-size');
		$sidebar_widgets_background_attachment = tps_get_option('sidebar_widgets_background', 'background-attachment');
		$sidebar_widgets_background_position = tps_get_option('sidebar_widgets_background', 'background-position');
		if ( $sidebar_widgets_background_image ) {
			$output .= '.sidebar-widget { background-image: url('. $sidebar_widgets_background_image .'); }';
		}
		if ( $sidebar_widgets_background_repeat ) {
			$output .= '.sidebar-widget { background-repeat:'. $sidebar_widgets_background_repeat .'; }';
		}
		if ( $sidebar_widgets_background_size ) {
			$output .= '.sidebar-widget { -webkit-background-size:'. $sidebar_widgets_background_size .'; background-size:'. $sidebar_widgets_background_size .'; }';
		}
		if ( $sidebar_widgets_background_attachment ) {
			$output .= '.sidebar-widget { background-attachment:'. $sidebar_widgets_background_attachment .'; }';
		}
		if ( $sidebar_widgets_background_position ) {
			$output .= '.sidebar-widget { background-position:'. $sidebar_widgets_background_position .'; }';
		}
		if ( $sidebar_widgets_background_image && $sidebar_widgets_background_color ) {
			$output .= '.sidebar-widget { background-color:'. $sidebar_widgets_background_color .'; }';
		} elseif ( empty( $sidebar_widgets_background_image ) && $sidebar_widgets_background_color ) {
			$output .= '.sidebar-widget { background:'. $sidebar_widgets_background_color .'; }';
		}
		
		// Sidebar Widget Box Outer Border Color
		$sidebar_widgets_outer_border_color = tps_get_option('sidebar_widgets_outer_border_color');
		if( $sidebar_widgets_outer_border_color ) {
			$output .= '.sidebar-widget { border-color: '. $sidebar_widgets_outer_border_color .'; }';
		}
		
		// Sidebar Widget Box Title Color
		$sidebar_widgets_title_color = tps_get_option('sidebar_widgets_title_color');
		if( $sidebar_widgets_title_color ) {
			$output .= '.sidebar-widget .widget-title { color: '. $sidebar_widgets_title_color .'; }';
		}
		
		// Sidebar Widget Box Title Border Color
		$sidebar_widgets_title_border_color_regular = tps_get_option('sidebar_widgets_title_border_color', 'regular');
		$sidebar_widgets_title_border_color_hover = tps_get_option('sidebar_widgets_title_border_color', 'hover');
		if( $sidebar_widgets_title_border_color_regular ) {
			$output .= '.sidebar-widget .widget-title:before { border-color: '. $sidebar_widgets_title_border_color_regular .'; }';
		}
		if( $sidebar_widgets_title_border_color_hover ) {
			$output .= '.sidebar-widget .widget-title-inner:before, .sidebar-widget .widget-title-inner:after { border-color: '. $sidebar_widgets_title_border_color_hover .'; }';
		}
		
		// Sidebar Widget Box Text Color
		$sidebar_widgets_text_color = tps_get_option('sidebar_widgets_text_color');
		if( $sidebar_widgets_text_color ) {
			$output .= '.sidebar-widget, .sidebar-widget.widget_archive li:before, .sidebar-widget #wp-calendar caption, .sidebar-widget #wp-calendar thead th, .sidebar-widget.widget_recent_comments li, .sidebar-widget.widget_recent_entries li, .sidebar-widget .widget-post-meta, .sidebar-widget .widget-post-meta a, .sidebar-widget .tabs-comment-author-name, .tabs-widget .tabs-widget-nav > li > a, .tabs-widget .tabs-widget-nav > li > a:hover, .tabs-widget .tabs-widget-nav > li > a:focus, .tabs-widget .tabs-widget-nav > li.active > a, .tabs-widget .tabs-widget-nav > li.active > a:hover, .tabs-widget .tabs-widget-nav > li.active > a:focus { color: '. $sidebar_widgets_text_color .'; }';
		}
		
		// Sidebar Widget Box Link Color
		$sidebar_widgets_link_color_regular = tps_get_option('sidebar_widgets_link_color', 'regular');
		$sidebar_widgets_link_color_hover = tps_get_option('sidebar_widgets_link_color', 'hover');
		if( $sidebar_widgets_link_color_regular ) {
			$output .= '.sidebar-widget a, .sidebar-widget.widget_archive li, .sidebar-widget.widget_archive li:before, .sidebar-widget.widget_archive li a, .sidebar-widget #wp-calendar tfoot td a, .sidebar-widget.widget_categories li a:before, .sidebar-widget.widget_categories li a, .sidebar-widget.widget_pages li a:before, .sidebar-widget.widget_pages li a, .sidebar-widget.widget_meta li:before, .sidebar-widget.widget_meta li a, .sidebar-widget.widget_recent_comments li:before, .sidebar-widget.widget_recent_comments li a, .sidebar-widget.widget_recent_entries li:before, .sidebar-widget.widget_recent_entries li a, .sidebar-widget.widget_nav_menu li a:before, .sidebar-widget.widget_nav_menu li a, .sidebar-widget .widget-post-list .post-title, .sidebar-widget .widget-post-list .post-title a, .sidebar-widget .tabs-comment-text a { color: '. $sidebar_widgets_link_color_regular .'; }';
		}
		if( $sidebar_widgets_link_color_hover ) {
			$output .= '.sidebar-widget a:hover, .sidebar-widget a:focus, .sidebar-widget.widget_archive li a:hover, .sidebar-widget #wp-calendar tfoot td a:hover, .sidebar-widget.widget_categories li a:hover, .sidebar-widget.widget_pages li a:hover, .sidebar-widget.widget_meta li a:hover, .sidebar-widget.widget_recent_comments li a:hover, .sidebar-widget.widget_recent_entries li a:hover, .sidebar-widget.widget_nav_menu li a:hover, .sidebar-widget .widget-post-list .post-title a:hover, .sidebar-widget .widget-post-meta a:hover, .sidebar-widget .tabs-comment-text a:hover { color: '. $sidebar_widgets_link_color_hover .'; }';
		}
		
		// Sidebar Widget Box Border Color
		$sidebar_widgets_border_color = tps_get_option('sidebar_widgets_border_color');
		if( $sidebar_widgets_border_color ) {
			$output .= '.sidebar-widget.widget_archive li, .sidebar-widget #wp-calendar thead th, .sidebar-widget #wp-calendar tfoot td, .sidebar-widget #wp-calendar tbody td, .sidebar-widget.widget_categories li a, .sidebar-widget.widget_pages li a, .sidebar-widget.widget_meta li, .sidebar-widget.widget_recent_comments li, .sidebar-widget.widget_recent_entries li, .sidebar-widget.widget_nav_menu li a, .sidebar-widget .widget-post-list > li, .sidebar-widget.tabs-widget .tabs-widget-nav, .sidebar-widget.tabs-widget .tabs-widget-nav > li { border-color: '. $sidebar_widgets_border_color .'; }';
		}
		
        /**
            Styling - Footer
        **/
		
		// Footer Background
		$footer_background_color = tps_get_option('footer_background', 'background-color');
		$footer_background_image = tps_get_option('footer_background', 'background-image');
		$footer_background_repeat = tps_get_option('footer_background', 'background-repeat');
		$footer_background_size = tps_get_option('footer_background', 'background-size');
		$footer_background_attachment = tps_get_option('footer_background', 'background-attachment');
		$footer_background_position = tps_get_option('footer_background', 'background-position');
		if ( $footer_background_image ) {
			$output .= '#footer { background-image: url('. $footer_background_image .'); }';
		}
		if ( $footer_background_repeat ) {
			$output .= '#footer { background-repeat:'. $footer_background_repeat .'; }';
		}
		if ( $footer_background_size ) {
			$output .= '#footer { -webkit-background-size:'. $footer_background_size .'; background-size:'. $footer_background_size .'; }';
		}
		if ( $footer_background_attachment ) {
			$output .= '#footer { background-attachment:'. $footer_background_attachment .'; }';
		}
		if ( $footer_background_position ) {
			$output .= '#footer { background-position:'. $footer_background_position .'; }';
		}
		if ( $footer_background_image && $footer_background_color ) {
			$output .= '#footer { background-color:'. $footer_background_color .'; }';
		} elseif ( empty( $footer_background_image ) && $footer_background_color ) {
			$output .= '#footer { background:'. $footer_background_color .'; }';
		}
		
		// Footer Widget Title Color
		$footer_widget_title_color = tps_get_option('footer_widget_title_color');
		if( $footer_widget_title_color ) {
			$output .= '#footer h3.widget-title { color: '. $footer_widget_title_color .'; }';
		}
		
		// Footer Widget Text Color
		$footer_text_color = tps_get_option('footer_text_color');
		if( $footer_text_color ) {
			$output .= '.footer-widget, .footer-widget.widget_archive li, .footer-widget #wp-calendar caption, .footer-widget #wp-calendar thead th, .footer-widget.widget_recent_comments li, .footer-widget.widget_recent_entries li, .footer-widget .widget-post-meta, .footer-widget .widget-post-meta a, .footer-widget .tabs-comment-author-name, .footer-widget.tabs-widget .tabs-widget-nav > li > a, .footer-widget.tabs-widget .tabs-widget-nav > li > a:hover, .footer-widget.tabs-widget .tabs-widget-nav > li > a:focus, .footer-widget.tabs-widget .tabs-widget-nav > li.active > a, .footer-widget.tabs-widget .tabs-widget-nav > li.active > a:hover, .footer-widget.tabs-widget .tabs-widget-nav > li.active > a:focus { color: '. $footer_text_color .'; }';
		}
		
		// Footer Widget Link Color
		$footer_link_color_regular = tps_get_option('footer_link_color', 'regular');
		$footer_link_color_hover = tps_get_option('footer_link_color', 'hover');
		if( $footer_link_color_regular ) {
			$output .= '.footer-widget a, .footer-widget.widget_archive li:before, .footer-widget.widget_archive li, .footer-widget.widget_archive li a, .footer-widget #wp-calendar tfoot td a, .footer-widget.widget_categories li a:before, .footer-widget.widget_categories li a, .footer-widget.widget_pages li a:before, .footer-widget.widget_pages li a, .footer-widget.widget_meta li:before, .footer-widget.widget_meta li a, .footer-widget.widget_recent_comments li:before, .footer-widget.widget_recent_comments li a, .footer-widget.widget_recent_entries li:before, .footer-widget.widget_recent_entries li a, .footer-widget.widget_nav_menu li a:before, .footer-widget.widget_nav_menu li a, .footer-widget .widget-post-list .post-title, .footer-widget .widget-post-list .post-title a, .footer-widget .tabs-comment-text a { color: '. $footer_link_color_regular .'; }';
		}
		if( $footer_link_color_hover ) {
			$output .= '.footer-widget a:hover, .footer-widget a:focus, .footer-widget.widget_archive li a:hover, .footer-widget #wp-calendar tfoot td a:hover, .footer-widget.widget_categories li a:hover, .footer-widget.widget_pages li a:hover, .footer-widget.widget_meta li a:hover, .footer-widget.widget_recent_comments li a:hover, .footer-widget.widget_recent_entries li a:hover, .footer-widget.widget_nav_menu li a:hover, .footer-widget .widget-post-list .post-title a:hover, .footer-widget .widget-post-meta a:hover, .footer-widget .tabs-comment-text a:hover { color: '. $footer_link_color_hover .'; }';
		}
		
		// Footer Widget Border Color
		$footer_border_color = tps_get_option('footer_border_color');
		if( $footer_border_color ) {
			$output .= '.footer-widget.widget_archive li, .footer-widget #wp-calendar thead th, .footer-widget #wp-calendar tfoot td, .footer-widget #wp-calendar tbody td, .footer-widget.widget_categories li a, .footer-widget.widget_pages li a, .footer-widget.widget_meta li, .footer-widget.widget_recent_comments li, .footer-widget.widget_recent_entries li, .footer-widget.widget_nav_menu li a, .footer-widget .widget-post-list > li, .footer-widget .tabs-widget-wrapper, .footer-widget.tabs-widget .tabs-widget-nav, .footer-widget.tabs-widget .tabs-widget-nav > li { border-color: '. $footer_border_color .'; }';
		}
		
		// Footer Bottom Background
		$footer_bottom_background_color = tps_get_option('footer_bottom_background', 'background-color');
		$footer_bottom_background_image = tps_get_option('footer_bottom_background', 'background-image');
		$footer_bottom_background_repeat = tps_get_option('footer_bottom_background', 'background-repeat');
		$footer_bottom_background_size = tps_get_option('footer_bottom_background', 'background-size');
		$footer_bottom_background_attachment = tps_get_option('footer_bottom_background', 'background-attachment');
		$footer_bottom_background_position = tps_get_option('footer_bottom_background', 'background-position');
		if ( $footer_bottom_background_image ) {
			$output .= '.footer-bottom { background-image: url('. $footer_bottom_background_image .'); }';
		}
		if ( $footer_bottom_background_repeat ) {
			$output .= '.footer-bottom { background-repeat:'. $footer_bottom_background_repeat .'; }';
		}
		if ( $footer_bottom_background_size ) {
			$output .= '.footer-bottom { -webkit-background-size:'. $footer_bottom_background_size .'; background-size:'. $footer_bottom_background_size .'; }';
		}
		if ( $footer_bottom_background_attachment ) {
			$output .= '.footer-bottom { background-attachment:'. $footer_bottom_background_attachment .'; }';
		}
		if ( $footer_bottom_background_position ) {
			$output .= '.footer-bottom { background-position:'. $footer_bottom_background_position .'; }';
		}
		if ( $footer_bottom_background_image && $footer_bottom_background_color ) {
			$output .= '.footer-bottom { background-color:'. $footer_bottom_background_color .'; }';
		} elseif ( empty( $footer_bottom_background_image ) && $footer_bottom_background_color ) {
			$output .= '.footer-bottom { background:'. $footer_bottom_background_color .'; }';
		}
		
		// Footer Bottom Text Color
		$footer_bottom_text_color = tps_get_option('footer_bottom_text_color');
		if( $footer_bottom_text_color ) {
			$output .= '.copyright { color: '. $footer_bottom_text_color .'; }';
		}
		
		// Footer Widget Link Color
		$footer_bottom_link_color_regular = tps_get_option('footer_bottom_link_color', 'regular');
		$footer_bottom_link_color_hover = tps_get_option('footer_bottom_link_color', 'hover');
		if( $footer_bottom_link_color_regular ) {
			$output .= '.copyright a, .footer-menu a { color: '. $footer_bottom_link_color_regular .'; }';
		}
		if( $footer_bottom_link_color_hover ) {
			$output .= '.copyright a:hover, .footer-menu a:hover { color: '. $footer_bottom_link_color_hover .'; }';
		}
		
        /**
            Styling - Custom CSS
        **/
		
		// Custom CSS
		if( tps_get_option('global_custom_css') ) {
			$output .= tps_get_option('global_custom_css');
		}
		
        /**
            Single Page Styling
        **/
		
		// Body Background
		if ( is_singular() ) {
			global $post;

			$single_body_background_color = rwmb_meta( 'themepixels_page_background_color', '', get_the_ID() );
			$single_body_background_images = rwmb_meta( 'themepixels_page_background_image', '', get_the_ID() );
			$single_body_background_image = wp_get_attachment_image_src( $single_body_background_images, 'full' );
			$single_body_background_repeat = rwmb_meta( 'themepixels_page_background_repeat', '', get_the_ID() );
			$single_body_background_size = rwmb_meta( 'themepixels_page_background_size', '', get_the_ID() );
			$single_body_background_attachment = rwmb_meta( 'themepixels_page_background_attachment', '', get_the_ID() );
			$single_body_background_position = rwmb_meta( 'themepixels_page_background_position', '', get_the_ID() );

			if ( $single_body_background_image ) {
				$output .= 'body { background-image: url('. $single_body_background_image[0] .'); }';
			}
			if ( $single_body_background_repeat ) {
				$output .= 'body { background-repeat:'. $single_body_background_repeat .'; }';
			}
			if ( $single_body_background_size ) {
				$output .= 'body { -webkit-background-size:'. $single_body_background_size .'; background-size:'. $single_body_background_size .'; }';
			}
			if ( $single_body_background_attachment ) {
				$output .= 'body { background-attachment:'. $single_body_background_attachment .'; }';
			}
			if ( $single_body_background_position ) {
				$output .= 'body { background-position:'. $single_body_background_position .'; }';
			}
			if ( $single_body_background_image && $single_body_background_color ) {
				$output .= 'body { background-color:'. $single_body_background_color .'; }';
			} elseif ( empty( $single_body_background_image ) && $single_body_background_color ) {
				$output .= 'body { background:'. $single_body_background_color .'; }';
			}
		}

        /**
            CSS Output
        **/

		$dynamic_css = "<style type=\"text/css\">\n" . $output . "\n</style>\n";

		echo strip_tags( $dynamic_css, '<style>' );

	}
}