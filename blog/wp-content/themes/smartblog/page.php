<?php
/**
 * The template for displaying all pages.
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
		if( tps_get_option('page_sidebar_position') == 'default' ) {
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
		} elseif( tps_get_option('page_sidebar_position') == 'no-sidebar' ) {
			$content_class = 'has-no-sidebar';
			$sidebar_class = 'no-sidebar';
		} elseif( tps_get_option('page_sidebar_position') == 'right-sidebar' ) {
			$content_class = 'content-left';
			$sidebar_class = 'sidebar-right';
		} elseif( tps_get_option('page_sidebar_position') == 'left-sidebar' ) {
			$content_class = 'content-right';
			$sidebar_class = 'sidebar-left';
		} elseif( tps_get_option('page_sidebar_position') == 'both-sidebar' ) {
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
			if( tps_get_option('page_sidebar_position') == 'default' ) {
				if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) {
					$content_size_class = 'col-md-6';
					$sidebar_size_class = 'col-md-3';
				}
			} elseif( tps_get_option('page_sidebar_position') == 'both-sidebar' ) {
				$content_size_class = 'col-md-6';
				$sidebar_size_class = 'col-md-3';
			}
		}
	?>

	<?php
		if( rwmb_meta( 'themepixels_enable_carousel', '', get_the_ID() ) == 'yes' && rwmb_meta( 'themepixels_carousel_position', '', get_the_ID() ) == 'below-header' ) {
			get_template_part( 'framework/featured-carousel' );
		}
	?>

	<?php
		if( rwmb_meta( 'themepixels_enable_slider', '', get_the_ID() ) == 'yes' ) {
			get_template_part( 'framework/featured-slider' );
		}
	?>

	<?php themepixels_setpostviews( get_the_ID() ); ?>

	<div class="main-wrapper clearfix">
		<div id="main" class="container">
			<div class="row">
				
				<div id="primary" class="content-area <?php echo esc_attr( $content_size_class ); ?> <?php echo esc_attr( $content_class ); ?>">
					<div id="content" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>

							<?php
								if( tps_get_option('enable_page_comments') == '1' ) {
									comments_template();
								}
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
						if( tps_get_option('page_sidebar_position') == 'default' ) {
							if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) { ?>
								<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
									<div class="sidebar-inner clearfix">
										<?php get_sidebar( 'secondary' ); ?>
									</div>
								</aside><!-- End #secondary-2 -->
							<?php }
						} elseif( tps_get_option('page_sidebar_position') == 'both-sidebar' ) { ?>
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
