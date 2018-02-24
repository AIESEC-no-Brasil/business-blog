<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Smart Blog
 * @since 1.0
 */

get_header(); ?>

<header class="main-heading clearfix">
	<h1>
		<span><?php _e( 'Nothing Found', 'themepixels' ); ?></span>
	</h1>
</header>

<div class="post-entry page-not-found clearfix">
	<div class="post-box">
		<div class="post-content">

			<?php if( is_home() && current_user_can( 'publish_posts' ) ) { ?>

				<p class="page-not-found-icon"><i class="fa fa-frown-o"></i></p>
				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'themepixels' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php } elseif( is_search() ) { ?>

				<p class="page-not-found-icon"><i class="fa fa-frown-o"></i></p>
				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'themepixels' ); ?></p>
				<?php get_search_form(); ?>

			<?php } else { ?>

				<p class="page-not-found-icon"><i class="fa fa-frown-o"></i></p>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'themepixels' ); ?></p>
				<?php get_search_form(); ?>

			<?php } ?>
			
		</div>
	</div>
</div>
