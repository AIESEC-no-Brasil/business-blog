<?php
/**
 * Tabs Widget
 *
 * @package Smart Blog
 * @since 1.0
 */

add_action( 'widgets_init', 'themepixels_register_widget_tabs' );
function themepixels_register_widget_tabs() {
	register_widget( 'themepixels_widget_tabs' );
}

class themepixels_widget_tabs extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'classname' => 'tabs-widget', 'description' => __( 'Display Posts order by : Popular, Random, Recent', 'themepixels' ) );
		parent::__construct( 'themepixels_tabs', __( 'Themepixels - Tabs', 'themepixels' ), $widget_ops );

		add_action( 'admin_print_styles-widgets.php', array($this, 'themepixels_tabs_widget_admin_styles') );
	}

	public function widget( $args, $instance ) {
		extract($args);
		$enable_recent_posts = isset( $instance['enable_recent_posts'] ) ? true : false;
		$recent_posts_cat_id = $instance['recent_posts_cat_id'];
		$recent_post_count = intval( $instance['recent_post_count'] );
		$enable_recent_post_thumbnail = isset( $instance['enable_recent_post_thumbnail'] ) ? true : false;
		$enable_recent_post_meta = isset( $instance['enable_recent_post_meta'] ) ? true : false;
		$enable_popular_posts = isset( $instance['enable_popular_posts'] ) ? true : false;
		$popular_posts_cat_id = $instance['popular_posts_cat_id'];
		$poular_posts_time_range = $instance['poular_posts_time_range'];
		$popular_post_count = intval( $instance['popular_post_count'] );
		$enable_popular_post_thumbnail = isset( $instance['enable_popular_post_thumbnail'] ) ? true : false;
		$enable_popular_post_meta = isset( $instance['enable_popular_post_meta'] ) ? true : false;
		$enable_recent_comments = isset( $instance['enable_recent_comments'] ) ? true : false;
		$show_recent_comments_avatar = isset( $instance['show_recent_comments_avatar'] ) ? true : false;
		$recent_comments_count = intval( $instance['recent_comments_count'] );

		echo $before_widget;
		$tab_id = uniqid(); ?>

		<div class="tabs-widget-wrapper clearfix" role="tabpanel">
			<ul class="tabs-widget-nav" role="tablist">
				<?php if ( $enable_recent_posts == true ) { ?>
					<li role="presentation" class="active"><a href="#recent-<?php echo esc_attr( $tab_id ); ?>" aria-controls="recent-<?php echo esc_attr( $tab_id ); ?>" role="tab" data-toggle="tab"><?php echo __( 'Recent', 'themepixels' ); ?></a></li>
				<?php } ?>
				<?php if ( $enable_popular_posts == true ) { ?>
					<li role="presentation"><a href="#popular-<?php echo esc_attr( $tab_id ); ?>" aria-controls="popular-<?php echo esc_attr( $tab_id ); ?>" role="tab" data-toggle="tab"><?php echo __( 'Popular', 'themepixels' ); ?></a></li>
				<?php } ?>
				<?php if ( $enable_recent_comments == true ) { ?>
					<li role="presentation"><a href="#comments-<?php echo esc_attr( $tab_id ); ?>" aria-controls="comments-<?php echo esc_attr( $tab_id ); ?>" role="tab" data-toggle="tab"><?php echo __( 'Comments', 'themepixels' ); ?></a></li>
				<?php } ?>
			</ul>

			<div class="tab-content clearfix">
				<?php if ( $enable_recent_posts == true ) { ?>
					<div role="tabpanel" class="tab-pane active" id="recent-<?php echo esc_attr( $tab_id ); ?>">
						<?php
							$args = array(
								'post_type'				=> 'post',
								'posts_per_page'		=> $recent_post_count,
								'cat'					=> $recent_posts_cat_id,
								'ignore_sticky_posts'	=> true,
								'no_found_rows'			=> true,
								'post_status'			=> 'publish',
							);

							$recent_query = new WP_Query($args);
						?>
						<?php if ( $recent_query->have_posts() ) { ?>
							<ul class="widget-post-list">
								<?php while ( $recent_query->have_posts() ) : $recent_query->the_post(); ?>
									<li id="post-<?php the_ID(); ?>" <?php post_class('widget-post-entry clearfix'); ?>>
										<?php if ( has_post_thumbnail() && $enable_recent_post_thumbnail == true ) { ?>
											<figure class="widget-post-thumbnail-wrapper">
												<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
													<?php the_post_thumbnail( 'post-widget-thumb' ); ?>
												</a>
											</figure>
										<?php } ?>
										<div class="widget-post-info-wrap">
											<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<?php if ( $enable_recent_post_meta == true ) { ?>
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
						<?php }
						wp_reset_postdata();
						?>
					</div>
				<?php } ?>

				<?php if ( $enable_popular_posts == true ) { ?>
					<div role="tabpanel" class="tab-pane" id="popular-<?php echo esc_attr( $tab_id ); ?>">
						<?php
							$args = array(
								'post_type'				=> 'post',
								'posts_per_page'		=> $popular_post_count,
								'cat'					=> $popular_posts_cat_id,
								'ignore_sticky_posts'	=> true,
								'no_found_rows'			=> true,
								'post_status'			=> 'publish',
								'orderby'				=> 'comment_count',
								'order'					=> 'DESC',
								'date_query' => array(
									array(
										'after'  => $poular_posts_time_range,
									),
								),
							);

							$popular_query = new WP_Query($args);
						?>
						<?php if ( $popular_query->have_posts() ) { ?>
							<ul class="widget-post-list">
								<?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>
									<li id="post-<?php the_ID(); ?>" <?php post_class('widget-post-entry clearfix'); ?>>
										<?php if ( has_post_thumbnail() && $enable_popular_post_thumbnail == true ) { ?>
											<figure class="widget-post-thumbnail-wrapper">
												<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
													<?php the_post_thumbnail( 'post-widget-thumb' ); ?>
												</a>
											</figure>
										<?php } ?>
										<div class="widget-post-info-wrap">
											<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<?php if ( $enable_popular_post_meta == true ) { ?>
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
						<?php }
						wp_reset_postdata();
						?>
					</div>
				<?php } ?>

				<?php if ( $enable_recent_comments == true ) { ?>
					<div role="tabpanel" class="tab-pane" id="comments-<?php echo esc_attr( $tab_id ); ?>">
						<?php
						$comments = get_comments( apply_filters( 'widget_comments_args', array(
							'number'		=> $recent_comments_count,
							'status'		=> 'approve',
							'post_status'	=> 'publish',
							'post_type'		=> 'post'
						) ) );
						?>
						<?php if ( $comments ) { ?>
							<ul class="widget-post-list">
								<?php foreach ( $comments as $comment ) { ?>
									<li class="clearfix">
										<?php if ( $show_recent_comments_avatar == true ) { ?>
											<figure class="widget-post-thumbnail-wrapper">
												<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
													<?php echo get_avatar( $comment, '60' ); ?>
												</a>
											</figure>
										<?php } ?>
										<div class="widget-post-info-wrap">
											<span class="tabs-comment-author-name"><?php echo strip_tags( $comment->comment_author ); ?> <?php _e( 'says', 'themepixels' ); ?></span>
											<div class="tabs-comment-text clearfix">
												<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo wp_trim_words( strip_tags( $comment->comment_content ), 15 ); ?>...</a>
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['enable_recent_posts'] = $new_instance['enable_recent_posts'];
		$instance['recent_posts_cat_id'] = $new_instance['recent_posts_cat_id'];
		$instance['recent_post_count'] = $new_instance['recent_post_count'];
		$instance['enable_recent_post_thumbnail'] = $new_instance['enable_recent_post_thumbnail'];
		$instance['enable_recent_post_meta'] = $new_instance['enable_recent_post_meta'];
		$instance['enable_popular_posts'] = $new_instance['enable_popular_posts'];
		$instance['popular_posts_cat_id'] = $new_instance['popular_posts_cat_id'];
		$instance['poular_posts_time_range'] = $new_instance['poular_posts_time_range'];
		$instance['popular_post_count'] = $new_instance['popular_post_count'];
		$instance['enable_popular_post_thumbnail'] = $new_instance['enable_popular_post_thumbnail'];
		$instance['enable_popular_post_meta'] = $new_instance['enable_popular_post_meta'];
		$instance['enable_recent_comments'] = $new_instance['enable_recent_comments'];
		$instance['show_recent_comments_avatar'] = $new_instance['show_recent_comments_avatar'];
		$instance['recent_comments_count'] = $new_instance['recent_comments_count'];

		return $instance;
	}

	public function form( $instance ) {
		$defaults =  array(
			'enable_recent_posts'			=> 'on',
			'recent_posts_cat_id'			=> '0',
			'recent_post_count'				=> 5,
			'enable_recent_post_thumbnail'	=> 'on',
			'enable_recent_post_meta'		=> 'on',
			'enable_popular_posts'			=> 'on',
			'popular_posts_cat_id'			=> '0',
			'poular_posts_time_range'		=> '0',
			'popular_post_count'			=> 5,
			'enable_popular_post_thumbnail'	=> 'on',
			'enable_popular_post_meta'		=> 'on',
			'enable_recent_comments'		=> 'on',
			'show_recent_comments_avatar'	=> 'on',
			'recent_comments_count'			=> 5
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div class="tabs-widget-blocks">
			<h4><?php _e( 'Recent Posts:', 'themepixels' ); ?></h4>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_recent_posts'); ?>" name="<?php echo $this->get_field_name('enable_recent_posts'); ?>"<?php checked( $instance['enable_recent_posts'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_recent_posts'); ?>"><?php _e( 'Enable Recent Posts', 'themepixels' ); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('recent_posts_cat_id'); ?>"><?php _e( 'Category:', 'themepixels' ); ?></label>
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("recent_posts_cat_id"), 'selected' => $instance["recent_posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true, 'class' => 'widefat' ) ); ?>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('recent_post_count'); ?>"><?php _e( 'Number of posts to show:', 'themepixels' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_post_count'); ?>" name="<?php echo $this->get_field_name('recent_post_count'); ?>" type="text" value="<?php echo intval( $instance['recent_post_count'] ); ?>" />
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_recent_post_thumbnail'); ?>" name="<?php echo $this->get_field_name('enable_recent_post_thumbnail'); ?>"<?php checked( $instance['enable_recent_post_thumbnail'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_recent_post_thumbnail'); ?>"><?php _e( 'Enable Post Thumbnail', 'themepixels' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_recent_post_meta'); ?>" name="<?php echo $this->get_field_name('enable_recent_post_meta'); ?>"<?php checked( $instance['enable_recent_post_meta'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_recent_post_meta'); ?>"><?php _e( 'Enable Post Meta', 'themepixels' ); ?></label>
			</p>
		</div>

		<div class="tabs-widget-blocks">
			<h4><?php _e( 'Popular Posts:', 'themepixels' ); ?></h4>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_popular_posts'); ?>" name="<?php echo $this->get_field_name('enable_popular_posts'); ?>"<?php checked( $instance['enable_popular_posts'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_popular_posts'); ?>"><?php _e( 'Enable Popular Posts', 'themepixels' ); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('popular_posts_cat_id'); ?>"><?php _e( 'Category:', 'themepixels' ); ?></label>
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("popular_posts_cat_id"), 'selected' => $instance["popular_posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true, 'class' => 'widefat' ) ); ?>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('poular_posts_time_range'); ?>"><?php _e( 'Time Range:', 'themepixels' ); ?></label>
				<select name="<?php echo $this->get_field_name('poular_posts_time_range'); ?>" id="<?php echo $this->get_field_id('poular_posts_time_range'); ?>" class="widefat">
					<option value="0"<?php selected( $instance['poular_posts_time_range'], '0' ); ?>><?php _e( 'All time', 'themepixels' ); ?></option>
					<option value="1 year ago"<?php selected( $instance['poular_posts_time_range'], '1 year ago' ); ?>><?php _e( 'This year', 'themepixels' ); ?></option>
					<option value="1 month ago"<?php selected( $instance['poular_posts_time_range'], '1 month ago' ); ?>><?php _e( 'This month', 'themepixels' ); ?></option>
					<option value="1 week ago"<?php selected( $instance['poular_posts_time_range'], '1 week ago' ); ?>><?php _e( 'This week', 'themepixels' ); ?></option>
					<option value="1 day ago"<?php selected( $instance['poular_posts_time_range'], '1 day ago' ); ?>><?php _e( 'Past 24 hours', 'themepixels' ); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('popular_post_count'); ?>"><?php _e( 'Number of posts to show:', 'themepixels' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('popular_post_count'); ?>" name="<?php echo $this->get_field_name('popular_post_count'); ?>" type="text" value="<?php echo intval( $instance['popular_post_count'] ); ?>" />
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_popular_post_thumbnail'); ?>" name="<?php echo $this->get_field_name('enable_popular_post_thumbnail'); ?>"<?php checked( $instance['enable_popular_post_thumbnail'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_popular_post_thumbnail'); ?>"><?php _e( 'Enable Post Thumbnail', 'themepixels' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_popular_post_meta'); ?>" name="<?php echo $this->get_field_name('enable_popular_post_meta'); ?>"<?php checked( $instance['enable_popular_post_meta'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_popular_post_meta'); ?>"><?php _e( 'Enable Post Meta', 'themepixels' ); ?></label>
			</p>
		</div>

		<div class="tabs-widget-blocks">
			<h4><?php _e( 'Recent Comments:', 'themepixels' ); ?></h4>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('enable_recent_comments'); ?>" name="<?php echo $this->get_field_name('enable_recent_comments'); ?>"<?php checked( $instance['enable_recent_comments'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('enable_recent_comments'); ?>"><?php _e( 'Enable Recent Comments', 'themepixels' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_recent_comments_avatar'); ?>" name="<?php echo $this->get_field_name('show_recent_comments_avatar'); ?>"<?php checked( $instance['show_recent_comments_avatar'], 'on' ); ?> />
				<label for="<?php echo $this->get_field_id('show_recent_comments_avatar'); ?>"><?php _e( 'Show Avatar', 'themepixels' ); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('recent_comments_count'); ?>"><?php _e( 'Number of items to show:', 'themepixels' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('recent_comments_count'); ?>" name="<?php echo $this->get_field_name('recent_comments_count'); ?>" type="text" value="<?php echo intval( $instance['recent_comments_count'] ); ?>" />
			</p>
		</div>
	<?php
	}

	function themepixels_tabs_widget_admin_styles() { ?>
		<style>
			.widget .widget-inside .tabs-widget-blocks {
				background: #fcfcfc;
				padding: 10px;
				border: 1px solid #e3e3e3;
				margin: 15px 0;
			}
			.widget .widget-inside .tabs-widget-blocks h4 {
				margin: 10px 0;
			}
		</style>
	<?php
	}
}