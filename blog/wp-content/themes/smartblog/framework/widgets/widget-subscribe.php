<?php
/**
 * Subscribe Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_subscribe' );
function themepixels_register_widget_subscribe() {
	register_widget( 'themepixels_widget_subscribe' );
}

class themepixels_widget_subscribe extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'subscribe_widget', 'description' => __( 'Display the subscribe box', 'themepixels' ) );
		parent::__construct( 'themepixels_subscribe', __( 'Themepixels - Subscribe', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$feedburner_id = $instance['feedburner_id'];

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		} ?>

		<div class="feedburner-widget-wrapper clearfix">
			<?php if( $feedburner_id ) { ?>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr( $feedburner_id ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					<div class="row">
						<div class="form-group col-md-12">
							<input type="email" class="form-control" name="email" placeholder="<?php _e( 'Enter your e-mail address' , 'themepixels') ; ?>">
							<input type="hidden" value="<?php echo esc_attr( $feedburner_id ); ?>" name="uri">
							<input type="hidden" name="loc" value="en_US">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="submit" class="btn btn-md btn-squared btn-primary btn-block" value="<?php _e( 'Subscribe' , 'themepixels') ; ?>">
						</div>
					</div>
				</form>
			<?php } ?>
		</div>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['feedburner_id'] = $new_instance['feedburner_id'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'				=> '',
			'feedburner_id'		=> ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('feedburner_id'); ?>"><?php _e( 'Feedburner ID: ', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('feedburner_id'); ?>" name="<?php echo $this->get_field_name('feedburner_id'); ?>" type="text" value="<?php echo esc_attr( $instance['feedburner_id'] ); ?>" />
		</p>
	<?php
	}
}