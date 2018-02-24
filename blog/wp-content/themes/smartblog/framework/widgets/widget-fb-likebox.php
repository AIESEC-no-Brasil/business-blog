<?php
/**
 * Facebook Likebox Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_fb_likebox' );
function themepixels_register_widget_fb_likebox() {
	register_widget( 'themepixels_widget_fb_likebox' );
}

class themepixels_widget_fb_likebox extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'facebook_likebox_widget', 'description' => __( 'Display facebook likebox', 'themepixels' ) );
		parent::__construct( 'themepixels_fb_likebox', __( 'Themepixels - Facebook Likebox', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$page_url = $instance['page_url'];
		$width = intval( $instance['width'] );
		$height = intval( $instance['height'] );
		$show_faces = isset( $instance['show_faces'] ) ? 'true' : 'false';
		$show_cover_photo = isset( $instance['show_cover_photo'] ) ? 'false' : 'true';
		$show_posts = isset( $instance['show_posts'] ) ? 'true' : 'false';
		$use_small_header = isset( $instance['use_small_header'] ) ? 'true' : 'false';
		$language = get_locale();

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		} ?>

		<?php if ( $page_url ) : ?>

			<script>
				(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.4";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>

			<div class="fb-likebox-widget-wrapper <?php echo $args['widget_id']; ?>" id="fb-root">
				<div class="fb-page" data-href="<?php echo $page_url; ?>" data-width="<?php echo intval( $width ); ?>" data-height="<?php echo intval( $height ); ?>" data-small-header="<?php echo $use_small_header; ?>" data-adapt-container-width="true" data-hide-cover="<?php echo $show_cover_photo; ?>" data-show-facepile="<?php echo $show_faces; ?>" data-show-posts="<?php echo $show_posts; ?>"></div>
			</div>
			<?php endif;

		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['page_url'] = $new_instance['page_url'];
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
		$instance['show_faces'] = $new_instance['show_faces'];
		$instance['show_cover_photo'] = $new_instance['show_cover_photo'];
		$instance['show_posts'] = $new_instance['show_posts'];
		$instance['use_small_header'] = $new_instance['use_small_header'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'				=> '',
			'page_url'			=> '',
			'width'				=> '360',
			'height'			=> '258',
			'show_faces'		=> 'on',
			'show_cover_photo'	=> 'on',
			'show_posts'		=> 'off',
			'use_small_header'	=> 'off'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<h4 style="line-height: 1.6em;"><?php _e( 'IMPORTANT: Facebook has abandoned color scheme option for the page plugin, thus the option is also no longer available in the widget.', 'themepixels' ); ?></h4>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e( 'Page URL:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" type="text" value="<?php echo esc_url( $instance['page_url'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width (Min 180 to Max 500):', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo intval( $instance['width'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo intval( $instance['height'] ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>"<?php checked( $instance['show_faces'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php _e( 'Show Freiend\'s Faces', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_posts'); ?>" name="<?php echo $this->get_field_name('show_posts'); ?>"<?php checked( $instance['show_posts'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('show_posts'); ?>"><?php _e( 'Show Posts', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_cover_photo'); ?>" name="<?php echo $this->get_field_name('show_cover_photo'); ?>"<?php checked( $instance['show_cover_photo'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('show_cover_photo'); ?>"><?php _e( 'Show Cover Photo', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('use_small_header'); ?>" name="<?php echo $this->get_field_name('use_small_header'); ?>"<?php checked( $instance['use_small_header'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('use_small_header'); ?>"><?php _e( 'Use Small Header', 'themepixels' ); ?></label>
		</p>
	<?php
	}
}