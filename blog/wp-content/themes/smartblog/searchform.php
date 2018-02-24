<?php
/**
 * The template for displaying search form
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="search" class="form-control" placeholder="<?php _e( 'Search', 'themepixels' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		<span class="input-group-btn">
			<button class="btn btn-primary btn-squared" type="submit"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form><!-- .search-form -->