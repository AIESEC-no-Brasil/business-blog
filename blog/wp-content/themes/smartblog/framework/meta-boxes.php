<?php
/**
 * Registering meta boxes
 *
 * @package Smart Blog
 * @since 1.0
 */


add_filter( 'rwmb_meta_boxes', 'themepixels_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
if ( ! function_exists( 'themepixels_register_meta_boxes' ) ) {
	function themepixels_register_meta_boxes( $meta_boxes )
	{
		/**
		 * prefix of meta keys (optional)
		 * Use underscore (_) at the beginning to make keys hidden
		 * Alt.: You also can make prefix empty to disable it
		 */
		// Better has an underscore as last sign
		$prefix = 'themepixels_';

		// Audio Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_audio',
			'title'      => __( 'Audio Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Audio Type', 'themepixels' ),
					'id'				=> "{$prefix}audio_type",
					'type'				=> 'select',
					'options'			=> array(
						'embed'			=> __( 'Embed', 'themepixels' ),
						'selfhosted'	=> __( 'Self Hosted', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select Audio Type', 'themepixels' ),
				),
				
				array(
					'name'				=> __( 'Audio Embed URL', 'themepixels' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( '(Learn More)', 'themepixels' ) .'</a>',
					'id'				=> "{$prefix}post_audio_embed_url",
					'type'				=> 'oembed',
				),
				
				array(
					'name'				=> __( 'Self Hosted Audio', 'themepixels' ),
					'id'				=> "{$prefix}post_self_hosted_audio",
					'type'				=> 'file_input',
				),
			)
		);

		// Gallery Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_gallery',
			'title'      => __( 'Gallery Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Gallery Images', 'themepixels' ),
					'id'				=> "{$prefix}post_gallery_images",
					'type'				=> 'image_advanced',
				),
			)
		);

		// Link Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_link',
			'title'      => __( 'Link Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Link Title', 'themepixels' ),
					'id'				=> "{$prefix}post_link_title",
					'type'				=> 'text',
				),

				array(
					'name'				=> __( 'Link', 'themepixels' ),
					'id'				=> "{$prefix}post_link_url",
					'type'				=> 'url',
					'std'				=> '',
				),
				
				array(
					'name'				=> __( 'Open link in new window', 'themepixels' ),
					'id'				=> "{$prefix}post_link_target",
					'type'				=> 'select',
					'options'			=> array(
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'yes',
				),
			)
		);

		// Quote Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_quote',
			'title'      => __( 'Quote Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Quote', 'themepixels' ),
					'id'				=> "{$prefix}post_quote",
					'type'				=> 'textarea',
				),

				array(
					'name'				=> __( 'Quote Author', 'themepixels' ),
					'id'				=> "{$prefix}post_quote_author",
					'type'				=> 'text',
				),

				array(
					'name'				=> __( 'Quote Source Link', 'themepixels' ),
					'id'				=> "{$prefix}post_quote_source_url",
					'type'				=> 'url',
				),
			)
		);

		// Status Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_status',
			'title'      => __( 'Status Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Twitter or Instagram Status URL', 'themepixels' ),
					'id'				=> "{$prefix}post_status_twitter_embed_code",
					'type'				=> 'textarea',
				),
			)
		);

		// Video Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_format_video',
			'title'      => __( 'Video Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Video Type', 'themepixels' ),
					'id'				=> "{$prefix}video_type",
					'type'				=> 'select',
					'options'			=> array(
						'embed'			=> __( 'Embed', 'themepixels' ),
						'selfhosted'	=> __( 'Self Hosted', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select Video Type', 'themepixels' ),
				),
				
				array(
					'name'				=> __( 'Video Embed URL', 'themepixels' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( '(Learn More)', 'themepixels' ) .'</a>',
					'id'				=> "{$prefix}post_video_embed_url",
					'type'				=> 'oembed',
				),
				
				array(
					'name'				=> __( 'Self Hosted Video', 'themepixels' ),
					'id'				=> "{$prefix}post_self_hosted_video",
					'type'				=> 'file_input',
				),
			)
		);

		// Post Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_post_options',
			'title'      => __( 'Post Options', 'themepixels' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Enable Post Header', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_header",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Post Meta', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_meta_single",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Post Featured Content', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_featured_content",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Post Categories', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_categories",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Post Tags', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_tags",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Post Share', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_share",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Author Info Box', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_author_info_box",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Related Posts', 'themepixels' ),
					'id'				=> "{$prefix}enable_related_posts",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Next/Previous Links', 'themepixels' ),
					'id'				=> "{$prefix}enable_post_next_prev_links",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
			)
		);

		// Page Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_page_options',
			'title'      => __( 'Page Options', 'themepixels' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Enable Page Header', 'themepixels' ),
					'id'				=> "{$prefix}enable_page_header",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Page Meta', 'themepixels' ),
					'id'				=> "{$prefix}enable_page_meta",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Page Featured Image', 'themepixels' ),
					'id'				=> "{$prefix}enable_page_featured_image",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Page Share', 'themepixels' ),
					'id'				=> "{$prefix}enable_page_share",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),

				array(
					'name'				=> __( 'Following page option only works in blog templates', 'themepixels' ),
					'id'				=> "{$prefix}page_fake_title_1",
					'type'				=> 'heading',
				),
				
				array(
					'name'				=> __( 'Show Page Content', 'themepixels' ),
					'id'				=> "{$prefix}show_page_content",
					'type'				=> 'select',
					'options'			=> array(
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'no',
				),
				
				array(
					'name'				=> __( 'Blog Pagination Type', 'themepixels' ),
					'id'				=> "{$prefix}blog_pagination_type",
					'type'				=> 'select',
					'options'			=> array(
						'default'				=> __( 'Default', 'themepixels' ),
						'numbered-pagination'	=> __( 'Numbered Pagination', 'themepixels' ),
						'next-prev'				=> __( 'Next/Prev', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
			)
		);

		// Header
		$meta_boxes[] = array(
			'id'         => 'themepixels_header_options',
			'title'      => __( 'Header Options', 'themepixels' ),
			'post_types' => array( 'post', 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Enable Topbar', 'themepixels' ),
					'id'				=> "{$prefix}enable_topbar",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Enable Sticky Header', 'themepixels' ),
					'id'				=> "{$prefix}enable_sticky_header",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),

				array(
					'name'				=> __( 'Header Layout', 'themepixels' ),
					'id'				=> "{$prefix}header_layout",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'v1'			=> __( 'Header Style 1', 'themepixels' ),
						'v2'			=> __( 'Header Style 2', 'themepixels' ),
						'v3'			=> __( 'Header Style 3', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
			)
		);

		// Layout
		$meta_boxes[] = array(
			'id'         => 'themepixels_layout_options',
			'title'      => __( 'Layout Options', 'themepixels' ),
			'post_types' => array( 'post', 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Site Layout', 'themepixels' ),
					'id'				=> "{$prefix}site_layout",
					'type'				=> 'select',
					'options'			=> array(
						'default'		=> __( 'Default', 'themepixels' ),
						'fullwidth'		=> __( 'Full Width', 'themepixels' ),
						'boxed'			=> __( 'Boxed', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
				
				array(
					'name'				=> __( 'Sidebar Position', 'themepixels' ),
					'id'				=> "{$prefix}sidebar_position",
					'type'				=> 'select',
					'options'			=> array(
						'default'				=> __( 'Default', 'themepixels' ),
						'right-sidebar'			=> __( 'Right Sidebar', 'themepixels' ),
						'left-sidebar'			=> __( 'Left Sidebar', 'themepixels' ),
						'both-sidebar'			=> __( 'Both Sidebar', 'themepixels' ),
						'no-sidebar'			=> __( 'No Sidebar', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'default',
				),
			)
		);

		// Slider
		$meta_boxes[] = array(
			'id'         => 'themepixels_slider_options',
			'title'      => __( 'Slider Options', 'themepixels' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Enable Slider', 'themepixels' ),
					'id'				=> "{$prefix}enable_slider",
					'type'				=> 'select',
					'options'			=> array(
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'no',
				),
				
				array(
					'name'				=> __( 'Slideshow Style', 'themepixels' ),
					'id'				=> "{$prefix}slideshow_style",
					'type'				=> 'select',
					'options'			=> array(
						'v1'			=> __( 'Style 1', 'themepixels' ),
						'v2'			=> __( 'Style 2', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'v1',
				),
				
				array(
					'name'				=> __( 'Select categories', 'themepixels' ),
					'id'				=> "{$prefix}slideshow_posts_cats",
					'type'				=> 'taxonomy',
					'options'			=> array(
						'taxonomy'		=> 'category',
						'type'			=> 'select_advanced',
						'args'			=> array()
					),
					'multiple'			=> true,
				),
				
				array(
					'name'				=> __( 'Post Count', 'themepixels' ),
					'id'				=> "{$prefix}slideshow_posts_count",
					'desc'				=> __( 'How many items do you wish to show.', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '',
					'clone'				=> false,
				),
			)
		);

		// Carousel
		$meta_boxes[] = array(
			'id'         => 'themepixels_carousel_options',
			'title'      => __( 'Carousel Options', 'themepixels' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Enable Carousel', 'themepixels' ),
					'id'				=> "{$prefix}enable_carousel",
					'type'				=> 'select',
					'options'			=> array(
						'yes'			=> __( 'Yes', 'themepixels' ),
						'no'			=> __( 'No', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'no',
				),
				
				array(
					'name'				=> __( 'Carousel Position', 'themepixels' ),
					'id'				=> "{$prefix}carousel_position",
					'type'				=> 'select',
					'options'			=> array(
						'below-header'			=> __( 'Below Header', 'themepixels' ),
						'above-footer'			=> __( 'Above Footer', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> 'below-header',
				),
				
				array(
					'name'				=> __( 'Select categories', 'themepixels' ),
					'id'				=> "{$prefix}carousel_posts_cats",
					'type'				=> 'taxonomy',
					'options'			=> array(
						'taxonomy'		=> 'category',
						'type'			=> 'select_advanced',
						'args'			=> array()
					),
					'multiple'			=> true,
				),
				
				array(
					'name'				=> __( 'Post Count', 'themepixels' ),
					'id'				=> "{$prefix}carousel_posts_count",
					'desc'				=> __( 'How many items do you wish to show.', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '',
					'clone'				=> false,
				),
				
				array(
					'name'				=> __( 'Items visible on desktop', 'themepixels' ),
					'id'				=> "{$prefix}carousel_item_lg_desktop",
					'desc'				=> __( 'The number of items to show on the large Desktop (Above 1199px).', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '4',
					'clone'				=> false,
				),
				
				array(
					'name'				=> __( 'Items visible on small desktop', 'themepixels' ),
					'id'				=> "{$prefix}carousel_item_small_desktop",
					'desc'				=> __( 'The number of items to show on the large Desktop (Above 991px).', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '3',
					'clone'				=> false,
				),
				
				array(
					'name'				=> __( 'Items visible on tablet', 'themepixels' ),
					'id'				=> "{$prefix}carousel_item_tablet",
					'desc'				=> __( 'The number of items to show on the tablet (Above 767px).', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '2',
					'clone'				=> false,
				),
				
				array(
					'name'				=> __( 'Items visible on small tablet', 'themepixels' ),
					'id'				=> "{$prefix}carousel_item_small_tablet",
					'desc'				=> __( 'The number of items to show on the small tablet (Above 479px).', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '2',
					'clone'				=> false,
				),
				
				array(
					'name'				=> __( 'Items visible on mobile', 'themepixels' ),
					'id'				=> "{$prefix}carousel_item_mobile",
					'desc'				=> __( 'The number of items to show on the mobile (0 to 479px).', 'themepixels' ),
					'type'				=> 'text',
					'std'				=> '1',
					'clone'				=> false,
				),
			)
		);

		// Background Options
		$meta_boxes[] = array(
			'id'         => 'themepixels_styling_options',
			'title'      => __( 'Background Options', 'themepixels' ),
			'post_types' => array( 'post', 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				
				array(
					'name'				=> __( 'Background Color', 'themepixels' ),
					'id'				=> "{$prefix}page_background_color",
					'type'				=> 'color',
				),
				
				array(
					'name'				=> __( 'Background Image', 'themepixels' ),
					'id'				=> "{$prefix}page_background_image",
					'type'				=> 'image_advanced',
					'max_file_uploads'	=> 1,
				),
				
				array(
					'name'				=> __( 'Background Repeat', 'themepixels' ),
					'id'				=> "{$prefix}page_background_repeat",
					'type'				=> 'select',
					'options'			=> array(
						'no-repeat'		=> __( 'No Repeat', 'themepixels' ),
						'repeat'		=> __( 'Repeat All', 'themepixels' ),
						'repeat-x'		=> __( 'Repeat Horizontally', 'themepixels' ),
						'repeat-y'		=> __( 'Repeat Vertically', 'themepixels' ),
						'inherit'		=> __( 'Inherit', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select an Item', 'themepixels' ),
				),
				
				array(
					'name'				=> __( 'Background Size', 'themepixels' ),
					'id'				=> "{$prefix}page_background_size",
					'type'				=> 'select',
					'options'			=> array(
						'inherit'		=> __( 'Inherit', 'themepixels' ),
						'cover'			=> __( 'Cover', 'themepixels' ),
						'Contain'		=> __( 'Contain', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select an Item', 'themepixels' ),
				),
				
				array(
					'name'				=> __( 'Background Attachment', 'themepixels' ),
					'id'				=> "{$prefix}page_background_attachment",
					'type'				=> 'select',
					'options'			=> array(
						'fixed'			=> __( 'Fixed', 'themepixels' ),
						'scroll'		=> __( 'Scroll', 'themepixels' ),
						'inherit'		=> __( 'Inherit', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select an Item', 'themepixels' ),
				),
				
				array(
					'name'				=> __( 'Background Position', 'themepixels' ),
					'id'				=> "{$prefix}page_background_position",
					'type'				=> 'select',
					'options'			=> array(
						'left top'		=> __( 'Left Top', 'themepixels' ),
						'left center'	=> __( 'Left center', 'themepixels' ),
						'left bottom'	=> __( 'Left Bottom', 'themepixels' ),
						'center top'	=> __( 'Center Top', 'themepixels' ),
						'center center'	=> __( 'Center Center', 'themepixels' ),
						'center bottom'	=> __( 'Center Bottom', 'themepixels' ),
						'right top'		=> __( 'Right Top', 'themepixels' ),
						'right center'	=> __( 'Right center', 'themepixels' ),
						'right bottom'	=> __( 'Right Bottom', 'themepixels' ),
					),
					'multiple'			=> false,
					'std'				=> '',
					'placeholder'		=> __( 'Select an Item', 'themepixels' ),
				),
			)
		);

		return $meta_boxes;
	}
}

if ( ! function_exists( 'themepixels_postformat_script' ) ) {
	function themepixels_postformat_script( $hook ) {
		
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_enqueue_script( 'post-format', get_template_directory_uri() .'/js/admin-custom.js', array( 'jquery' ), '1.0', true );
		}

	}
}
add_action( 'admin_enqueue_scripts', 'themepixels_postformat_script' );