<?php
/**
 * Logo
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<div class="logo">
	<?php if( tps_get_option('logo_image', 'url') !== '' ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo tps_get_option('logo_image', 'url'); ?>" alt="<?php bloginfo( 'name' ); ?>" class="std-logo" />
			<?php if( tps_get_option('retina_logo_image', 'url') !== '' ) { ?>
				<img src="<?php echo tps_get_option('retina_logo_image', 'url'); ?>" width="<?php echo tps_get_option( 'retina_logo_width' ); ?>" height="<?php echo tps_get_option( 'retina_logo_height' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="retina-logo" />
			<?php } ?>
		</a>
	<?php } else { ?>
		<?php if( is_front_page() ) { ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } else { ?>
			<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
		<?php } ?>
	<?php } ?>
</div><!-- End .logo -->