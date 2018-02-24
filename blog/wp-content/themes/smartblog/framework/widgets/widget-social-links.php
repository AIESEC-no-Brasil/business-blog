<?php
/**
 * Social Links
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_social_links' );
function themepixels_register_widget_social_links() {
	register_widget( 'themepixels_widget_social_links' );
}

class themepixels_widget_social_links extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'social_links_widget', 'description' => __( 'Add social icons to your website', 'themepixels' ) );
		parent::__construct( 'themepixels_social_links', __( 'Themepixels - Social Links', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$type = $instance['type'];
		$style = $instance['style'];
		$tooltip_pos = $instance['tooltip_pos'];
		$enable_large_icons = isset( $instance['enable_large_icons'] ) ? true : false;
		$link_target = isset( $instance['link_target'] ) ? true : false;
		$social_icons = $instance['social_icons'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$google_plus = $instance['google_plus'];
		$linkedin = $instance['linkedin'];
		$dribbble = $instance['dribbble'];
		$skype = $instance['skype'];
		$github = $instance['github'];
		$flickr = $instance['flickr'];
		$instagram = $instance['instagram'];
		$pinterest = $instance['pinterest'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;;
		} ?>

		<div class="social-links-widget-wrapper">
			<ul class="social-icons <?php if( $type != '' ) { echo esc_attr( $type ); } ?> <?php if( $style != '' ) { echo esc_attr( $style ); } if( $enable_large_icons == true ) { echo ' social-large'; } ?>">
				<?php if ( $twitter ) { ?>
					<li>
						<a href="<?php echo esc_url( $twitter ); ?>" class="social-twitter" title="Twitter" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-twitter"></i> <i class="fa fa-twitter"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $facebook ) { ?>
					<li>
						<a href="<?php echo esc_url( $facebook ); ?>" class="social-facebook" title="Facebook" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-facebook"></i> <i class="fa fa-facebook"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $google_plus ) { ?>
					<li>
						<a href="<?php echo esc_url( $google_plus ); ?>" class="social-google-plus" title="Google Plus" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $linkedin ) { ?>
					<li>
						<a href="<?php echo esc_url( $linkedin ); ?>" class="social-linkedin" title="Linkedin" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $dribbble ) { ?>
					<li>
						<a href="<?php echo esc_url( $dribbble ); ?>" class="social-dribbble" title="Dribbble" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-dribbble"></i><i class="fa fa-dribbble"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $skype ) { ?>
					<li>
						<a href="<?php echo esc_attr( $skype ); ?>" class="social-skype" title="Skype" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-skype"></i><i class="fa fa-skype"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $github ) { ?>
					<li>
						<a href="<?php echo esc_url( $github ); ?>" class="social-github" title="Github" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-github"></i><i class="fa fa-github"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $flickr ) { ?>
					<li>
						<a href="<?php echo esc_url( $flickr ); ?>" class="social-flickr" title="Flickr" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-flickr"></i><i class="fa fa-flickr"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $instagram ) { ?>
					<li>
						<a href="<?php echo esc_url( $instagram ); ?>" class="social-instagram" title="Instagram" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-instagram"></i><i class="fa fa-instagram"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $pinterest ) { ?>
					<li>
						<a href="<?php echo esc_url( $pinterest ); ?>" class="social-pinterest" title="Pinterest" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . $tooltip_pos . '"'; } ?>>
							<i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $youtube ) { ?>
					<li>
						<a href="<?php echo esc_url( $youtube ); ?>" class="social-youtube" title="Youtube" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-youtube"></i><i class="fa fa-youtube"></i>
						</a>
					</li>
				<?php } ?>
				<?php if ( $vimeo ) { ?>
					<li>
						<a href="<?php echo esc_url( $vimeo ); ?>" class="social-vimeo" title="Vimeo" <?php if( $link_target == true ) { echo 'target="_blank"'; } if( $tooltip_pos != 'none' ) { echo ' data-toggle="tooltip" data-placement="' . esc_attr( $tooltip_pos ) . '"'; } ?>>
							<i class="fa fa-vimeo-square"></i><i class="fa fa-vimeo-square"></i>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
		$instance['style'] = $new_instance['style'];
		$instance['tooltip_pos'] = $new_instance['tooltip_pos'];
		$instance['enable_large_icons'] = $new_instance['enable_large_icons'];
		$instance['link_target'] = $new_instance['link_target'];
		$instance['social_icons'] = $new_instance['social_icons'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['google_plus'] = $new_instance['google_plus'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['skype'] = $new_instance['skype'];
		$instance['github'] = $new_instance['github'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'					=> '',
			'type'					=> '',
			'style'					=> '',
			'tooltip_pos'			=> 'none',
			'enable_large_icons'	=> 'off',
			'link_target'			=> 'on',
			'twitter'				=> '',
			'facebook'				=> '',
			'google_plus'			=> '',
			'linkedin'				=> '',
			'dribbble'				=> '',
			'skype'					=> '',
			'github'				=> '',
			'flickr'				=> '',
			'instagram'				=> '',
			'pinterest'				=> '',
			'youtube'				=> '',
			'vimeo'					=> ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e( 'Type:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="widefat">
				<option value=""<?php selected( $instance['type'], '' ); ?>><?php _e( 'Default', 'themepixels' ); ?></option>
				<option value="social-squared"<?php selected( $instance['type'], 'social-squared' ); ?>><?php _e( 'Square', 'themepixels' ); ?></option>
				<option value="social-rounded"<?php selected( $instance['type'], 'social-rounded' ); ?>><?php _e( 'Circle', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e( 'Style:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>" class="widefat">
				<option value=""<?php selected( $instance['style'], '' ); ?>><?php _e( 'Light', 'themepixels' ); ?></option>
				<option value="social-dark"<?php selected( $instance['style'], 'social-dark' ); ?>><?php _e( 'Dark', 'themepixels' ); ?></option>
				<option value="social-colored"<?php selected( $instance['style'], 'social-colored' ); ?>><?php _e( 'Colored', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tooltip_pos'); ?>"><?php _e( 'Tooltip Position:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('tooltip_pos'); ?>" id="<?php echo $this->get_field_id('tooltip_pos'); ?>" class="widefat">
				<option value="none"<?php selected( $instance['tooltip_pos'], 'none' ); ?>><?php _e( 'None', 'themepixels' ); ?></option>
				<option value="top"<?php selected( $instance['tooltip_pos'], 'top' ); ?>><?php _e( 'Top', 'themepixels' ); ?></option>
				<option value="right"<?php selected( $instance['tooltip_pos'], 'right' ); ?>><?php _e( 'Right', 'themepixels' ); ?></option>
				<option value="bottom"<?php selected( $instance['tooltip_pos'], 'bottom' ); ?>><?php _e( 'Bottom', 'themepixels' ); ?></option>
				<option value="left"<?php selected( $instance['tooltip_pos'], 'left' ); ?>><?php _e( 'Left', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_large_icons'); ?>" name="<?php echo $this->get_field_name('enable_large_icons'); ?>"<?php checked( $instance['enable_large_icons'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('enable_large_icons'); ?>"><?php _e( 'Enable Large Icons', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('link_target'); ?>" name="<?php echo $this->get_field_name('link_target'); ?>"<?php checked( $instance['link_target'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('link_target'); ?>"><?php _e( 'Open links in a new window', 'themepixels' ); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e( 'Twitter:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_url( $instance['twitter'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e( 'Facebook:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_url( $instance['facebook'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus'); ?>"><?php _e( 'Google Plus:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_plus'); ?>" name="<?php echo $this->get_field_name('google_plus'); ?>" type="text" value="<?php echo esc_url( $instance['google_plus'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e( 'Linkedin:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_url( $instance['linkedin'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e( 'Dribbble:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_url( $instance['dribbble'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e( 'Skype:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr( $instance['skype'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('github'); ?>"><?php _e( 'Github:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_url( $instance['github'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e( 'Flickr:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_url( $instance['flickr'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e( 'Instagram:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_url( $instance['instagram'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e( 'Pinterest:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_url( $instance['pinterest'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e( 'Youtube:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_url( $instance['youtube'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e( 'Vimeo:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_url( $instance['vimeo'] ); ?>" />
		</p>
	<?php
	}
}