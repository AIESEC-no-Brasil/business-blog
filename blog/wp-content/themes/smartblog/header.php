<?php
/**
 * The header for our theme.
 *
 * @package Smart Blog
 * @since 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php if( tps_get_option('enable_preloader') == '1' ) { ?>
	<div id="preloader">
		<div id="preloader-inner">
			<div class="spinner">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div>
<?php } ?>

<div id="wrapper" class="clearfix">

	<?php
		if( is_singular() ) {
			global $post;
			$enable_sticky_header = rwmb_meta( 'themepixels_enable_sticky_header', '', $post->ID );
			if( $enable_sticky_header == 'default' || $enable_sticky_header == '' ) {
				if( tps_get_option('sticky_header') == '1' ) {
					get_template_part( 'framework/header/sticky-header' );
				}
			} else {
				if( $enable_sticky_header == 'yes' ) {
					get_template_part( 'framework/header/sticky-header' );
				}
			}
		} else {
			if( tps_get_option('sticky_header') == '1' ) {
				get_template_part( 'framework/header/sticky-header' );
			}
		}
	?>

	<div class="header-wrapper">
		
		<?php
			if( is_singular() ) {
				global $post;
				$enable_topbar = rwmb_meta( 'themepixels_enable_topbar', '', $post->ID );
				if( $enable_topbar == 'default' || $enable_topbar == '' ) {
					if( tps_get_option('top_bar') == '1' ) {
						get_template_part( 'framework/header/top-bar' );
					}
				} else {
					if( $enable_topbar == 'yes' ) {
						get_template_part( 'framework/header/top-bar' );
					}
				}
			} else {
				if( tps_get_option('top_bar') == '1' ) {
					get_template_part( 'framework/header/top-bar' );
				}
			}
		?>

		<?php
			$header_layout = tps_get_option('header_layout');
			if( is_singular() ) {
				global $post;
				$meta = rwmb_meta( 'themepixels_header_layout', '', $post->ID );
				if( $meta == 'default' || $meta == '' ) {
					$header_layout = tps_get_option('header_layout');
				} else {
					$header_layout = $meta;
				}
			}
		?>

		<?php get_template_part( 'framework/header/header', $header_layout ); ?>

		<?php
			if( is_singular() ) {
				global $post;
				$enable_sticky_header = rwmb_meta( 'themepixels_enable_sticky_header', '', $post->ID );
				if( $enable_sticky_header == 'default' || $enable_sticky_header == '' ) {
					if( tps_get_option('sticky_header') == '1' ) { ?>
						<div class="init-sticky-header"></div>
					<?php }
				} else {
					if( $enable_sticky_header == 'yes' ) { ?>
						<div class="init-sticky-header"></div>
					<?php }
				}
			} else {
				if( tps_get_option('sticky_header') == '1' ) { ?>
					<div class="init-sticky-header"></div>
				<?php }
			}
		?>

	</div><!-- End .header-wrapper -->