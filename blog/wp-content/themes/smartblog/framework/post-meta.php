<?php
/**
 * Post Meta
 *
 * @package Smart Blog
 * @since 1.0
 */

if ( ! function_exists( 'themepixels_post_meta' ) ) {
	function themepixels_post_meta( $post_meta_options ) {

		$post_meta_links = $post_meta_options;

		$output = '';
		$output .= '<ul>';
			
			foreach ( $post_meta_links as $key => $value ) {
				
				if ( $key == 'author' && $value ) {
					$output .= '<li><i class="fa fa-user"></i><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a></li>';
				}
				
				if ( $key == 'date' && $value ) {
					$output .= '<li><i class="fa fa-clock-o"></i><time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></li>';
				}
				
				if ( $key == 'views' && $value ) {
					$output .= '<li><i class="fa fa-eye"></i><span>' . themepixels_getpostviews( get_the_ID() ) . '</span></li>';
				}
				
				if ( $key == 'likes' && $value ) {
					$output .= '<li>' . getPostLikeLink( get_the_ID() ) . '</li>';
				}
				
				if ( $key == 'comments' && $value && ( comments_open() || get_comments_number() ) ) {
					ob_start();
					comments_popup_link( __( 'Leave a comment', 'themepixels' ), __( '1 Comment', 'themepixels' ), __( '% Comments', 'themepixels' ), 'comments-link', __( 'Comments are closed', 'themepixels' ) );
					$output .= '<li><i class="fa fa-comments"></i>' . ob_get_clean() . '</li>';
				}
			
			}

			ob_start();
			edit_post_link( __( 'Edit', 'themepixels' ), '<li class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</li>' );
			$output .= ob_get_clean();
			
		$output .= '</ul>';

		echo strip_tags( $output, '<ul><li><a><i><time><span>' );

	}
}