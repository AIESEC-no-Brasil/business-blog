<?php
/**
 * Post Share
 *
 * @package Smart Blog
 * @since 1.0
 */

if ( ! function_exists( 'themepixels_social_share' ) ) {
	function themepixels_social_share( $social_sharing_options ) {

		$social_sharing_links = $social_sharing_options;

		$new_window = '';
		if( tps_get_option('social_sharing_link_target') == '1' ) {
			$new_window = ' target="_blank"';
		}

		global $post;
		$link = get_permalink($post->ID);
		$title = the_title_attribute( 'echo=0' );
		$img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

		$output = '';
		$output .= '<ul class="social-icons social-squared">';
			
			foreach ( $social_sharing_links as $key => $value ) {
				
				if ( $key == 'facebook' && $value ) {
					$output .= '<li><a href="http://www.facebook.com/sharer.php?u='. urlencode( $link ) .'" class="social-facebook" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Facebook', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>';
				}
				
				if ( $key == 'twitter' && $value ) {
					$output .= '<li><a href="https://twitter.com/share?url='. urlencode( $link ) .'&text='. esc_attr( $title ) .'" class="social-twitter" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Twitter', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>';
				}
				
				if ( $key == 'googleplus' && $value ) {
					$output .= '<li><a href="https://plus.google.com/share?url='. urlencode( $link ) .'" class="social-google-plus" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Google Plus', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>';
				}
				
				if ( $key == 'pinterest' && $value ) {
					$output .= '<li><a href="https://pinterest.com/pin/create/bookmarklet/?media='. $img .'&url='. urlencode( $link ) .'&is_video=false&description='. esc_attr( $title ) .'" class="social-pinterest" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Pinterest', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i></a></li>';
				}
				
				if ( $key == 'linkedin' && $value ) {
					$output .= '<li><a href="http://www.linkedin.com/shareArticle?url='. urlencode( $link ) .'&title='. esc_attr( $title ) .'" class="social-linkedin" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Linkedin', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>';
				}
				
				if ( $key == 'digg' && $value ) {
					$output .= '<li><a href="http://digg.com/submit?url='. urlencode( $link ) .'&title='. esc_attr( $title ) .'" class="social-digg" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Digg', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-digg"></i><i class="fa fa-digg"></i></a></li>';
				}
				
				if ( $key == 'reddit' && $value ) {
					$output .= '<li><a href="http://reddit.com/submit?url='. urlencode( $link ) .'&title='. esc_attr( $title ) .'" class="social-reddit" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Reddit', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-reddit"></i><i class="fa fa-reddit"></i></a></li>';
				}
				
				if ( $key == 'stumbleupon' && $value ) {
					$output .= '<li><a href="http://www.stumbleupon.com/submit?url='. urlencode( $link ) .'&title='. esc_attr( $title ) .'" class="social-stumbleupon" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Stumbleupon', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-stumbleupon"></i><i class="fa fa-stumbleupon"></i></a></li>';
				}
				
				if ( $key == 'delicious' && $value ) {
					$output .= '<li><a href="http://del.icio.us/post?url='. urlencode( $link ) .'&title='. esc_attr( $title ) .'&notes='. esc_attr( $title ) .'" class="social-delicious" data-toggle="tooltip" data-placement="top" title="'. __( 'Share on Delicious', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-delicious"></i><i class="fa fa-delicious"></i></a></li>';
				}
				
				if ( $key == 'email' && $value ) {
					$output .= '<li><a href="mailto:?subject='. esc_attr( $title ) .'&body='. urlencode( $link ) .'" class="social-email" data-toggle="tooltip" data-placement="top" title="'. __( 'Share by Email', 'themepixels' ) .'" '. $new_window .'><i class="fa fa-envelope-o"></i><i class="fa fa-envelope-o"></i></a></li>';
				}
			
			}
			
		$output .= '</ul>';

		echo strip_tags( $output, '<ul><li><a><i>' );

	}
}