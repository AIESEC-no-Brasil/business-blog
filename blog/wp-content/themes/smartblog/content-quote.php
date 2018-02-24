<?php
/**
 * Content - Quote
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry clearfix'); ?>>
	<div class="post-box">
		<div class="post-media">
			<?php
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
			?>
		</div><!-- End .post-media -->
	</div><!-- End .post-box -->
</article><!-- End #post-## -->