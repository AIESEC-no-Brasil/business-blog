<?php
/**
 * Sticky Header
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<header id="sticky-header" class="sticky-header">
	<div class="container">
		<div class="sticky-header-inner clearfix">
			
			<?php get_template_part( 'framework/header/logo' ); ?>

			<nav class="sticky-navigation clearfix">

				<?php if ( has_nav_menu( 'primary_menu' ) ) { ?>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary_menu',
						'menu_class' => 'sticky-menu sf-menu',
						'container' => 'false',
						'walker' => new themepixels_megamenu_walker
					)); ?>
				<?php } ?>

				<?php if( tps_get_option('sticky_search') == '1' ) { ?>
					<div class="sticky-header-search-icon">
						<a class="sticky-header-search-btn overlay-search-trigger" href="#"><i class="fa fa-search"></i></a>
					</div><!-- End .sticky-header-search-icon -->
				<?php } ?>

			</nav><!-- End .sticky-navigation -->

			<div class="sticky-mobile-menu-icons clearfix">
				<a href="#" class="primary-mobile-trigger"><i class="fa fa-bars"></i></a>
			</div><!-- End .sticky-mobile-menu-icons -->

		</div>
	</div>
</header><!-- End #sticky-header -->