<?php
/**
 * Related Posts
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
	global $post;

	$related_posts_count = '4';
	if( tps_get_option('related_posts_count') !== '' ) {
		$related_posts_count = tps_get_option('related_posts_count');
	}

	$categories = wp_get_post_terms( $post->ID, 'category' );
	$category_ids = array();
	foreach( $categories as $individual_category ) {
		$category_ids[] = $individual_category->term_id;
	}
	$args = array(
		'posts_per_page'		=> $related_posts_count,
		'orderby'				=> 'rand',
		'ignore_sticky_posts'	=> 1,
		'no_found_rows'			=> 1,
		'category__in'			=> $category_ids,
		'post__not_in'			=> array($post->ID)
	);

	$related_posts_query = new WP_Query($args);
?>

<?php if( $related_posts_query->have_posts() ) { ?>
	<div class="related-posts-wrapper clearfix">
		<h3 class="section-title">
			<span><?php _e( 'Related Posts', 'themepixels' ); ?></span>
		</h3>
		<?php
		$count = 0;

		foreach( $related_posts_query->posts as $post ) : setup_postdata( $post ); ?>
			<?php if( $count == 0 ) { ?>
				<div class="row">
			<?php } ?>
			<div class="col-sm-6 col-md-6">
				<div class="related-posts clearfix">
					<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
						<div class="related-post-thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
								<?php the_post_thumbnail( 'blog-related' ); ?>
							</a>
						</div>
					<?php } ?>
					<div class="related-post-content">
						<h3 class="related-post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<div class="related-post-meta clearfix">
							<ul>
								<li>
									<i class="fa fa-clock-o"></i><time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_attr( get_the_date() ); ?></time>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php if( $count >= 1 ) { ?>
				</div><!-- End .row -->
				<?php $count = 0; ?>
			<?php } else {
				$count++;
			} ?>
		<?php endforeach; ?>

		<?php if( $count % 2 != 0 ) { ?>
			<div class="clearfix"></div>
			</div><!-- End .row -->
		<?php } ?>
	</div><!-- End .related-posts-wrapper -->
<?php } ?>
<?php wp_reset_postdata(); ?>