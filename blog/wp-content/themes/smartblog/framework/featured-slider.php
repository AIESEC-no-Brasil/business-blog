<?php
/**
 * Featured Slider
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
	$slideshow_style = 'v1';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_slideshow_style', '', get_the_ID() ) !== '' ) {
			$slideshow_style = rwmb_meta( 'themepixels_slideshow_style', '', get_the_ID() );
		} else {
			if( tps_get_option('slideshow_style') !== '' ) {
				$slideshow_style = tps_get_option('slideshow_style');
			}
		}
	} else {
		if( tps_get_option('slideshow_style') !== '' ) {
			$slideshow_style = tps_get_option('slideshow_style');
		}
	}
	
	$slideshow_posts_count = '6';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_slideshow_posts_count', '', get_the_ID() ) !== '' ) {
			$slideshow_posts_count = rwmb_meta( 'themepixels_slideshow_posts_count', '', get_the_ID() );
		} else {
			if( tps_get_option('slideshow_posts_count') !== '' ) {
				$slideshow_posts_count = tps_get_option('slideshow_posts_count');
			}
		}
	} else {
		if( tps_get_option('slideshow_posts_count') !== '' ) {
			$slideshow_posts_count = tps_get_option('slideshow_posts_count');
		}
	}

	$slider_cats = rwmb_meta( 'themepixels_slideshow_posts_cats', 'type=taxonomy&taxonomy=category', get_the_ID() );
	$slider_cat_id = array();
	if( $slider_cats ) {
		foreach( $slider_cats as $slider_cat ) {
			$slider_cat_id[] = $slider_cat->term_id;
		}
	}

	$tax_query = '';
	if( is_singular() ) {
		if( ! empty( $slider_cat_id ) ) {
			$tax_query = array(
				array(
					'taxonomy'	=> 'category',
					'field'		=> 'id',
					'terms'		=> $slider_cat_id,
				),
			);
		}
	} else {
		if( tps_get_option('slideshow_posts_cats') !== '' ) {
			$tax_query = array(
				array(
					'taxonomy'	=> 'category',
					'field'		=> 'id',
					'terms'		=> tps_get_option('slideshow_posts_cats'),
				),
			);
		}
	}

	$slideshow_nav = '';
	if( tps_get_option('enable_slideshow_nav') == '1' ) {
		$slideshow_nav = 'true';
	} else {
		$slideshow_nav = 'false';
	}

	$slideshow_dots_nav = '';
	if( tps_get_option('enable_slideshow_dots_nav') == '1' ) {
		$slideshow_dots_nav = 'true';
	} else {
		$slideshow_dots_nav = 'false';
	}

	$slideshow_infinity_loop = '';
	if( tps_get_option('enable_slideshow_infinity_loop') == '1' ) {
		$slideshow_infinity_loop = 'true';
	} else {
		$slideshow_infinity_loop = 'false';
	}

	$slideshow_autoplay = '';
	if( tps_get_option('enable_slideshow_autoplay') == '1' ) {
		$slideshow_autoplay = 'true';
	} else {
		$slideshow_autoplay = 'false';
	}

	$slideshow_pause_on_hover = '';
	if( tps_get_option('enable_slideshow_pause_on_hover') == '1' ) {
		$slideshow_pause_on_hover = 'true';
	} else {
		$slideshow_pause_on_hover = 'false';
	}
	
	$slideshow_duration = '';
	if( tps_get_option('slideshow_duration') !== '' ) {
		$slideshow_duration = tps_get_option('slideshow_duration');
	}

	$args = array(
		'post_type'				=> 'post',
		'posts_per_page'		=> $slideshow_posts_count,
		'ignore_sticky_posts'	=> 1,
		'no_found_rows'			=> 1,
		'meta_key'				=> '_thumbnail_id',
		'tax_query'				=> $tax_query
	);

	$featured_slider_query = new WP_Query($args);
?>

<?php if( $featured_slider_query->have_posts() ) { ?>
	<div class="featured-slider-wrapper">
		<div class="container">
			<div id="featured-slider" class="owl-carousel featured-slider clearfix" data-navigation="<?php echo esc_js( $slideshow_nav ); ?>" data-dots="<?php echo esc_js( $slideshow_dots_nav ); ?>" data-loop="<?php echo esc_js( $slideshow_infinity_loop ); ?>" data-autoplay="<?php echo esc_js( $slideshow_autoplay ); ?>" data-pausehover="<?php echo esc_js( $slideshow_pause_on_hover ); ?>" data-timeout="<?php echo esc_js( $slideshow_duration ); ?>">

				<?php if( $slideshow_style == 'v1' ) {
					
					$count = 0;
					$first = true;

					foreach( $featured_slider_query->posts as $post ) : setup_postdata( $post );
						$count++;

						if ( $first ) { ?>
							<div class="item clearfix">
								<div class="first-post">
									<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
											<?php the_post_thumbnail( 'featured-first' ); ?>
										</a>
									<?php } ?>
									<div class="featured-content">
										<?php
											$category = get_the_category();
											if ( $category ) {
												echo '<div class="featured-post-cats"><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></div>';
											}
										?>
										<h3 class="featured-post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
									</div>
								</div>
								<?php $first = false;
						} else { ?>
							<div class="other-post">
								<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
										<?php the_post_thumbnail( 'featured-other' ); ?>
									</a>
								<?php } ?>
								<div class="featured-content">
									<?php
										$category = get_the_category();
										if ( $category ) {
											echo '<div class="featured-post-cats"><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></div>';
										}
									?>
									<h3 class="featured-post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								</div>
							</div>
						<?php } ?>

						<?php if( $count % 3 == 0 ) {
							$first = true; ?>
							</div>
						<?php } ?>

					<?php endforeach; ?>

					<?php if( $count % 3 !== 0 ) { ?>
						</div>
					<?php } ?>

				<?php } else { ?>
					
					<?php foreach( $featured_slider_query->posts as $post ) : setup_postdata( $post ); ?>
						<div class="item clearfix">
							<div class="main-post">
								<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
										<?php the_post_thumbnail( 'featured-full' ); ?>
									</a>
								<?php } ?>
								<div class="featured-content">
									<?php
										$category = get_the_category();
										if ( $category ) {
											echo '<div class="featured-post-cats"><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></div>';
										}
									?>
									<h3 class="featured-post-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				<?php } ?>

			</div>
		</div><!-- End .container -->
	</div><!-- End .featured-slider-wrapper -->
<?php } ?>
<?php wp_reset_postdata(); ?>