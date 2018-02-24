<?php
/**
 * Smart Blog functions and definitions
 *
 * @package Smart Blog
 * @since 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Admin options
/*-----------------------------------------------------------------------------------*/
if( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/admin/redux-framework/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/admin/redux-framework/framework.php' );
}
require_once( dirname( __FILE__ ) . '/framework/admin-config.php' );

/*-----------------------------------------------------------------------------------*/
/* Metabox
/*-----------------------------------------------------------------------------------*/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/meta-box/' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/meta-box/' ) );
require_once( RWMB_DIR . 'meta-box.php');
require_once( get_template_directory() . '/framework/meta-boxes.php');

/*-----------------------------------------------------------------------------------*/
/* Set the content width based on the theme's design and stylesheet
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
}

/*-----------------------------------------------------------------------------------*/
/* Allow shortcodes in widgets
/*-----------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_setup' ) ) {
	function themepixels_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'themepixels', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blog-featured', 748, 350, true );
		add_image_size( 'blog-single', 748, 350, true );
		add_image_size( 'page-featured', 748, 350, true );
		add_image_size( 'blog-related', 100, 100, true );
		add_image_size( 'featured-first', 800, 450, true );
		add_image_size( 'featured-other', 342, 225, true );
		add_image_size( 'featured-full', 1140, 500, true );
		add_image_size( 'featured-carousel', 600, 525, true );
		add_image_size( 'post-widget-thumb', 60, 60, true );

		// Register navigation menus.
		register_nav_menus (
			array(
				'primary_menu'	=>	__( 'Primary Menu', 'themepixels' ),
				'top_menu'		=>	__( 'Top Menu', 'themepixels' ),
				'footer_menu'	=>	__( 'Footer Menu', 'themepixels' )
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

		// Enable the wordPress custom background feature.
		add_theme_support( 'custom-background' );

		// Enable the wordPress custom header feature.
		add_theme_support( 'custom-header' );

	}
}
add_action( 'after_setup_theme', 'themepixels_setup' );

/*-----------------------------------------------------------------------------------*/
/* Register widget areas
/*-----------------------------------------------------------------------------------*/
function themepixels_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'themepixels' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrapper"><span class="widget-title-inner"></span><h3 class="widget-title"><span>',
		'after_title'   => '</span></h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'themepixels' ),
		'id'            => 'secondary-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrapper"><span class="widget-title-inner"></span><h3 class="widget-title"><span>',
		'after_title'   => '</span></h3></div>',
	) );

	if( tps_get_option('footer_col') == '1' || tps_get_option('footer_col') == '2' || tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) {
		register_sidebar( array(
			'name'          => __( 'Footer 1', 'themepixels' ),
			'id'            => 'footer-one',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	if( tps_get_option('footer_col') == '2' || tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) {
		register_sidebar( array(
			'name'          => __( 'Footer 2', 'themepixels' ),
			'id'            => 'footer-two',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	if( tps_get_option('footer_col') == '3' || tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) {
		register_sidebar( array(
			'name'          => __( 'Footer 3', 'themepixels' ),
			'id'            => 'footer-three',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	if( tps_get_option('footer_col') == '4' || tps_get_option('footer_col') == '5' ) {
		register_sidebar( array(
			'name'          => __( 'Footer 4', 'themepixels' ),
			'id'            => 'footer-four',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	if( tps_get_option('footer_col') == '5' ) {
		register_sidebar( array(
			'name'          => __( 'Footer 5', 'themepixels' ),
			'id'            => 'footer-five',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'themepixels_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/* Include theme files
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/framework/widgets/widget-tweets.php');
require_once( get_template_directory() . '/framework/widgets/widget-fb-likebox.php');
require_once( get_template_directory() . '/framework/widgets/widget-flickr.php');
require_once( get_template_directory() . '/framework/widgets/widget-social-links.php');
require_once( get_template_directory() . '/framework/widgets/widget-contact-info.php');
require_once( get_template_directory() . '/framework/widgets/widget-posts.php');
require_once( get_template_directory() . '/framework/widgets/widget-tabs.php');
require_once( get_template_directory() . '/framework/widgets/widget-ads125.php');
require_once( get_template_directory() . '/framework/widgets/widget-ads300.php');
require_once( get_template_directory() . '/framework/widgets/widget-subscribe.php');
require_once( get_template_directory() . '/framework/widgets/widget-slider.php');
require_once( get_template_directory() . '/framework/widgets/widget-instagram.php');
require_once( get_template_directory() . '/framework/widgets/widget-instagram-grid.php');
require_once( get_template_directory() . '/framework/plugin-activation.php');
require_once( get_template_directory() . '/framework/menu-walker/menu-walker.php');
require_once( get_template_directory() . '/framework/social-icons.php');
require_once( get_template_directory() . '/framework/post-share.php');
require_once( get_template_directory() . '/framework/post-meta.php');
require_once( get_template_directory() . '/framework/post-like.php');
require_once( get_template_directory() . '/framework/dynamic-css.php');

/*-----------------------------------------------------------------------------------*/
/* Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_scripts' ) ) {
	function themepixels_scripts() {
		
		/*-----------------------------------------------------------------------------------*/
		/* Styles
		/*-----------------------------------------------------------------------------------*/
		
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
		wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
		
		/*-----------------------------------------------------------------------------------*/
		/* Scripts
		/*-----------------------------------------------------------------------------------*/
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'themepixels-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'themepixels-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'themepixels_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Add ie conditional html5 shim to header
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_add_ie_html5_shim' ) ) {
	function themepixels_add_ie_html5_shim() {
		echo '<!--[if lt IE 9]>';
		echo '<script src="'. get_template_directory_uri() .'/js/html5.js"></script>';
		echo '<![endif]-->';
	}
}
add_filter( 'wp_head', 'themepixels_add_ie_html5_shim' );

/*-----------------------------------------------------------------------------------*/
/* Helper function to return the theme option value.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists('tps_get_option') ) {
	function tps_get_option($id, $param = false ) {
		global $themepixels_options;
		$output = '';
		if ( isset($themepixels_options[$id]) && $themepixels_options[$id] !== '' ) {
			$output = $themepixels_options[$id];
		}
		if ( !empty($themepixels_options[$id]) && $param ) {
			$output = $themepixels_options[$id][$param];
		}
		return $output;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Custom excerpt
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_excerpt' ) ) {
	function themepixels_excerpt( $limit = 60 ) {
		global $post;
		$post_id = $post->ID;
		if( has_excerpt( $post_id ) ) {
			$output = $post->post_excerpt;
		} elseif( strpos( $post->post_content, '<!--more-->' ) ) {
			$output = get_the_content( '' );
		} else {
			$output = wp_trim_words( strip_shortcodes( get_the_content( '' ) ), $limit );
		}

		$output = '<p>'. $output .'</p>';

		return $output;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Function to include the post count inside the link for WP categories widget
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_cat_count_span' ) ) {
	function themepixels_cat_count_span($links) {
		$links = str_replace('</a> (', ' (', $links);
		$links = str_replace(')', ')</a>', $links);
		return $links;
	}
}
add_filter( 'wp_list_categories', 'themepixels_cat_count_span' );

/*-----------------------------------------------------------------------------------*/
/* Add Classes to body
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_body_classes' ) ) {
	function themepixels_body_classes( $classes ) {
		if( is_singular() ) {
			global $post;
			$site_layout = rwmb_meta( 'themepixels_site_layout', '', $post->ID );
			if( $site_layout == 'default' || $site_layout == '' ) {
				$classes[] = tps_get_option( 'site_layout' );
			} else {
				if( $site_layout == 'boxed' ) {
					$classes[] = 'boxed';
				} elseif( $site_layout == 'fullwidth' ) {
					$classes[] = '';
				}
			}
		} else {
			$classes[] = tps_get_option( 'site_layout' );
		}
		return $classes;
	}
}
add_filter( 'body_class', 'themepixels_body_classes' );

/*-----------------------------------------------------------------------------------*/
/* Favicon
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_favicon' ) ) {
	function themepixels_favicon() {
		$favicon = tps_get_option( 'favicon', 'url' );
		$iphone_icon = tps_get_option( 'iphone_icon', 'url' );
		$ipad_icon = tps_get_option( 'ipad_icon', 'url' );
		$iphone_icon_retina = tps_get_option( 'iphone_icon_retina', 'url' );
		$ipad_icon_retina = tps_get_option( 'ipad_icon_retina', 'url' );

		$output = '';
		if ( $favicon ) {
			$output .= '<link rel="shortcut icon" href="'. esc_url( $favicon ) .'">';
		}
		if ( $iphone_icon ) {
			$output .= '<link rel="apple-touch-icon-precomposed" href="'. esc_url( $iphone_icon ) .'">';
		}
		if ( $ipad_icon ) {
			$output .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url( $ipad_icon ) .'">';
		}
		if ( $iphone_icon_retina ) {
			$output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url( $iphone_icon_retina ) .'">';
		}
		if ( $ipad_icon_retina ) {
			$output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. esc_url( $ipad_icon_retina ) .'">';
		}

		echo wp_kses( $output, array(
		    'link' => array(
		        'rel' => array(),
		        'sizes' => array(),
		        'href' => array()
		    ),
		) );
	}
}
add_filter( 'wp_head', 'themepixels_favicon' );

/*-----------------------------------------------------------------------------------*/
/* Tracking Code
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_tracking' ) ) {
	function themepixels_tracking() {
		$tracking_code = tps_get_option( 'tracking_code' );

		if ( $tracking_code !== '' ) {
			echo tps_get_option( 'tracking_code' );
		}
	}
}
add_filter( 'wp_footer', 'themepixels_tracking' );

/*-----------------------------------------------------------------------------------*/
/* Track Post Views
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_getpostviews' ) ) {
	function themepixels_getpostviews( $postID ) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if( $count == '' ) {
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0". __( ' View', 'themepixels' );
	    }
	    return $count. __( ' Views', 'themepixels' );
	}
}

if ( ! function_exists( 'themepixels_setpostviews' ) ) {
	function themepixels_setpostviews( $postID ) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if( $count == '' ) {
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    } else {
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
}

/*-----------------------------------------------------------------------------------*/
/* Custom User Profile Fields
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_user_contactmethods' ) ) {
	function themepixels_user_contactmethods() {

		$user_contact['themepixels_facebook'] = __( 'Facebook', 'themepixels' );
		$user_contact['themepixels_twitter'] = __( 'Twitter', 'themepixels' );
		$user_contact['themepixels_googleplus'] = __( 'Google Plus', 'themepixels' );
		$user_contact['themepixels_dribbble'] = __( 'Dribbble', 'themepixels' );
		$user_contact['themepixels_linkedin'] = __( 'LinkedIn', 'themepixels' );
		$user_contact['themepixels_pinterest'] = __( 'Pinterest', 'themepixels' );
		$user_contact['themepixels_youtube'] = __( 'Youtube', 'themepixels' );
		$user_contact['themepixels_instagram'] = __( 'Instagram', 'themepixels' );
		$user_contact['themepixels_github'] = __( 'Github', 'themepixels' );
		
		return $user_contact;

	}
}
add_filter( 'user_contactmethods', 'themepixels_user_contactmethods' );

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_post_navigation' ) ) {
	function themepixels_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}

		$nav_class = '';
		if ( ! $previous ) {
			$nav_class = 'no-previous-link';
		} elseif ( ! $next ) {
			$nav_class = 'no-next-link';
		}
		?>
		<nav class="post-navigation clearfix <?php echo esc_attr( $nav_class ); ?>" role="navigation">
			<?php
				previous_post_link( '<div class="post-previous">%link</div>', '<i class="fa fa-angle-double-left"></i><h3><span>'. __( 'Previous Post', 'themepixels' ) .'</span>%title</h3>' );
				next_post_link( '<div class="post-next">%link</div>', '<i class="fa fa-angle-double-right"></i><h3><span>'. __( 'Next Post', 'themepixels' ) .'</span>%title</h3>' );
			?>
		</nav>
		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous set of posts when applicable
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_posts_navigation' ) ) {
	function themepixels_posts_navigation( $pages = '' ) {
		if($pages == '')
	    {
	        global $wp_query;
	        $pages = $wp_query->max_num_pages;
	        if(!$pages)
	        {
	            $pages = 1;
	        }
	    }

		$nav_class = '';
		if ( ! get_next_posts_link( '', $pages ) ) {
			$nav_class = 'no-previous-link';
		} elseif ( ! get_previous_posts_link( '', $pages ) ) {
			$nav_class = 'no-next-link';
		}
		?>

		<?php if(1 != $pages) { ?>
			<nav class="posts-navigation clearfix <?php echo esc_attr( $nav_class ); ?>" role="navigation">

				<?php if ( get_next_posts_link( '', $pages ) ) { ?>
					<div class="nav-previous"><?php next_posts_link( '<i class="fa fa-arrow-left"></i> '. __( 'Older Posts', 'themepixels' ), $pages ); ?></div>
				<?php } ?>

				<?php if ( get_previous_posts_link( '', $pages ) ) { ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts', 'themepixels' ) .' <i class="fa fa-arrow-right"></i>', $pages ); ?></div>
				<?php } ?>

			</nav>
		<?php
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Numbered Pagination
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_pagination' ) ) {
	function themepixels_pagination( $pages = '', $range = 2 ) {

		$showitems = ($range * 2)+1;  

	    global $paged;
	    if(empty($paged)) $paged = 1;

	    if($pages == '')
	    {
	        global $wp_query;
	        $pages = $wp_query->max_num_pages;
	        if(!$pages)
	        {
	            $pages = 1;
	        }
	    }

	    if(1 != $pages)
	    {
	        echo "<div class='page-numbers clearfix'>";
	        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i> ". __( 'First', 'themepixels' ) ."</a>";
	        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i> ". __( 'Previous', 'themepixels' ) ."</a>";

	        for ($i=1; $i <= $pages; $i++)
	        {
	            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	            {
	                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
	            }
	        }

	        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>". __( 'Next', 'themepixels' ) ." <i class='fa fa-angle-right'></i></a>";  
	        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>". __( 'Last', 'themepixels' ) ." <i class='fa fa-angle-double-right'></i></a>";
	        echo "</div>\n";
	    }

	}
}

/*-----------------------------------------------------------------------------------*/
/* Display the archive title based on the queried object
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_archive_title' ) ) {
	function themepixels_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category Archives %s', 'themepixels' ), '<span>' . single_cat_title( '', false ) . '</span>' );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag Archives %s', 'themepixels' ), '<span>' . single_tag_title( '', false ) . '</span>' );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Posts By %s', 'themepixels' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Yearly Archives %s', 'themepixels' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'themepixels' ) ) . '</span>' );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Monthly Archives %s', 'themepixels' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'themepixels' ) ) . '</span>' );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Daily Archives %s', 'themepixels' ), '<span>' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'themepixels' ) ) . '</span>' );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Aside', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Gallery', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Image', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Video', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Quote', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Link', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Status', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Audio', 'themepixels' ) .'</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = sprintf( __( 'Post Format %s', 'themepixels' ), '<span>'. __( 'Chat', 'themepixels' ) .'</span>' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives %s', 'themepixels' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s %2$s', 'themepixels' ), $tax->labels->singular_name, '<span>' . single_term_title( '', false ) . '</span>' );
		} else {
			$title = __( 'Archives', 'themepixels' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );

		if ( ! empty( $title ) ) {
			$archive_title = $before . $title . $after;
		}

		echo strip_tags( $archive_title, '<h1><span>' );
	}
}

/*-----------------------------------------------------------------------------------*/
/* Title shim for sites older than WordPress 4.1.
/*-----------------------------------------------------------------------------------*/
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) {
	function themepixels_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'themepixels' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'themepixels_wp_title', 10, 2 );

	function themepixels_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'themepixels_render_title' );
}

/*-----------------------------------------------------------------------------------*/
/* Custom comments callback
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themepixels_comment' ) ) {
	function themepixels_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		?>
		<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="li-comment-<?php comment_ID() ?>">
			<div class="comment-body clearfix" id="comment-<?php comment_ID(); ?>">

	            <div class="comment-author vcard">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>

				<div class="comment-meta-wrapper">
					<span class="comment-meta">
						<?php printf(  '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'themepixels' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'reply_text'	=> __( ' - Reply', 'themepixels' ),
										'depth'			=> $depth,
										'max_depth'		=> $args['max_depth']
									)
								)
							);
						?>
						<?php edit_comment_link( __( 'Edit', 'themepixels' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
					</span>
				</div>

				<div class="comment-text">
					<?php if ( '0' === $comment->comment_approved ) { ?>
						<div class="comment-moderation-notice">
							<em class="comment-awaiting-moderation">
								<?php _e( 'Your comment is awaiting moderation.', 'themepixels' ); ?>
							</em>
						</div>
					<?php } ?>
					<?php comment_text(); ?>
				</div>

			</div>
	<?php
	}
}

?>