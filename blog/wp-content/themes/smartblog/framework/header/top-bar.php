<?php
/**
 * Top Bar
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<div class="top-bar-wrapper">
	<div class="container">
		<div class="top-bar-inner clearfix">

			<?php
				$link_target = '';
				if( tps_get_option('top_bar_social_link_target') == '1' ) {
					$link_target = 'true';
				}
			?>
			
			<div class="top-bar-left clearfix">
				<?php if( tps_get_option('top_bar_left') == 'navigation' ) {
					get_template_part( 'framework/header/top-menu' );
				} elseif( tps_get_option('top_bar_left') == 'social-icons' ) {
					themepixels_social_icons( tps_get_option('top_bar_left_social_icons'), 'bottom', '<div class="top-bar-social clearfix">', '</div>', '', $link_target );
				} elseif( tps_get_option('top_bar_left') == 'custom-content' ) {
					echo do_shortcode( tps_get_option('top_left_custom') );
				} ?>
			</div><!-- End .top-bar-left -->

			<div class="top-bar-right clearfix">

				<?php if( tps_get_option('top_bar_search') == '1' ) { ?>
					<div class="top-bar-search-icon">
						<a href="" class="top-search-btn overlay-search-trigger"><i class="fa fa-search"></i></a>
					</div>
				<?php } ?>
				
				<?php if( tps_get_option('top_bar_right') == 'navigation' ) {
					get_template_part( 'framework/header/top-menu' );
				} elseif( tps_get_option('top_bar_right') == 'social-icons' ) {
					themepixels_social_icons( tps_get_option('top_bar_right_social_icons'), 'bottom', '<div class="top-bar-social clearfix">', '</div>', '', $link_target );
				} elseif( tps_get_option('top_bar_right') == 'custom-content' ) {
					echo do_shortcode( tps_get_option('top_right_custom') );
				} ?>

			</div><!-- End .top-bar-right -->

			<?php if( (tps_get_option('top_bar_left') == 'navigation' && has_nav_menu( 'top_menu' ) ) || ( tps_get_option('top_bar_right') == 'navigation' && has_nav_menu( 'top_menu' ) ) || tps_get_option('top_bar_search') == '1' ) { ?>
				<div class="top-mobile-menu-icon clearfix">
					<span class="top-mobile-menu-trigger-desc"><?php _e( 'Top Menu', 'themepixels' ); ?></span>
					<span class="top-mobile-menu-trigger"><i class="fa fa-bars"></i></span>
				</div><!-- End .top-mobile-menu-icon -->
			<?php } ?>

		</div>
	</div>
</div><!-- End .top-bar-wrapper -->

<div class="top-mobile-navigation clearfix">
	<div class="container">
		<div class="top-mobile-navigation-inner">
			<?php get_template_part( 'framework/header/top-mobile-menu' ); ?>
		</div>
	</div>
</div><!-- End .top-mobile-navigation -->