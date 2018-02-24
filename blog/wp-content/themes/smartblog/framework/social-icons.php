<?php
/**
 * Social Icons
 *
 * @package Smart Blog
 * @since 1.0
 */

if ( ! function_exists( 'themepixels_social_icons' ) ) {
	function themepixels_social_icons( $social_icon_options, $tooltip_pos, $before = '', $after = '', $style = '', $link_target = '' ) {

		$social_icon_links = $social_icon_options;

		$new_window = '';
		if( $link_target == 'true' ) {
			$new_window = ' target="_blank"';
		}

		$output = '';
		$output .= '<ul class="social-icons social-squared'. $style .'">';
			
			foreach ( $social_icon_links as $key => $value ) {
				
				if ( $key == 'twitter' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-twitter" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Twitter', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>';
				}
				
				if ( $key == 'facebook' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-facebook" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Facebook', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>';
				}
				
				if ( $key == 'google-plus' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-google-plus" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Google Plus', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>';
				}
				
				if ( $key == 'linkedin' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-linkedin" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Linkedin', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>';
				}
				
				if ( $key == 'dribbble' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-dribbble" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Dribbble', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-dribbble"></i><i class="fa fa-dribbble"></i></a></li>';
				}
				
				if ( $key == 'skype' && $value ) {
					$output .= '<li><a href="'. $value .'" class="social-skype" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Skype', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-skype"></i><i class="fa fa-skype"></i></a></li>';
				}
				
				if ( $key == 'github' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-github" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Github', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-github"></i><i class="fa fa-github"></i></a></li>';
				}
				
				if ( $key == 'foursquare' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-foursquare" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Foursquare', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-foursquare"></i><i class="fa fa-foursquare"></i></a></li>';
				}
				
				if ( $key == 'flickr' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-flickr" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Flickr', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-flickr"></i><i class="fa fa-flickr"></i></a></li>';
				}
				
				if ( $key == 'instagram' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-instagram" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Instagram', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-instagram"></i><i class="fa fa-instagram"></i></a></li>';
				}
				
				if ( $key == 'tumblr' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-tumblr" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Tumblr', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-tumblr"></i><i class="fa fa-tumblr"></i></a></li>';
				}
				
				if ( $key == 'pinterest' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-pinterest" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Pinterest', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i></a></li>';
				}
				
				if ( $key == 'youtube' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-youtube" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Youtube', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>';
				}
				
				if ( $key == 'vimeo' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-vimeo" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Vimeo', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-vimeo-square"></i><i class="fa fa-vimeo-square"></i></a></li>';
				}
				
				if ( $key == 'vk' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-vk" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'VK', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-vk"></i><i class="fa fa-vk"></i></a></li>';
				}
				
				if ( $key == 'rss' && $value ) {
					$output .= '<li><a href="'. esc_url($value) .'" class="social-rss" data-toggle="tooltip" data-placement="'. esc_attr( $tooltip_pos ) .'" title="'. __( 'Rss', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-rss"></i><i class="fa fa-rss"></i></a></li>';
				}
			
			}
			
		$output .= '</ul>';

		if ( ! empty( $output ) ) {
			$social_icons = $before . $output . $after;
		}

		echo strip_tags( $social_icons, '<ul><li><a><i><div>' );

	}
}