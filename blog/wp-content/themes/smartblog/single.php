<?php
/**
 * The template for displaying all single posts.
 *
 * @package Smart Blog
 * @since 1.0
 */

get_header(); ?>

	<?php
	$content_class = '';
	$sidebar_class = '';
	if(rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'no-sidebar') {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
	} elseif (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'right-sidebar') {
		$content_class = 'content-left';
		$sidebar_class = 'sidebar-right';
	} elseif (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'left-sidebar') {
		$content_class = 'content-right';
		$sidebar_class = 'sidebar-left';
	} elseif (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'both-sidebar') {
		$content_class = 'has-both-sidebar';
		$sidebar_class = 'both-sidebar';
	} elseif ( (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'default') || (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == '') ) {
		if( tps_get_option('single_post_sidebar_position') == 'default' ) {
			if( tps_get_option('global_sidebar_position') == 'no-sidebar' ) {
				$content_class = 'has-no-sidebar';
				$sidebar_class = 'no-sidebar';
			} elseif( tps_get_option('global_sidebar_position') == 'right-sidebar' ) {
				$content_class = 'content-left';
				$sidebar_class = 'sidebar-right';
			} elseif( tps_get_option('global_sidebar_position') == 'left-sidebar' ) {
				$content_class = 'content-right';
				$sidebar_class = 'sidebar-left';
			} elseif( tps_get_option('global_sidebar_position') == 'both-sidebar' ) {
				$content_class = 'has-both-sidebar';
				$sidebar_class = 'both-sidebar';
			}
		} elseif( tps_get_option('single_post_sidebar_position') == 'no-sidebar' ) {
			$content_class = 'has-no-sidebar';
			$sidebar_class = 'no-sidebar';
		} elseif( tps_get_option('single_post_sidebar_position') == 'right-sidebar' ) {
			$content_class = 'content-left';
			$sidebar_class = 'sidebar-right';
		} elseif( tps_get_option('single_post_sidebar_position') == 'left-sidebar' ) {
			$content_class = 'content-right';
			$sidebar_class = 'sidebar-left';
		} elseif( tps_get_option('single_post_sidebar_position') == 'both-sidebar' ) {
			$content_class = 'has-both-sidebar';
			$sidebar_class = 'both-sidebar';
		}
	}
	?>

	<?php
		$content_size_class = 'col-md-8';
		$sidebar_size_class = 'col-md-4';
		if( rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'both-sidebar' ) {
			$content_size_class = 'col-md-6';
			$sidebar_size_class = 'col-md-3';
		} elseif ( (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'default') || (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == '') ) {
			if( tps_get_option('single_post_sidebar_position') == 'default' ) {
				if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) {
					$content_size_class = 'col-md-6';
					$sidebar_size_class = 'col-md-3';
				}
			} elseif( tps_get_option('single_post_sidebar_position') == 'both-sidebar' ) {
				$content_size_class = 'col-md-6';
				$sidebar_size_class = 'col-md-3';
			}
		}
	?>

	<?php themepixels_setpostviews( get_the_ID() ); ?>

	<div class="main-wrapper clearfix">
		<div id="main" class="container">
			<div class="row">
				
				<div id="primary" class="content-area <?php echo esc_attr( $content_size_class ); ?> <?php echo esc_attr( $content_class ); ?>">
					<div id="content" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php if ( ( tps_get_option( 'enable_post_author_info_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_author_info_box', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_author_info_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_author_info_box', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_author_info_box', '', get_the_ID() ) == 'yes' ) {
								get_template_part( 'framework/author-box' );
							} ?>

							<?php if ( ( tps_get_option( 'enable_post_related_single' ) == '1' && rwmb_meta( 'themepixels_enable_related_posts', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_related_single' ) == '1' && rwmb_meta( 'themepixels_enable_related_posts', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_related_posts', '', get_the_ID() ) == 'yes' ) {
								get_template_part( 'framework/related-posts' );
							} ?>

							<?php if ( ( tps_get_option( 'enable_post_next_prev_links_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_next_prev_links', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_next_prev_links_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_next_prev_links', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_next_prev_links', '', get_the_ID() ) == 'yes' ) {
								themepixels_post_navigation();
							} ?>

							<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; ?>

					</div><!-- End #content -->
				</div><!-- End #primary -->

				<aside id="secondary" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
					<div class="sidebar-inner clearfix">
						<?php get_sidebar(); ?>
					</div>
				</aside><!-- End #secondary -->

				<?php
					if( rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'both-sidebar' ) { ?>
						<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
							<div class="sidebar-inner clearfix">
								<?php get_sidebar( 'secondary' ); ?>
							</div>
						</aside><!-- End #secondary-2 -->
					<?php } elseif( (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == 'default') || (rwmb_meta( 'themepixels_sidebar_position', '', get_the_ID() ) == '') ) {
						if( tps_get_option('single_post_sidebar_position') == 'default' ) {
							if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) { ?>
								<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
									<div class="sidebar-inner clearfix">
										<?php get_sidebar( 'secondary' ); ?>
									</div>
								</aside><!-- End #secondary-2 -->
							<?php }
						} elseif( tps_get_option('single_post_sidebar_position') == 'both-sidebar' ) { ?>
							<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
								<div class="sidebar-inner clearfix">
									<?php get_sidebar( 'secondary' ); ?>
								</div>
							</aside><!-- End #secondary-2 -->
						<?php }
					}
				?>

			</div>
		</div>
	</div><!-- End .main-wrapper -->
	
<?php get_footer(); ?>
