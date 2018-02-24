<?php
/**
 * Content - Audio
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
$img_thumb_class = '';
if( is_home() || is_front_page() ) {
	if( tps_get_option('blog_layout') == 'style-2' || tps_get_option('blog_layout') == 'style-3' ) {
		$img_thumb_class = 'no-thumb-border';
	}
} elseif( is_archive() ) {
	if( tps_get_option('archive_layout') == 'style-2' || tps_get_option('archive_layout') == 'style-3' ) {
		$img_thumb_class = 'no-thumb-border';
	}
} elseif( is_page_template( 'template-blog2col.php' ) || is_page_template( 'template-blog3col.php' ) ) {
	$img_thumb_class = 'no-thumb-border';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry clearfix'); ?>>
	<div class="post-box">
		<?php if( tps_get_option('enable_post_header') == '1' ) { ?>
			<div class="post-header clearfix">
				<div class="post-format-icon post-format-standard">
					<i class="fa fa-music"></i>
				</div>
				<div class="post-info-wrap">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if( tps_get_option('enable_post_meta') == '1' ) { ?>
						<div class="post-meta clearfix">
							<?php themepixels_post_meta( tps_get_option('post_meta_links') ); ?>
						</div>
					<?php } ?>
				</div>
			</div><!-- End .post-header -->
		<?php } ?>
		<?php if( tps_get_option('enable_post_featured_content') == '1' ) { ?>
			<div class="post-media">
				<?php
				$post_embed_audio = rwmb_meta( 'themepixels_post_audio_embed_url', 'type=oembed', get_the_ID() );
				$post_self_hosted_audio = rwmb_meta( 'themepixels_post_self_hosted_audio', 'type=file_input', get_the_ID() );

				if( rwmb_meta( 'themepixels_audio_type', '', get_the_ID() ) == 'embed' ) {
					if( $post_embed_audio != '' ) { ?>
						<div class="post-audio-wrapper responsive-audio-wrapper clearfix"><?php echo wp_oembed_get( $post_embed_audio ); ?></div>
					<?php }
				} elseif( rwmb_meta( 'themepixels_audio_type', '', get_the_ID() ) == 'selfhosted' ) {
					if( $post_self_hosted_audio != '' ) { ?>
						<div class="post-audio-wrapper clearfix">
							<?php echo do_shortcode( '[audio src="'. esc_url( $post_self_hosted_audio ) .'"][/audio]' ); ?>
						</div>
					<?php }
				} ?>
			</div><!-- End .post-media -->
		<?php } ?>
		<div class="post-content">
			<?php if( tps_get_option('blog_excerpt') == '1' ) {
				echo themepixels_excerpt( tps_get_option('blog_excerpt_length') );
			} else {
				the_content();
			} ?>
			<?php if( tps_get_option('blog_read_more_button') == '1' ) { ?>
				<div class="read-more">
					<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'themepixels' ); ?></a>
				</div>
			<?php } ?>
		</div><!-- End .post-content -->

		<?php if( is_home() || is_front_page() ) {
			if( tps_get_option('blog_layout') == 'style-2' || tps_get_option('blog_layout') == 'style-3' ) {
				if( tps_get_option('blog_masonry_social_share') == '1' ) { ?>
					<div class="post-footer">
						<?php themepixels_social_share( tps_get_option('blog_masonry_social_sharing_links') ); ?>
					</div><!-- End .post-footer -->
				<?php }
			} else {
				if( tps_get_option('blog_social_share') == '1' ) { ?>
					<div class="post-footer">
						<?php themepixels_social_share( tps_get_option('blog_social_sharing_links') ); ?>
					</div>
				<?php }
			}
		} elseif( is_archive() ) {
			if( tps_get_option('archive_layout') == 'style-2' || tps_get_option('archive_layout') == 'style-3' ) {
				if( tps_get_option('blog_masonry_social_share') == '1' ) { ?>
					<div class="post-footer">
						<?php themepixels_social_share( tps_get_option('blog_masonry_social_sharing_links') ); ?>
					</div><!-- End .post-footer -->
				<?php }
			} else {
				if( tps_get_option('blog_social_share') == '1' ) { ?>
					<div class="post-footer">
						<?php themepixels_social_share( tps_get_option('blog_social_sharing_links') ); ?>
					</div>
				<?php }
			}
		} elseif( is_page_template( 'template-blog1col.php' ) ) {
			if( tps_get_option('blog_social_share') == '1' ) { ?>
				<div class="post-footer">
					<?php themepixels_social_share( tps_get_option('blog_social_sharing_links') ); ?>
				</div><!-- End .post-footer -->
			<?php }
		} elseif( is_page_template( 'template-blog2col.php' ) || is_page_template( 'template-blog3col.php' ) ) {
			if( tps_get_option('blog_masonry_social_share') == '1' ) { ?>
				<div class="post-footer">
					<?php themepixels_social_share( tps_get_option('blog_masonry_social_sharing_links') ); ?>
				</div><!-- End .post-footer -->
			<?php }
		} ?>
		
	</div><!-- End .post-box -->
</article><!-- End #post-## -->