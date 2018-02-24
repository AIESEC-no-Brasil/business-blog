<?php
/**
 * Contact Info Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_contact_info' );
function themepixels_register_widget_contact_info() {
	register_widget( 'themepixels_widget_contact_info' );
}

class themepixels_widget_contact_info extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'contact_info_widget', 'description' => __( 'Show your contact details', 'themepixels' ) );
		parent::__construct( 'themepixels_contact_info', __( 'Themepixels - Contact Info', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$address = $instance['address'];
		$phone = $instance['phone'];
		$mobile = $instance['mobile'];
		$email = $instance['email'];
		$website = $instance['website'];

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		} ?>

		<div class="contact-info-widget clearfix">
			<ul>
				<?php if ( $address ) { ?>
					<li>
						<i class="fa fa-map-marker"></i>
						<p><?php echo esc_attr( $address ); ?></p>
					</li>
				<?php } ?>
				<?php if ( $phone ) { ?>
					<li>
						<i class="fa fa-phone"></i>
						<p><?php echo esc_attr( $phone ); ?></p>
					</li>
				<?php } ?>
				<?php if ( $mobile ) { ?>
					<li>
						<i class="fa fa-mobile"></i>
						<p><?php echo esc_attr( $mobile ); ?></p>
					</li>
				<?php } ?>
				<?php if ( $email ) { ?>
					<li>
						<i class="fa fa-envelope-o"></i>
						<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a></p>
					</li>
				<?php } ?>
				<?php if ( $website ) { ?>
					<li>
						<i class="fa fa-link"></i>
						<p><a href="<?php echo esc_url( $website ); ?>"><?php echo esc_url( $website ); ?></a></p>
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
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['mobile'] = $new_instance['mobile'];
		$instance['email'] = $new_instance['email'];
		$instance['website'] = $new_instance['website'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'		=> '',
			'address'	=> '',
			'phone'		=> '',
			'mobile'	=> '',
			'email'		=> '',
			'website'	=> ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>"><?php _e( 'Address:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr( $instance['address'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e( 'Phone:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr( $instance['phone'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mobile'); ?>"><?php _e( 'Mobile:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" type="text" value="<?php echo esc_attr( $instance['mobile'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e( 'Email:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('website'); ?>"><?php _e( 'Website:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo esc_url( $instance['website'] ); ?>" />
		</p>
	<?php
	}
}