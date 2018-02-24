<?php
/**
 * Overlay Search
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<div class="overlay-search clearfix">
	<div class="overlay-search-inner">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="overlay-search-form" role="search" method="get">
			<input type="search" class="form-control" name="s" value="" autocomplete="off" placeholder="<?php _e( 'To search type and hit enter...', 'themepixels' ); ?>" />
		</form>
	</div>
	<a href="#" class="overlay-search-close">&#215;</a>
</div><!-- End .overlay-search -->