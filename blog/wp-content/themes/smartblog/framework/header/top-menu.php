<?php
/**
 * Top Menu
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<nav class="top-navigation clearfix">
	<?php if ( has_nav_menu( 'top_menu' ) ) { ?>
		<?php wp_nav_menu( array(
			'theme_location' => 'top_menu',
			'menu_class' => 'top-menu sf-menu',
			'container' => 'false',
			'walker' => new themepixels_megamenu_walker
		)); ?>
	<?php } ?>
</nav><!-- End .top-navigation -->