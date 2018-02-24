<?php
/**
 * Tweets Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_tweets' );
function themepixels_register_widget_tweets() {
	register_widget( 'themepixels_widget_tweets' );
}

class themepixels_widget_tweets extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'tweets_widget', 'description' => __( 'Display recent tweets', 'themepixels' ) );
		parent::__construct( 'themepixels_tweets', __( 'Themepixels - Tweets', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$widget_id = strip_tags( $instance['widget_id'] );
		$height = intval( $instance['height'] );
		$theme = $instance['theme'];
		$link_color = $instance['link_color'];
		$border_color = $instance['border_color'];
		$show_header = isset( $instance['show_header'] ) ? true : false;
		$show_footer = isset( $instance['show_footer'] ) ? true : false;
		$remove_borders = isset( $instance['remove_borders'] ) ? true : false;
		$transparent_bg = isset( $instance['transparent_bg'] ) ? true : false;

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		} ?>

		<div class="tweet-widget-wrapper">
			<?php if( $widget_id ) { ?>
				<a class="twitter-timeline" data-widget-id="<?php echo esc_attr( $widget_id ); ?>" <?php echo 'data-theme="'. esc_attr( $theme ) .'"'; if( $link_color ) { echo ' data-link-color="'. esc_attr( $link_color ) .'"'; } if( $border_color ) { echo ' data-border-color="'. esc_attr( $border_color ) .'"'; } if( $height ) { echo ' height="'. esc_attr( $height ) .'"'; } ?> width="300" data-chrome="<?php if( $show_header == false ) { echo "noheader "; } if( $show_footer == false ) { echo "nofooter "; } if( $remove_borders == true ) { echo "noborders "; } if( $transparent_bg == true ) { echo "transparent"; } ?>"></a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<?php } ?>
		</div>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['widget_id'] = strip_tags( $new_instance['widget_id'] );
		$instance['height'] = (int) strip_tags( $new_instance['height'] );
		$instance['theme'] = $new_instance['theme'];
		$instance['link_color'] = $new_instance['link_color'];
		$instance['border_color'] = $new_instance['border_color'];
		$instance['show_header'] = $new_instance['show_header'];
		$instance['show_footer'] = $new_instance['show_footer'];
		$instance['remove_borders'] = $new_instance['remove_borders'];
		$instance['transparent_bg'] = $new_instance['transparent_bg'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'				=> '',
			'widget_id'			=> '',
			'height'			=> '400',
			'theme'				=> 'light',
			'link_color'		=> '',
			'border_color'		=> '',
			'show_header'		=> 'off',
			'show_footer'		=> 'off',
			'remove_borders'	=> 'on',
			'transparent_bg'	=> 'off'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('widget_id'); ?>"><?php _e( 'Widget ID:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('widget_id'); ?>" name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" value="<?php echo esc_attr( $instance['widget_id'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo intval( $instance['height'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('theme'); ?>"><?php _e( 'Theme:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('theme'); ?>" id="<?php echo $this->get_field_id('theme'); ?>" class="widefat">
				<option value="light"<?php selected( $instance['theme'], 'light' ); ?>><?php _e( 'Light', 'themepixels' ); ?></option>
				<option value="dark"<?php selected( $instance['theme'], 'dark' ); ?>><?php _e( 'Dark', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link_color'); ?>"><?php _e( 'Link Color - Hex Code:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link_color'); ?>" name="<?php echo $this->get_field_name('link_color'); ?>" type="text" value="<?php echo esc_attr( $instance['link_color'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e( 'Border Color - Hex Code:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" type="text" value="<?php echo esc_attr( $instance['border_color'] ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_header'); ?>" name="<?php echo $this->get_field_name('show_header'); ?>"<?php checked( $instance['show_header'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('show_header'); ?>"><?php _e( 'Show Header', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_footer'); ?>" name="<?php echo $this->get_field_name('show_footer'); ?>"<?php checked( $instance['show_footer'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('show_footer'); ?>"><?php _e( 'Show Footer', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('remove_borders'); ?>" name="<?php echo $this->get_field_name('remove_borders'); ?>"<?php checked( $instance['remove_borders'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('remove_borders'); ?>"><?php _e( 'Remove Borders', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('transparent_bg'); ?>" name="<?php echo $this->get_field_name('transparent_bg'); ?>"<?php checked( $instance['transparent_bg'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('transparent_bg'); ?>"><?php _e( 'Transparent Background', 'themepixels' ); ?></label>
		</p>
	<?php
	}
}