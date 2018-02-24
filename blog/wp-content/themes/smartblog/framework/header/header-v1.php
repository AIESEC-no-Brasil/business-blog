<?php
/**
 * Header - One
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<header id="header" class="header-style-one">
	<div class="container">
		<div class="header-inner clearfix">
			
			<?php get_template_part( 'framework/header/logo' ); ?>

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