<?php
/**
 * Footer Menu
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<div class="footer-navigation clearfix">
	<?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
		<?php wp_nav_menu( array(
			'theme_location' => 'footer_menu',
			'menu_class' => 'footer-menu',
			'container' => 'false',
			'depth' => 1
		)); ?>
	<?php } ?>
</div><!-- End .footer-navigation -->