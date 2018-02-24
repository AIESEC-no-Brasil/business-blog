<?php
/**
 * Primary Menu
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<nav class="primary-navigation clearfix">
	
	<?php if ( has_nav_menu( 'primary_menu' ) ) { ?>
		<?php wp_nav_menu( array(
			'theme_location' => 'primary_menu',
			'menu_class' => 'primary-menu sf-menu',
			'container' => 'false',
			'walker' => new themepixels_megamenu_walker
		)); ?>
	<?php } ?>

	<?php if( tps_get_option('header_search') == '1' ) { ?>
		<div class="header-search-icon">
			<a class="header-search-btn overlay-search-trigger" href="#"><i class="fa fa-search"></i></a>
		</div><!-- End .header-search-icon -->
	<?php } ?>

</nav><!-- End .primary-navigation -->