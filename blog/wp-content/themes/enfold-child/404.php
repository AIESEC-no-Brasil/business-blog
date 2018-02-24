<?php
global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


	 echo avia_title(array('title' => __('Error 404 - page not found', 'avia_framework')));
	
	?>


		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>
			
			<?php 
				do_action('avia_404_extra'); // allows user to hook into 404 page fr extra functionallity. eg: send mail that page is missing, output additional information
			?>
			
			<div class='container'>

				<main class='template-page content <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content'));?>>


                    <div class="entry entry-content-wrapper clearfix" id='search-fail'>
                   
						<h2><strong><?php _e('404 Not Found', 'avia_framework'); ?></strong></h2>

						<p class="thin18"><?php _e("It looks like the page you're trying to find doesn't exist.<br>If you're having trouble navigating somewhere, try using the search function above.", "avia_framework"); ?></p>

						<p class="thin18"><?php _e("If you're really stuck, you can use our <a href='http://178.62.113.96/?page_id=107'>contact form</a> to get in touch.", "avia_framework"); ?></p>



						<div class='hr_invisible'></div>


                    </div>

				<!--end content-->
				</main>


			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>
