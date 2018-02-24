<?php
/**
 * Header - Three
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<header id="header" class="header-style-three">
	<div class="container">
		<div class="header-inner clearfix">
			
			<?php get_template_part( 'framework/header/logo' ); ?>

			<?php if ( tps_get_option( 'header_ad_space_content' ) !== '' ) { ?>
				<div class="header-ad clearfix">
					<?php echo tps_get_option( 'header_ad_space_content' ); ?>
				</div>
			<?php } ?>

			<div class="primary-mobile-menu-icons clearfix">
				<a href="#" class="primary-mobile-trigger"><i class="fa fa-bars"></i></a>
			</div><!-- End .primary-mobile-menu-icons -->

		</div>
	</div><!-- End .container -->

	<div class="primary-navigation-wrapper">
		<div class="container">
			<div class="primary-navigation-inner clearfix">
				
				<?php get_template_part( 'framework/header/primary-menu' ); ?>

			</div>
		</div>
	</div><!-- End .primary-navigation-wrapper -->
	
</header><!-- End #header -->