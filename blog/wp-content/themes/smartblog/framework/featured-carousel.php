<?php
/**
 * Featured Carousel
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<?php
	$carousel_posts_count = '6';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_posts_count', '', get_the_ID() ) !== '' ) {
			$carousel_posts_count = rwmb_meta( 'themepixels_carousel_posts_count', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_posts_count') !== '' ) {
				$carousel_posts_count = tps_get_option('carousel_posts_count');
			}
		}
	} else {
		if( tps_get_option('carousel_posts_count') !== '' ) {
			$carousel_posts_count = tps_get_option('carousel_posts_count');
		}
	}

	$carousel_cats = rwmb_meta( 'themepixels_carousel_posts_cats', 'type=taxonomy&taxonomy=category', get_the_ID() );
	$carousel_cat_id = array();
	if( $carousel_cats ) {
		foreach( $carousel_cats as $carousel_cat ) {
			$carousel_cat_id[] = $carousel_cat->term_id;
		}
	}

	$tax_query = '';
	if( is_singular() ) {
		if( ! empty( $carousel_cat_id ) ) {
			$tax_query = array(
				array(
					'taxonomy'	=> 'category',
					'field'		=> 'id',
					'terms'		=> $carousel_cat_id,
				),
			);
		}
	} else {
		if( tps_get_option('carousel_posts_cats') !== '' ) {
			$tax_query = array(
				array(
					'taxonomy'	=> 'category',
					'field'		=> 'id',
					'terms'		=> tps_get_option('carousel_posts_cats'),
				),
			);
		}
	}

	$desktop_items = '4';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_item_lg_desktop', '', get_the_ID() ) !== '' ) {
			$desktop_items = rwmb_meta( 'themepixels_carousel_item_lg_desktop', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_item_lg_desktop') !== '' ) {
				$desktop_items = tps_get_option('carousel_item_lg_desktop');
			}
		}
	} else {
		if( tps_get_option('carousel_item_lg_desktop') !== '' ) {
			$desktop_items = tps_get_option('carousel_item_lg_desktop');
		}
	}

	$desktopsmall_items = '3';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_item_small_desktop', '', get_the_ID() ) !== '' ) {
			$desktopsmall_items = rwmb_meta( 'themepixels_carousel_item_small_desktop', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_item_small_desktop') !== '' ) {
				$desktopsmall_items = tps_get_option('carousel_item_small_desktop');
			}
		}
	} else {
		if( tps_get_option('carousel_item_small_desktop') !== '' ) {
			$desktopsmall_items = tps_get_option('carousel_item_small_desktop');
		}
	}

	$tablet_items = '2';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_item_tablet', '', get_the_ID() ) !== '' ) {
			$tablet_items = rwmb_meta( 'themepixels_carousel_item_tablet', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_item_tablet') !== '' ) {
				$tablet_items = tps_get_option('carousel_item_tablet');
			}
		}
	} else {
		if( tps_get_option('carousel_item_tablet') !== '' ) {
			$tablet_items = tps_get_option('carousel_item_tablet');
		}
	}

	$tabletsmall_items = '2';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_item_small_tablet', '', get_the_ID() ) !== '' ) {
			$tabletsmall_items = rwmb_meta( 'themepixels_carousel_item_small_tablet', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_item_small_tablet') !== '' ) {
				$tabletsmall_items = tps_get_option('carousel_item_small_tablet');
			}
		}
	} else {
		if( tps_get_option('carousel_item_small_tablet') !== '' ) {
			$tabletsmall_items = tps_get_option('carousel_item_small_tablet');
		}
	}

	$mobile_items = '1';
	if( is_singular() ) {
		if( rwmb_meta( 'themepixels_carousel_item_mobile', '', get_the_ID() ) !== '' ) {
			$mobile_items = rwmb_meta( 'themepixels_carousel_item_mobile', '', get_the_ID() );
		} else {
			if( tps_get_option('carousel_item_mobile') !== '' ) {
				$mobile_items = tps_get_option('carousel_item_mobile');
			}
		}
	} else {
		if( tps_get_option('carousel_item_mobile') !== '' ) {
			$mobile_items = tps_get_option('carousel_item_mobile');
		}
	}

	$carousel_nav = '';
	if( tps_get_option('enable_carousel_nav') == '1' ) {
		$carousel_nav = 'true';
	} else {
		$carousel_nav = 'false';
	}

	$carousel_infinity_loop = '';
	if( tps_get_option('enable_carousel_infinity_loop') == '1' ) {
		$carousel_infinity_loop = 'true';
	} else {
		$carousel_infinity_loop = 'false';
	}

	$carousel_autoplay = '';
	if( tps_get_option('enable_carousel_autoplay') == '1' ) {
		$carousel_autoplay = 'true';
	} else {
		$carousel_autoplay = 'false';
	}

	$carousel_pause_on_hover = '';
	if( tps_get_option('enable_carousel_pause_on_hover') == '1' ) {
		$carousel_pause_on_hover = 'true';
	} else {
		$carousel_pause_on_hover = 'false';
	}
	
	$carousel_duration = '';
	if( tps_get_option('carousel_duration') !== '' ) {
		$carousel_duration = tps_get_option('carousel_duration');
	}

	$args = array(
		'post_type'				=> 'post',
		'posts_per_page'		=> $carousel_posts_count,
		'ignore_sticky_posts'	=> 1,
		'no_found_rows'			=> 1,
		'meta_key'				=> '_thumbnail_id',
		'tax_query'				=> $tax_query
	);

	$featured_carousel_query = new WP_Query($args);
?>

<?php if( $featured_carousel_query->have_posts() ) { ?>
	<div class="featured-carousel-wrapper">
		<div id="featured-carousel" class="owl-carousel featured-carousel clearfix" data-navigation="<?php echo esc_js( $carousel_nav ); ?>" data-loop="<?php echo esc_js( $carousel_infinity_loop ); ?>" data-autoplay="<?php echo esc_js( $carousel_autoplay ); ?>" data-pausehover="<?php echo esc_js( $carousel_pause_on_hover ); ?>" data-timeout="<?php echo esc_js( $carousel_duration ); ?>" data-desktop="<?php echo esc_js( $desktop_items ); ?>" data-desktopsmall="<?php echo esc_js( $desktopsmall_items ); ?>" data-tablet="<?php echo esc_js( $tablet_items ); ?>" data-tabletsmall="<?php echo esc_js( $tabletsmall_items ); ?>" data-mobile="<?php echo esc_js( $mobile_items ); ?>">

			<?php foreach( $featured_carousel_query->posts as $post ) : setup_postdata( $post ); ?>
				<div class="item clearfix">
					<div class="main-post">
						<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
								<?php the_post_thumbnail( 'featured-carousel' ); ?>
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

		</div>
	</div><!-- End .featured-carousel-wrapper -->
<?php } ?>
<?php wp_reset_postdata(); ?>