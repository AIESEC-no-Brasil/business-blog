<?php
/**
 * Content - Search
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
$img_thumb_class = '';
if( tps_get_option('search_layout') == 'style-2' || tps_get_option('search_layout') == 'style-3' ) {
	$img_thumb_class = 'no-thumb-border';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry clearfix'); ?>>
	<div class="post-box">
		<?php if( tps_get_option('enable_search_post_header') == '1' ) { ?>
			<div class="post-header clearfix">
				<div class="post-info-wrap">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if( tps_get_option('enable_search_post_meta') == '1' ) { ?>
						<div class="post-meta clearfix">
							<?php themepixels_post_meta( tps_get_option('search_post_meta_links') ); ?>
						</div>
					<?php } ?>
				</div>
			</div><!-- End .post-header -->
		<?php } ?>
		<?php if( tps_get_option('enable_search_featured_image') == '1' ) { ?>
			<div class="post-media">
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="post-thumbnail-wrapper <?php echo esc_attr( $img_thumb_class ); ?>">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'blog-featured' ); ?>
							<div class="thumb-overlay">
								<i class="fa fa-link"></i>
							</div>
						</a>
					</figure>
				<?php } ?>
			</div><!-- End .post-media -->
		<?php } ?>
		<div class="post-content">
			<?php if( tps_get_option('search_excerpt') == '1' ) {
				echo themepixels_excerpt( tps_get_option('search_excerpt_length') );
			} else {
				the_content();
			} ?>
			<?php if( tps_get_option('search_read_more_button') == '1' ) { ?>
				<div class="read-more">
					<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'themepixels' ); ?></a>
				</div>
			<?php } ?>
		</div><!-- End .post-content -->

		<?php if( tps_get_option('search_pages_social_share') == '1' ) { ?>
			<div class="post-footer">
				<?php themepixels_social_share( tps_get_option('search_pages_social_sharing_links') ); ?>
			</div><!-- End .post-footer -->
		<?php } ?>
		
	</div><!-- End .post-box -->
</article><!-- End #post-## -->