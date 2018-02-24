<?php
/**
 * Ads125 Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_ads125' );
function themepixels_register_widget_ads125() {
	register_widget( 'themepixels_widget_ads125' );
}

class themepixels_widget_ads125 extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'ads125_widget', 'description' => __( 'Display ads 125x125', 'themepixels' ) );
		parent::__construct( 'themepixels_ads125', __( 'Themepixels - Ads 125 x 125', 'themepixels' ), $widget_ops );

		add_action( 'admin_print_styles-widgets.php', array($this, 'themepixels_ads_widget_admin_styles') );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$link_target = isset( $instance['link_target'] ) ? true : false;

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		} ?>

		<div class="ads125-widget-wrapper clearfix">
			<?php for( $i=1; $i <= 10; $i++ ) { ?>
				<?php if ( $instance['ad'. $i .'_img_url'] ) { ?>
					<div class="ad-block">
						<?php if ( $instance['ad'. $i .'_link_url'] ) { ?>
							<a href="<?php echo esc_url( $instance['ad'. $i .'_link_url'] ); ?>" <?php if( $link_target == true ) { echo 'target="_blank"'; } ?>>
						<?php } ?>
							<img src="<?php echo esc_url( $instance['ad'. $i .'_img_url'] ); ?>" alt="" />
						<?php if ( $instance['ad'. $i .'_link_url'] ) { ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link_target'] = $new_instance['link_target'];

		for( $i=1; $i <= 10; $i++ ) {
			$instance['ad'. $i .'_img_url'] = $new_instance['ad'. $i .'_img_url'];
			$instance['ad'. $i .'_link_url'] = $new_instance['ad'. $i .'_link_url'];
		}

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'				=> '',
			'link_target'		=> ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('link_target'); ?>" name="<?php echo $this->get_field_name('link_target'); ?>"<?php checked( $instance['link_target'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('link_target'); ?>"><?php _e( 'Open links in a new window', 'themepixels' ); ?></label>
		</p>
		<?php for( $i=1; $i <= 10; $i++ ) { ?>
			<div class="ads-widget-blocks">
				<h4><?php printf( __( 'Ads Block %s:', 'themepixels' ), $i ) ?></h4>
				<p>
					<label for="<?php echo $this->get_field_id('ad'. $i .'_img_url'); ?>"><?php _e( 'Ad Image URL:', 'themepixels' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('ad'. $i .'_img_url'); ?>" name="<?php echo $this->get_field_name('ad'. $i .'_img_url'); ?>" type="text" value="<?php if( !empty( $instance['ad'. $i .'_img_url'] ) ) echo esc_url( $instance['ad'. $i .'_img_url'] ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('ad'. $i .'_link_url'); ?>"><?php _e( 'Ad Link URL:', 'themepixels' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('ad'. $i .'_link_url'); ?>" name="<?php echo $this->get_field_name('ad'. $i .'_link_url'); ?>" type="text" value="<?php if( !empty( $instance['ad'. $i .'_link_url'] ) ) echo esc_url( $instance['ad'. $i .'_link_url'] ); ?>" />
				</p>
			</div>
		<?php } ?>
	<?php
	}

	function themepixels_ads_widget_admin_styles() { ?>
		<style>
			.widget .widget-inside .ads-widget-blocks {
				background: #fcfcfc;
				padding: 10px;
				border: 1px solid #e3e3e3;
				margin: 15px 0;
			}
			.widget .widget-inside .ads-widget-blocks h4 {
				margin: 10px 0;
			}
		</style>
	<?php
	}
}