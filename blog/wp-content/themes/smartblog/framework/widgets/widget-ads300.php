<?php
/**
 * Ads 300 x 250 Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_ads_300_250' );
function themepixels_register_widget_ads_300_250() {
	register_widget( 'themepixels_widget_ads_300_250' );
}

class themepixels_widget_ads_300_250 extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'ads_300_250_widget', 'description' => __( 'Display ads 300x250', 'themepixels' ) );
		parent::__construct( 'themepixels_ads_300_250', __( 'Themepixels - Ads 300 x 250', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$ad_img_url = $instance['ad_img_url'];
		$ad_link_url = $instance['ad_link_url'];
		$link_target = isset( $instance['link_target'] ) ? true : false; ?>

		<div class="ads300-250-widget-wrapper clearfix">
			<?php if ( $ad_img_url ) { ?>
				<div class="ad-block">
					<?php if ( $ad_link_url ) { ?>
						<a href="<?php echo esc_url( $ad_link_url ); ?>" <?php if( $link_target == true ) { echo 'target="_blank"'; } ?>>
					<?php } ?>
						<img src="<?php echo esc_url( $ad_img_url ); ?>" alt="" />
					<?php if ( $ad_link_url ) { ?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['ad_img_url'] = $new_instance['ad_img_url'];
		$instance['ad_link_url'] = $new_instance['ad_link_url'];
		$instance['link_target'] = $new_instance['link_target'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'ad_img_url'	=> '',
			'ad_link_url'	=> '',
			'link_target'	=> ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('ad_img_url'); ?>"><?php _e( 'Ad Image URL:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_img_url'); ?>" name="<?php echo $this->get_field_name('ad_img_url'); ?>" type="text" value="<?php echo esc_url( $instance['ad_img_url'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_link_url'); ?>"><?php _e( 'Ad Link URL:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_link_url'); ?>" name="<?php echo $this->get_field_name('ad_link_url'); ?>" type="text" value="<?php echo esc_url( $instance['ad_link_url'] ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('link_target'); ?>" name="<?php echo $this->get_field_name('link_target'); ?>"<?php checked( $instance['link_target'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('link_target'); ?>"><?php _e( 'Open links in a new window', 'themepixels' ); ?></label>
		</p>
	<?php
	}
}