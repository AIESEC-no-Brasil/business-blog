<?php
/**
 * The template for displaying the footer.
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_enable_carousel', '', get_the_ID() ) == 'yes' && rwmb_meta( 'themepixels_carousel_position', '', get_the_ID() ) == 'above-footer' ) {
			get_template_part( 'framework/featured-carousel' );
		} else {
			if( tps_get_option('enable_homepage_carousel') == '1' && tps_get_option('carousel_position') == 'above-footer' ) {
				get_template_part( 'framework/featured-carousel' );
			}
		}
	} else {
		if( tps_get_option('enable_homepage_carousel') == '1' && tps_get_option('carousel_position') == 'above-footer' ) {
			get_template_part( 'framework/featured-carousel' );
		}
	}
?>

<?php
	$footer_col_class = '';
	if( tps_get_option('footer_col') == '1' ) {
		$footer_col_class = 'col-md-12';
	} elseif( tps_get_option('footer_col') == '2' ) {
		$footer_col_class = 'col-md-6';
	} elseif ( tps_get_option('footer_col') == '3' ) {
		$footer_col_class = 'col-md-4';
	} elseif ( tps_get_option('footer_col') == '4' ) {
		$footer_col_class = 'col-md-3';
	} elseif ( tps_get_option('footer_col') == '5' ) {
		$footer_col_class = 'col-md-1-by-5';
	}
?>

	<div class="footer-wrapper">

		<?php if( tps_get_option('footer_widgets') == '1' ) { ?>
			<footer id="footer" class="clearfix">
				<div class="container">
					<div class="footer-inner clearfix">
						<div class="row">

							<?php if( tps_get_option('footer_col') == '1' || tps_get_option('footer_col') == '2' || tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) { ?>
								<div class="<?php echo esc_attr( $footer_col_class ); ?>">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one')) : endif; ?>
								</div>
							<?php } ?>

							<?php if( tps_get_option('footer_col') == '2' || tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) { ?>
								<div class="<?php echo esc_attr( $footer_col_class ); ?>">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-two')) : endif; ?>
								</div>
							<?php } ?>

							<?php if( tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) { ?>
								<div class="<?php echo esc_attr( $footer_col_class ); ?>">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-three')) : endif; ?>
								</div>
							<?php } ?>

							<?php if( tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) { ?>
								<div class="<?php echo esc_attr( $footer_col_class ); ?>">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-four')) : endif; ?>
								</div>
							<?php } ?>

							<?php if( tps_get_option('footer_col') == '5' ) { ?>
								<div class="<?php echo esc_attr( $footer_col_class ); ?>">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-five')) : endif; ?>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</footer><!-- End #footer -->
		<?php } ?>

		<?php if( tps_get_option('footer_bottom') == '1' ) { ?>
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-inner clearfix">

						<?php
							$link_target = '';
							if( tps_get_option('footer_social_link_target') == '1' ) {
								$link_target = 'true';
							}
						?>

						<?php if( tps_get_option('footer_bottom_widgets') == 'navigation' ) {
							get_template_part( 'framework/footer/footer-menu' );
						} elseif( tps_get_option('footer_bottom_widgets') == 'social-icons' ) {
							themepixels_social_icons( tps_get_option('footer_bottom_social_icons'), 'top', '<div class="footer-social clearfix">', '</div>', ' social-rounded social-colored', $link_target );
						} ?>

						<div class="copyright clearfix">
							<?php echo do_shortcode( tps_get_option('footer_copyright') ); ?>
						</div><!-- End .copyright -->

					</div>
				</div>
			</div><!-- End .footer-bottom -->
		<?php } ?>

	</div><!-- End .footer-wrapper -->

</div><!-- End #wrapper -->

<?php get_template_part( 'framework/footer/overlay-search' ); ?>

<?php if( tps_get_option('scroll_top_button') == '1' ) { ?>
	<a href="#" class="scroll-to-top"><i class="fa fa-arrow-up"></i></a>
<?php } ?>

<?php wp_footer(); ?>

<?php get_template_part( 'framework/header/primary-mobile-menu' ); ?>

</body>
</html>