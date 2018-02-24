<?php
/**
 * Template Name: Blog - 2 Columns
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
	$single_pagination_type = rwmb_meta( 'themepixels_blog_pagination_type', '', get_the_ID() );
	$global_pagination_type = tps_get_option('blog_pagination_type');

	global $paged;
	
	if( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}

	$args = array(
		'post_type'		=> 'post',
		'paged'			=> $paged,
	);

	$blog_query = new WP_Query($args);

	$layout_class = '';
	if ( $blog_query->have_posts() ) {
		$layout_class = 'blog-masonry blog-2col';
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

	<div class="main-wrapper clearfix">
		<div id="main" class="container">
			<div class="row">
				
				<div id="primary" class="content-area <?php echo esc_attr( $content_size_class ); ?> <?php echo esc_attr( $content_class ); ?>">

					<?php if( rwmb_meta( 'themepixels_show_page_content', '', get_the_ID() ) == 'yes' ) { ?>

						<div id="content" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'content', 'page' ); ?>

							<?php endwhile; ?>

						</div><!-- End #content -->

					<?php } ?>

					<div id="content" class="<?php echo esc_attr( $layout_class ); ?>" role="main">

						<?php if ( $blog_query->have_posts() ) : ?>

							<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

								<?php get_template_part( 'content', get_post_format() ); ?>

							<?php endwhile; ?>

						<?php endif; ?>

					</div><!-- End #content -->

					<?php
						if( $single_pagination_type == 'numbered-pagination' ) {
							themepixels_pagination( $blog_query->max_num_pages );
						} elseif( $single_pagination_type == 'next-prev' ) {
							themepixels_posts_navigation( $blog_query->max_num_pages );
						} elseif( $single_pagination_type == 'default' || $single_pagination_type == '' ) {
							if( $global_pagination_type == 'numbered-pagination' ) {
								themepixels_pagination( $blog_query->max_num_pages );
							} elseif( $global_pagination_type == 'next-prev' ) {
								themepixels_posts_navigation( $blog_query->max_num_pages );
							} else {
								themepixels_posts_navigation( $blog_query->max_num_pages );
							}
						}
					?>

					<?php wp_reset_postdata(); ?>
					
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