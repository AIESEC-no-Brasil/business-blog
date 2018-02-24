<?php
/**
 * Content - Single
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry clearfix'); ?>>
	<div class="post-box">
		<?php if ( ( tps_get_option( 'enable_post_header_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_header', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_header_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_header', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_header', '', get_the_ID() ) == 'yes' ) { ?>
			<div class="post-header clearfix">
				<?php switch( get_post_format() ) {
					case 'audio':
						$format_icon = 'fa fa-music';
						break;
					case 'gallery':
						$format_icon = 'fa fa-image';
						break;
					case 'image':
						$format_icon = 'fa fa-camera';
						break;
					case 'link':
						$format_icon = 'fa fa-link';
						break;
					case 'quote':
						$format_icon = 'fa fa-quote-left';
						break;
					case 'status':
						$format_icon = 'fa fa-twitter';
						break;
					case 'video':
						$format_icon = 'fa fa-film';
						break;
					default:
						$format_icon = 'fa fa-pencil';
						break;
				} ?>
				<div class="post-format-icon post-format-standard">
					<i class="<?php echo esc_attr( $format_icon ); ?>"></i>
				</div>
				<div class="post-info-wrap">
					<h1 class="post-title entry-title"><?php the_title(); ?></h1>
					<?php if ( ( tps_get_option( 'enable_post_meta_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_meta_single', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_meta_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_meta_single', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_meta_single', '', get_the_ID() ) == 'yes' ) { ?>
						<div class="post-meta clearfix">
							<?php themepixels_post_meta( tps_get_option('post_meta_links_single') ); ?>
						</div>
					<?php } ?>
				</div>
			</div><!-- End .post-header -->
		<?php } ?>
		<?php if ( ( tps_get_option( 'enable_featured_content_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_featured_content', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_featured_content_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_featured_content', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_featured_content', '', get_the_ID() ) == 'yes' ) { ?>
			<div class="post-media">
				<?php switch( get_post_format() ) {
					case 'audio':
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
						}
						break;
					case 'gallery':
						$post_gallery_images = rwmb_meta( 'themepixels_post_gallery_images', 'type=image_advanced', get_the_ID() );

						if( $post_gallery_images ) { ?>
							<div class="post-gallery-wrapper flexslider">
								<ul class="slides">
									<?php foreach ( $post_gallery_images as $post_gallery_images_id ) { ?>
										<li>
											<?php echo wp_get_attachment_image( $post_gallery_images_id["ID"], "blog-single" ); ?>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php }
						break;
					case 'image':
						if ( has_post_thumbnail() ) { ?>
							<figure class="post-thumbnail-wrapper">
								<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
								<a href="<?php echo esc_url( $img_src[0] ); ?>" class="img-lightbox" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
									<?php the_post_thumbnail( 'blog-single' ); ?>
									<div class="thumb-overlay">
										<i class="fa fa-search"></i>
									</div>
								</a>
							</figure>
						<?php }
						break;
					case 'link':
						$post_link_title = rwmb_meta( 'themepixels_post_link_title', '', get_the_ID() );
						$post_link_url = rwmb_meta( 'themepixels_post_link_url', '', get_the_ID() );
						$post_link_target = rwmb_meta( 'themepixels_post_link_target', '', get_the_ID() );

						if( $post_link_url != '' ) { ?>
							<?php if ( has_post_thumbnail() ) {
								$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
								?>
								<div class="post-link-wrapper clearfix" style="background-image:url(<?php echo esc_url( $img_src[0] ); ?>); background-size: cover;">
									<div class="post-link-overlay"></div>
									<div class="post-link-head-content">
										<a href="<?php echo esc_url( $post_link_url ); ?>" <?php if( $post_link_target != 'no' ) { echo 'target="_blank"'; } ?>><?php echo ( !empty( $post_link_title ) ? $post_link_title : get_the_title() ); ?></a>
									</div>
								</div>
							<?php } else { ?>
								<div class="post-link-wrapper clearfix">
									<div class="post-link-overlay" style="opacity: 1;"></div>
									<div class="post-link-head-content">
										<a href="<?php echo esc_url( $post_link_url ); ?>" <?php if( $post_link_target != 'no' ) { echo 'target="_blank"'; } ?>><?php echo ( !empty( $post_link_title ) ? $post_link_title : get_the_title() ); ?></a>
									</div>
								</div>
							<?php } ?>
						<?php }
						break;
					case 'quote':
						$post_quote = rwmb_meta( 'themepixels_post_quote', '', get_the_ID() );
						$post_quote_author = rwmb_meta( 'themepixels_post_quote_author', '', get_the_ID() );
						$post_quote_source_url = rwmb_meta( 'themepixels_post_quote_source_url', '', get_the_ID() );

						if ( has_post_thumbnail() ) {
							$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
							?>
							<div class="post-quote-wrapper clearfix" style="background-image:url(<?php echo esc_url( $img_src[0] ); ?>); background-size: cover;">
								<div class="post-quote-overlay"></div>
								<div class="post-quote-content">
									<p><?php echo esc_html( $post_quote ); ?></p>
									<div class="post-quote-author">
										<?php if( $post_quote_source_url ) { ?>
											<a href="<?php echo esc_url( $post_quote_source_url ); ?>"><?php echo esc_html( $post_quote_author ); ?></a>
										<?php } else { ?>
											<?php echo esc_html( $post_quote_author ); ?>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="post-quote-wrapper clearfix">
								<div class="post-quote-overlay" style="opacity: 1;"></div>
								<div class="post-quote-content">
									<p><?php echo esc_html( $post_quote ); ?></p>
									<div class="post-quote-author">
										<?php if( $post_quote_source_url ) { ?>
											<a href="<?php echo esc_url( $post_quote_source_url ); ?>"><?php echo esc_html( $post_quote_author ); ?></a>
										<?php } else { ?>
											<?php echo esc_html( $post_quote_author ); ?>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php }
						break;
					case 'status':
						$twitter_embed_code = rwmb_meta( 'themepixels_post_status_twitter_embed_code', 'type=textarea', get_the_ID() );

						if ( has_post_thumbnail() ) {
							$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
						}

						if( $twitter_embed_code ) { ?>
							<div class="post-status-wrapper clearfix" <?php echo ( has_post_thumbnail() ) ? 'style="background-image:url('. esc_url( $img_src[0] ) .'); background-size: cover;"' : 'style="background-color: #000;"'; ?>>
								<?php echo wp_oembed_get( $twitter_embed_code ); ?>
							</div>
						<?php }
						break;
					case 'video':
						$post_embed_video = rwmb_meta( 'themepixels_post_video_embed_url', 'type=oembed', get_the_ID() );
						$post_self_hosted_video = rwmb_meta( 'themepixels_post_self_hosted_video', 'type=file_input', get_the_ID() );
						if ( has_post_thumbnail() ) {
							$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
						}

						if( rwmb_meta( 'themepixels_video_type', '', get_the_ID() ) == 'embed' ) {
							if( $post_embed_video != '' ) { ?>
								<div class="post-video-wrapper responsive-video-wrapper clearfix"><?php echo wp_oembed_get( $post_embed_video ); ?></div>
							<?php }
						} elseif( rwmb_meta( 'themepixels_video_type', '', get_the_ID() ) == 'selfhosted' ) {
							if( $post_self_hosted_video != '' ) { ?>
								<div class="post-video-wrapper clearfix">
									<?php echo do_shortcode( '[video src="'. esc_url( $post_self_hosted_video ) .'" poster="'. esc_url( $img_src[0] ) .'"][/video]' ); ?>
								</div>
							<?php }
						}
						break;
					default:
						if ( has_post_thumbnail() ) { ?>
							<figure class="post-thumbnail-wrapper img-no-hover">
								<?php the_post_thumbnail( 'blog-single' ); ?>
							</figure>
						<?php }
						break;
				} ?>
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
			<div class="post-meta-footer">
				<?php
					$categories_list = get_the_category_list( __( ', ', 'themepixels' ) );
					$tags_list = get_the_tag_list( '', __( ', ', 'themepixels' ) );
				?>
				<?php if ( $categories_list || $tags_list ) { ?>
					<ul>
						<?php
							if ( ( tps_get_option( 'enable_post_category_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_categories', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_category_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_categories', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_categories', '', get_the_ID() ) == 'yes' ) {
								if ( $categories_list ) {
									printf( '<li class="cat-links"><i class="fa fa-folder-open"></i>' . __( 'Categories: %1$s', 'themepixels' ) . '</li>', $categories_list );
								}
							}
							if ( ( tps_get_option( 'enable_post_tags_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_tags', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'enable_post_tags_single' ) == '1' && rwmb_meta( 'themepixels_enable_post_tags', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_tags', '', get_the_ID() ) == 'yes' ) {
								if ( $tags_list ) {
									printf( '<li class="tags-links"><i class="fa fa-tags"></i>' . __( 'Tags: %1$s', 'themepixels' ) . '</li>', $tags_list );
								}
							}
						?>
					</ul>
				<?php } ?>
				<span class="vcard author" style="display: none;">
					<span class="fn" style="display: none;"><?php the_author_posts_link(); ?></span>
				</span>
				<span class="date updated" style="display: none;"><?php the_time(); ?></span>
			</div>
		</div><!-- End .post-content -->
		<?php if ( ( tps_get_option( 'single_posts_social_share' ) == '1' && rwmb_meta( 'themepixels_enable_post_share', '', get_the_ID() ) == 'default' ) || ( tps_get_option( 'single_posts_social_share' ) == '1' && rwmb_meta( 'themepixels_enable_post_share', '', get_the_ID() ) == '' ) || rwmb_meta( 'themepixels_enable_post_share', '', get_the_ID() ) == 'yes' ) { ?>
			<div class="post-footer">
				<?php themepixels_social_share( tps_get_option('single_posts_social_sharing_links') ); ?>
			</div><!-- End .post-footer -->
		<?php } ?>
	</div><!-- End .post-box -->
</article><!-- End #post-## -->