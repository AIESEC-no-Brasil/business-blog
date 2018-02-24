<?php
/**
 * Posts Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_posts' );
function themepixels_register_widget_posts() {
	register_widget( 'themepixels_widget_posts' );
}

class themepixels_widget_posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'posts_widget', 'description' => __( 'Display Posts order by : Popular, Random, Recent', 'themepixels' ) );
		parent::__construct( 'themepixels_posts', __( 'Themepixels - Posts', 'themepixels' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$posts_cat_id = $instance['posts_cat_id'];
		$posts_order_by = $instance['posts_order_by'];
		$posts_time_range = $instance['posts_time_range'];
		$post_count = intval( $instance['post_count'] );
		$enable_post_thumbnail = isset( $instance['enable_post_thumbnail'] ) ? true : false;
		$enable_post_meta = isset( $instance['enable_post_meta'] ) ? true : false;

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
			'orderby'				=> $posts_order_by,
			'order'					=> 'DESC',
			'date_query' => array(
				array(
					'after'  => $posts_time_range,
				),
			),
		);

		$posts_query = new WP_Query($args); ?>

		<?php if ( $posts_query->have_posts() ) { ?>
			<div class="posts-widget-wrapper clearfix">
				<ul class="widget-post-list">
					<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
						<li id="post-<?php the_ID(); ?>" <?php post_class('widget-post-entry clearfix'); ?>>
							<?php if ( has_post_thumbnail() && $enable_post_thumbnail == true ) { ?>
								<figure class="widget-post-thumbnail-wrapper">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail( 'post-widget-thumb' ); ?>
									</a>
								</figure>
							<?php } ?>
							<div class="widget-post-info-wrap">
								<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<?php if ( $enable_post_meta == true ) { ?>
									<div class="widget-post-meta clearfix">
										<ul>
											<li><i class="fa fa-clock-o"></i><span><?php echo get_the_date(); ?></span></li>
										</ul>
									</div>
								<?php } ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php }
		wp_reset_postdata();

		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts_cat_id'] = $new_instance['posts_cat_id'];
		$instance['posts_order_by'] = $new_instance['posts_order_by'];
		$instance['posts_time_range'] = $new_instance['posts_time_range'];
		$instance['post_count'] = $new_instance['post_count'];
		$instance['enable_post_thumbnail'] = $new_instance['enable_post_thumbnail'];
		$instance['enable_post_meta'] = $new_instance['enable_post_meta'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'title'					=> '',
			'posts_cat_id'			=> '0',
			'posts_order_by'		=> 'date',
			'posts_time_range'		=> '0',
			'post_count'			=> 5,
			'enable_post_thumbnail'	=> 'on',
			'enable_post_meta'		=> 'on'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_cat_id'); ?>"><?php _e( 'Category:', 'themepixels' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true, 'class' => 'widefat' ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_order_by'); ?>"><?php _e( 'Order by:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('posts_order_by'); ?>" id="<?php echo $this->get_field_id('posts_order_by'); ?>" class="widefat">
				<option value="date"<?php selected( $instance['posts_order_by'], 'date' ); ?>><?php _e( 'Most recent', 'themepixels' ); ?></option>
				<option value="comment_count"<?php selected( $instance['posts_order_by'], 'comment_count' ); ?>><?php _e( 'Most commented', 'themepixels' ); ?></option>
				<option value="rand"<?php selected( $instance['posts_order_by'], 'rand' ); ?>><?php _e( 'Random', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_time_range'); ?>"><?php _e( 'Time Range:', 'themepixels' ); ?></label>
			<select name="<?php echo $this->get_field_name('posts_time_range'); ?>" id="<?php echo $this->get_field_id('posts_time_range'); ?>" class="widefat">
				<option value="0"<?php selected( $instance['posts_time_range'], '0' ); ?>><?php _e( 'All time', 'themepixels' ); ?></option>
				<option value="1 year ago"<?php selected( $instance['posts_time_range'], '1 year ago' ); ?>><?php _e( 'This year', 'themepixels' ); ?></option>
				<option value="1 month ago"<?php selected( $instance['posts_time_range'], '1 month ago' ); ?>><?php _e( 'This month', 'themepixels' ); ?></option>
				<option value="1 week ago"<?php selected( $instance['posts_time_range'], '1 week ago' ); ?>><?php _e( 'This week', 'themepixels' ); ?></option>
				<option value="1 day ago"<?php selected( $instance['posts_time_range'], '1 day ago' ); ?>><?php _e( 'Past 24 hours', 'themepixels' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e( 'Number of posts to show:', 'themepixels' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo intval( $instance['post_count'] ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_post_thumbnail'); ?>" name="<?php echo $this->get_field_name('enable_post_thumbnail'); ?>"<?php checked( $instance['enable_post_thumbnail'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('enable_post_thumbnail'); ?>"><?php _e( 'Enable Post Thumbnail', 'themepixels' ); ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_post_meta'); ?>" name="<?php echo $this->get_field_name('enable_post_meta'); ?>"<?php checked( $instance['enable_post_meta'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('enable_post_meta'); ?>"><?php _e( 'Enable Post Meta', 'themepixels' ); ?></label>
		</p>
	<?php
	}
}