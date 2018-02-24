<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry clearfix'); ?>>
	<div class="post-box">
		<?php if ( ( tps_get_option( 'enable_page_header' ) == '1' && rwmb_meta( 'themepixels_enable_page_header', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_page_header' ) == '1' && rwmb_meta( 'themepixels_enable_page_header', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_page_header', '', get_the_ID() ) == 'yes' ) { ?>
			<div class="post-header clearfix">
				<div class="post-info-wrap">
					<h1 class="post-title"><?php the_title(); ?></h1>
					<?php if ( ( tps_get_option( 'enable_page_meta' ) == '1' && rwmb_meta( 'themepixels_enable_page_meta', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_page_meta' ) == '1' && rwmb_meta( 'themepixels_enable_page_meta', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_page_meta', '', get_the_ID() ) == 'yes' ) { ?>
						<div class="post-meta clearfix">
							<?php themepixels_post_meta( tps_get_option('page_meta_links') ); ?>
						</div>
					<?php } ?>
				</div>
			</div><!-- End .post-header -->
		<?php } ?>
		<?php if ( ( tps_get_option( 'enable_page_featured_image' ) == '1' && rwmb_meta( 'themepixels_enable_page_featured_image', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_page_featured_image' ) == '1' && rwmb_meta( 'themepixels_enable_page_featured_image', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_page_featured_image', '', get_the_ID() ) == 'yes' ) { ?>
			<div class="post-media">
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="post-thumbnail-wrapper">
						<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
						<a href="<?php echo esc_url( $img_src[0] ); ?>" class="img-lightbox" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
							<?php the_post_thumbnail( 'page-featured' ); ?>
							<div class="thumb-overlay">
								<i class="fa fa-search"></i>
							</div>
						</a>
					</figure>
				<?php } ?>
			</div><!-- End .post-media -->
		<?php } ?>
		<div class="post-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before'		=> '<div class="page-links clearfix"><span class="page-links-title">' . __( 'Pages:', 'themepixels' ) . '</span>',
					'after'			=> '</div>',
					'link_before'	=> '<span>',
					'link_after'	=> '</span>',
				) );
			?>
		</div><!-- End .post-content -->
		<?php if( tps_get_option('pages_social_share') == '1' ) { ?>
			<div class="post-footer">
				<?php themepixels_social_share( tps_get_option('pages_social_sharing_links') ); ?>
			</div><!-- End .post-footer -->
		<?php } ?>
	</div><!-- End .post-box -->
</article><!-- End #post-## -->