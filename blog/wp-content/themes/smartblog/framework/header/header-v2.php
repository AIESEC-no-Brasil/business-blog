<?php
/**
 * Header - Two
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<header id="header" class="header-style-two">
	<div class="container">
		<div class="header-inner clearfix">
			
			<?php get_template_part( 'framework/header/logo' ); ?>

			<?php get_template_part( 'framework/header/primary-menu' ); ?>

			<div class="primary-mobile-menu-icons clearfix">
				<a href="#" class="primary-mobile-trigger"><i class="fa fa-bars"></i></a>
			</div><!-- End .primary-mobile-menu-icons -->

		</div>
	</div><!-- End .container -->
</header><!-- End #header -->