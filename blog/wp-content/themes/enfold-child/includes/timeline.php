<?php 
		
	$args = array(
                'post_type' => 'timeline',
                'posts_per_page' => -1,
                'order' => 'ASC'
              );
	$c = new WP_Query( $args );

	$total_points = $c->post_count;
	$current_point = 1;

	if ( $c->have_posts() ) {
		echo '<div id="timeline">';
		while ( $c->have_posts() ) { $c->the_post();

			$post_id = $c->post->ID;
			$title = get_the_title($post_id);
			$content = apply_filters('the_content', $c->post->post_content);
			$hl = get_post_meta($post_id, 'timeline_highlight', true);
			$isleft = get_post_meta($post_id, 'timeline_right', true);
			$ismap = get_post_meta($post_id, 'timeline_map', true);
			$exchanges = get_post_meta($post_id, 'timeline_exchanges', true);
			$ishidecontent = get_post_meta($post_id, 'timeline_hidecontent', true);

			$exchanges = explode(' ', $exchanges);

			$map_id = get_post_meta($post_id, 'timeline_mapimage', true);

			if( !empty($map_id) ){
				$map_image = wp_get_attachment_image_src( $map_id, 'magazine' );
			}

			$position_class = '';

			if($current_point == 1){
				$position_class = 'first';
			}
			if($current_point == $total_points){
				$position_class = 'last';
			}

			$hl_class = $is_left = $is_map = "";
			if($hl == 1){
				$hl_class = "highlight";
			}

			if($isleft== 1){
				$is_left = "align_left";
			}

			if($ismap == 1){
				$is_map = "ismap";
			}


			if($ismap and $isleft){
				$is_map = "isrightmap";
			}
		?>	

			<div class="timepoint clearfix <?php echo $is_map; ?> <?php echo $position_class; ?>">
				<div class="title <?php echo $hl_class; ?>">
					<span><?php echo $title; ?></span>
				</div>

				<?php if(!$ishidecontent){ ?>
					<div class="point <?php echo $is_left; ?> ">
						<div class="thumb"><?php echo get_the_post_thumbnail($post_id, 'magazine') ?></div>
						<div class="text"><?php echo $content; ?></div>
					</div>

					<div class="clearfix"></div>
				<?php } ?>

				<?php if($ismap){ ?>
					<div class="map <?php echo $is_left; ?>">
						<img src="<?php echo $map_image[0]; ?>" alt=""/>

						<div class="exchanges clearfix">
							<div class="txt"><span><?php _e('AIESEC exchanges filled to date:', 'enfold-child'); ?></span></div>
							<div class="number clearfix">
								<?php foreach ($exchanges as $key => $value) {
									echo '<div class="num">'.$value.'</div>';
								} ?>
							</div>
						</div>
					</div>

				<?php } ?>

				<div class="clearfix"></div>
			</div>

		<?php 
			$current_point++;
        } // while
        echo '</div>';
    } // if
    wp_reset_postdata();
?>


