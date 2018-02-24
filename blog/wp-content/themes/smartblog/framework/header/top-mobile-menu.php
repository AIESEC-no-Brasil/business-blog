<?php
/**
 * Top Mobile Menu
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php if ( has_nav_menu( 'top_menu' ) ) { ?>
	<?php wp_nav_menu( array(
		'theme_location' => 'top_menu',
		'menu_class' => 'top-mobile-menu',
		'container' => 'false',
		'walker' => new themepixels_responsive_walker
	)); ?>
<?php } ?>

<?php if( tps_get_option('top_bar_search') == '1' ) { ?>
	<div class="mobile-menu-search">
		<form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="form-group has-search-icon">
				<input type="search" class="form-control" placeholder="<?php _e( 'Search', 'themepixels' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
				<span class="fa fa-search form-control-search" aria-hidden="true"></span>
			</div>
		</form>
	</div>
<?php } ?>