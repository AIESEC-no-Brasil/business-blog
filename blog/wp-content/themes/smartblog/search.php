<?php
/**
 * The template for displaying search results pages.
 *
 * @package Smart Blog
 * @since 1.0
 */

get_header(); ?>

	<?php
	$content_class = '';
	$sidebar_class = '';
	if( tps_get_option('search_sidebar_position') == 'default' ) {
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
	} elseif( tps_get_option('search_sidebar_position') == 'no-sidebar' ) {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
	} elseif( tps_get_option('search_sidebar_position') == 'right-sidebar' ) {
		$content_class = 'content-left';
		$sidebar_class = 'sidebar-right';
	} elseif( tps_get_option('search_sidebar_position') == 'left-sidebar' ) {
		$content_class = 'content-right';
		$sidebar_class = 'sidebar-left';
	} elseif( tps_get_option('search_sidebar_position') == 'both-sidebar' ) {
		$content_class = 'has-both-sidebar';
		$sidebar_class = 'both-sidebar';
	}
	?>

	<?php
		$content_size_class = 'col-md-8';
		$sidebar_size_class = 'col-md-4';
		if( tps_get_option('search_sidebar_position') == 'default' ) {
			if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) {
				$content_size_class = 'col-md-6';
				$sidebar_size_class = 'col-md-3';
			}
		} elseif( tps_get_option('search_sidebar_position') == 'both-sidebar' ) {
			$content_size_class = 'col-md-6';
			$sidebar_size_class = 'col-md-3';
		}
	?>

	<?php
	$layout_class = '';
	if ( have_posts() ) {
		if( tps_get_option('search_layout') == 'style-2' ) {
			$layout_class = 'blog-masonry blog-2col';
		} elseif( tps_get_option('search_layout') == 'style-3' ) {
			$layout_class = 'blog-masonry blog-3col';
		}
	}
	?>

	<div class="main-wrapper clearfix">
		<div id="main" class="container">
			<div class="row">
				
				<div id="primary" class="content-area <?php echo esc_attr( $content_size_class ); ?> <?php echo esc_attr( $content_class ); ?>">

					<?php if ( have_posts() ) { ?>
						<header class="main-heading clearfix">
							<h1><?php printf( __( 'Search Results For %s', 'themepixels' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
					<?php } ?>

					<div id="content" class="<?php echo esc_attr( $layout_class ); ?>" role="main">

						<?php if ( have_posts() ) : ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'content', 'search' ); ?>

							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>

					</div><!-- End #content -->

					<?php
						if( tps_get_option('search_pagination_type') == 'numbered-pagination' ) {
							themepixels_pagination();
						} elseif( tps_get_option('search_pagination_type') == 'next-prev' ) {
							themepixels_posts_navigation();
						} else {
							themepixels_posts_navigation();
						}
					?>
					
				</div><!-- End #primary -->

				<aside id="secondary" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
					<div class="sidebar-inner clearfix">
						<?php get_sidebar(); ?>
					</div>
				</aside><!-- End #secondary -->

				<?php
					if( tps_get_option('search_sidebar_position') == 'default' ) {
						if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) { ?>
							<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
								<div class="sidebar-inner clearfix">
									<?php get_sidebar( 'secondary' ); ?>
								</div>
							</aside><!-- End #secondary-2 -->
						<?php }
					} elseif( tps_get_option('search_sidebar_position') == 'both-sidebar' ) { ?>
						<aside id="secondary-2" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
							<div class="sidebar-inner clearfix">
								<?php get_sidebar( 'secondary' ); ?>
							</div>
						</aside><!-- End #secondary-2 -->
					<?php }
				?>

			</div>
		</div>
	</div><!-- End .main-wrapper -->
	
<?php get_footer(); ?>
