<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Smart Blog
 * @since 1.0
 */

get_header(); ?>

	<?php
	$content_class = '';
	$sidebar_class = '';
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
	?>

	<?php
		$content_size_class = 'col-md-8';
		$sidebar_size_class = 'col-md-4';
		if( tps_get_option('page_sidebar_position') == 'default' ) {
			if( tps_get_option('global_sidebar_position') == 'both-sidebar' ) {
				$content_size_class = 'col-md-6';
				$sidebar_size_class = 'col-md-3';
			}
		} elseif( tps_get_option('page_sidebar_position') == 'both-sidebar' ) {
			$content_size_class = 'col-md-6';
			$sidebar_size_class = 'col-md-3';
		}
	?>

	<div class="main-wrapper clearfix">
		<div id="main" class="container">
			<div class="row">
				
				<div id="primary" class="content-area <?php echo esc_attr( $content_size_class ); ?> <?php echo esc_attr( $content_class ); ?>">
					<div id="content" role="main">

						<header class="main-heading clearfix">
							<h1>
								<?php _e( '404 Error', 'themepixels' ); ?>
								<span><?php _e( 'Page Not Found', 'themepixels' ); ?></span>
							</h1>
						</header>

						<div class="post-entry page-not-found clearfix">
							<div class="post-box">
								<div class="post-content">
									<p class="page-not-found-icon"><i class="fa fa-frown-o"></i></p>
									<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'themepixels' ); ?></p>
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>

					</div><!-- End #content -->
				</div><!-- End #primary -->

				<aside id="secondary" class="sidebar <?php echo esc_attr( $sidebar_size_class ); ?> <?php echo esc_attr( $sidebar_class ); ?>" role="complementary">
					<div class="sidebar-inner clearfix">
						<?php get_sidebar(); ?>
					</div>
				</aside><!-- End #secondary -->

				<?php
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
				?>

			</div>
		</div>
	</div><!-- End .main-wrapper -->
	
<?php get_footer(); ?>
