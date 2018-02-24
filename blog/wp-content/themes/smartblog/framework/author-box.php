<?php
/**
 * Author Box
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<div class="author-box clearfix">
	<h3 class="section-title">
		<span><?php _e( 'About The Author', 'themepixels' ); ?></span>
	</h3>
	<div class="author-avatar">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php _e( 'Visit Author Page', 'themepixels' ); ?>" target="_blank"><?php echo get_avatar(get_the_author_meta('user_email'), '90'); ?></a>
	</div><!-- End .author-avatar -->
	<div class="author-desc-wrap">
		<h5 class="author-title"><?php the_author_posts_link(); ?></h5>
		<p class="author-desc"><?php the_author_meta( 'description' ); ?></p>
		<div class="author-social">
			<ul class="social-icons social-rounded social-colored">
				<?php if ( get_the_author_meta('url') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>" class="social-home" data-toggle="tooltip" data-placement="top" title="<?php echo get_the_author_meta( 'display_name' ); ?><?php _e( " 's site", 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-home"></i>
							<i class="fa fa-home"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_facebook') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_facebook') ); ?>" class="social-facebook" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Facebook', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-facebook"></i>
							<i class="fa fa-facebook"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_twitter') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_twitter') ); ?>" class="social-twitter" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Twitter', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-twitter"></i>
							<i class="fa fa-twitter"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_googleplus') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_googleplus') ); ?>" class="social-google-plus" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Google Plus', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-google-plus"></i>
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_dribbble') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_dribbble') ); ?>" class="social-dribbble" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Dribbble', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-dribbble"></i>
							<i class="fa fa-dribbble"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_linkedin') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_linkedin') ); ?>" class="social-linkedin" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Linkedin', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-linkedin"></i>
							<i class="fa fa-linkedin"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_pinterest') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_pinterest') ); ?>" class="social-pinterest" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Pinterest', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-pinterest"></i>
							<i class="fa fa-pinterest"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_youtube') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_youtube') ); ?>" class="social-youtube" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Youtube', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-youtube"></i>
							<i class="fa fa-youtube"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_instagram') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_instagram') ); ?>" class="social-instagram" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Instagram', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-instagram"></i>
							<i class="fa fa-instagram"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( get_the_author_meta('themepixels_github') ) { ?>
					<li>
						<a href="<?php echo esc_url( get_the_author_meta('themepixels_github') ); ?>" class="social-github" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Github', 'themepixels' ); ?>" target="_blank">
							<i class="fa fa-github"></i>
							<i class="fa fa-github"></i>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div><!-- End .author-desc-wrap -->
</div><!-- End .author-box -->