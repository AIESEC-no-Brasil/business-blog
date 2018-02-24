<?php
/**
 * Slider Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_slider' );
function themepixels_register_widget_slider() {
	register_widget( 'themepixels_widget_slider' );
}

class themepixels_widget_slider extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'slider_widget', 'description' => __( 'Display Posts slider', 'themepixels' ) );
		parent::__construct( 'themepixels_slider', __( 'Themepixels - Slider', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$post_count = intval( $instance['post_count'] );
		$posts_cat_id = $instance['posts_cat_id'];

		echo $before_widget;
		if( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array(
			'post_type'				=> 'post',
			'posts_per_page'		=> $post_count,
			'cat'					=> $posts_cat_id,
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'post_status'			=> 'publish',
			'meta_query' => array(
				array(
					'key'  => '_thumbnail_id'
				),
			),
		);

		$slider_query = new WP_Query($args); ?>

		<?php if ( $slider_query->have_posts() ) { ?>
			<div class="slider-widget-wrapper clearfix">
				<div class="post-slider-widget flexslider">
					<ul class="slides">
						<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
							<li>
								<figure class="widget-slider-thumbnail-wrapper">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail( 'featured-carousel' ); ?>
									</a>
								</figure>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php }
		wp_reset_postdata();

		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['post_count'] = $new_instance['post_count'];
		$instance['posts_cat_id'] = $new_instance['posts_cat_id'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'					=> '',
			'post_count'			=> 5,
			'posts_cat_id'			=> '0'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e( 'Number of posts to show:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo intval( $instance['post_count'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_cat_id'); ?>"><?php _e( 'Category:', 'themepixels' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true, 'class' => 'widefat' ) ); ?>
		</p>
	<?php
	}
}