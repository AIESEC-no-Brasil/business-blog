<?php
/**
 * Themepixels Shortcodes Functions
 *
 * @package Smart Blog
 * @since 1.0
 */

/**
 * Fix Shortcodes
 *
 * @package Smart Blog
 * @since 1.0
 */
if( !function_exists('themepixels_fix_shortcodes') ) {
	function themepixels_fix_shortcodes( $content ) {
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
}
add_filter('the_content', 'themepixels_fix_shortcodes');

/**
 * To figure out the attributes of a wrapped shortcode
 *
 * @package Smart Blog
 * @since 1.0
 */
if( !function_exists('themepixels_attribute_map') ) {
	function themepixels_attribute_map( $str, $att = null ) {
	    $res = array();
	    $return = array();
	    $reg = get_shortcode_regex();
	    preg_match_all( '~'.$reg.'~',$str, $matches );
	    foreach( $matches[2] as $key => $name ) {
	        $parsed = shortcode_parse_atts( $matches[3][$key] );
	        $parsed = is_array( $parsed ) ? $parsed : array();

	            $res[$name] = $parsed;
	            $return[] = $res;
		}
	    return $return;
	}
}

/**
 * Row
 *
 * @package Smart Blog
 * @since 1.0
 */
if( !function_exists('themepixels_shortcode_row') ) {
	function themepixels_shortcode_row( $atts, $content = null ) {
		return '<div class="row">' . do_shortcode($content) . '</div>';
	}
}
add_shortcode('row', 'themepixels_shortcode_row');

/**
 * Columns
 *
 * @package Smart Blog
 * @since 1.0
 */
if( !function_exists('themepixels_shortcode_column') ) {
	function themepixels_shortcode_column( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'size'	=> 6
		), $atts ) );
		$fade_in_class = '';
		
		return '<div class="col-md-'. $size .'">' . do_shortcode($content) . '</div>';
	}
}
add_shortcode('column', 'themepixels_shortcode_column');

/**
 * Social
 *
 * @package Smart Blog
 * @since 1.0
 */
if( !function_exists('themepixels_shortcode_social') ) {
	function themepixels_shortcode_social( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'	=> '',
			'style'	=> '',
			'size'	=> ''
		), $atts ) );

		$icon_color = '';
		if( $color == 'light' ) {
			$icon_color = '';
		} elseif( $color == 'dark' ) {
			$icon_color = 'social-dark';
		} elseif( $color == 'colored' ) {
			$icon_color = 'social-colored';
		}

		$icon_style = '';
		if( $style == 'default' ) {
			$icon_style = '';
		} elseif( $style == 'round' ) {
			$icon_style = 'social-rounded';
		} elseif( $style == 'square' ) {
			$icon_style = 'social-squared';
		}

		$icon_size = ( $size == 'large' ) ? 'social-large' : '';
		
		return '<ul class="social-icons '. $icon_color .' '. $icon_style .' '. $icon_size .'">' . do_shortcode($content) . '</ul>';
	}
}
add_shortcode('social', 'themepixels_shortcode_social');

if( !function_exists('themepixels_shortcode_social_icon') ) {
	function themepixels_shortcode_social_icon( $atts ) {
		extract( shortcode_atts( array(
			'icon'	=> '',
			'url'	=> ''
		), $atts ) );

		$icon_vimeo = '';
		if( $icon == 'vimeo' ) {
			$icon_vimeo = '-square';
		}
		
		return '<li><a href="'. $url .'" class="social-'. $icon .'" data-toggle="tooltip" data-placement="top" title="'. ucwords($icon) .'"><i class="fa fa-'. $icon .''. $icon_vimeo .'"></i><i class="fa fa-'. $icon .''. $icon_vimeo .'"></i></a></li>';
	}
}
add_shortcode('social_icon', 'themepixels_shortcode_social_icon');

/**
 * Tabs
 *
 * @package Smart Blog
 * @since 1.0
 */
if (!function_exists('themepixels_shortcode_tabgroup')) {
    function themepixels_shortcode_tabgroup( $atts , $content = null ) {
        $GLOBALS['tabs_id'] = uniqid();

        $GLOBALS['tabs_default_count'] = 0;

        $ul_class  = 'nav nav-tabs';

        $div_class = 'tab-content';

        $id = 'custom-tabs-'. $GLOBALS['tabs_id'];

        $atts_map = themepixels_attribute_map( $content );

        // Extract the tab titles for use in the tab widget.
        if ( $atts_map ) {
            $tabs = array();
            $GLOBALS['tabs_default_active'] = true;
            foreach( $atts_map as $check ) {
                if( !empty($check["tab"]["active"]) ) {
                    $GLOBALS['tabs_default_active'] = false;
                }
            }
            $i = 0;
            foreach( $atts_map as $tab ) {
                $tabs[] = sprintf(
	                '<li%s role="presentation"><a href="#%s" data-toggle="tab" role="tab">%s</a></li>',
	                ( !empty($tab["tab"]["active"]) || ($GLOBALS['tabs_default_active'] && $i == 0) ) ? ' class="active"' : '',
	                'custom-tab-' . sanitize_title($tab["tab"]["title"]) . '-' . $GLOBALS['tabs_id'],
	                $tab["tab"]["title"]
                );
                $i++;
            }
        }
        return sprintf( 
	        '<div class="themepixels-tabs" role="tabpanel"><ul class="%s" id="%s" role="tablist">%s</ul><div class="%s">%s</div></div>',
	        esc_attr( $ul_class ),
	        esc_attr( $id ),
	        ( $tabs )  ? implode( $tabs ) : '',
	        esc_attr( $div_class ),
	        do_shortcode( $content )
        );
    }
}
add_shortcode( 'tabgroup', 'themepixels_shortcode_tabgroup' );

if (!function_exists('themepixels_shortcode_tab')) {
    function themepixels_shortcode_tab( $atts , $content = null ) {
        extract( shortcode_atts( array(
            'title'   => false,
            'active'  => false,
            'fade'    => false
        ), $atts ));

        if( $GLOBALS['tabs_default_active'] && $GLOBALS['tabs_default_count'] == 0 ) {
            $active = true;
        }
        $GLOBALS['tabs_default_count']++;

        $class  = 'tab-pane';
        $class .= ( $fade   == 'true' ) ? ' fade' : '';
        $class .= ( $active == 'true' ) ? ' active' : '';
        $class .= ( $active == 'true' && $fade == 'true' ) ? ' in' : '';

        $id = 'custom-tab-'. sanitize_title( $title ) . '-'. $GLOBALS['tabs_id'];

        return sprintf( 
	        '<div id="%s" class="%s" role="tabpanel">%s</div>',
	        esc_attr( $id ),
	        esc_attr( $class ),
	        do_shortcode( $content )
        );

    }
}
add_shortcode( 'tab', 'themepixels_shortcode_tab' );

/**
 * Toggle
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_toggle' ) ) {
	function themepixels_shortcode_toggle( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'title'				=> 'Toggle Title'
		), $atts ) );

		wp_enqueue_script('themepixels_toggle');

		return '<div class="themepixels-toggle"><h3 class="themepixels-toggle-trigger">'. $title .'</h3><div class="themepixels-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
}
add_shortcode( 'toggle', 'themepixels_shortcode_toggle' );

/**
 * Accordion
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_accordion' ) ) {
	function themepixels_shortcode_accordion( $atts , $content = null ) {

		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('themepixels_accordion');

		return '<div class="themepixels-accordion clearfix">' . do_shortcode($content) . '</div>';
	}
}
add_shortcode( 'accordion', 'themepixels_shortcode_accordion' );

if ( !function_exists( 'themepixels_shortcode_accordion_section' ) ) {
	function themepixels_shortcode_accordion_section( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'title'				=> 'Title'
		), $atts ) );

		return '<h3 class="themepixels-accordion-trigger"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
}
add_shortcode( 'accordion_section', 'themepixels_shortcode_accordion_section' );

/**
 * Button
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_button' ) ) {
	function themepixels_shortcode_button( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'btn_text'			=> 'Button',
			'btn_url'			=> '',
			'btn_color'			=> 'primary',
			'btn_size'			=> '',
			'btn_style'			=> '',
			'btn_outlined'		=> '',
			'link_target'		=> 'self',
			'link_rel'			=> '',
			'icon_left'			=> '',
			'icon_right'		=> ''
		), $atts ) );

		$button_color = '';
		if( $btn_color !== '' ) {
			$button_color = 'btn-'. $btn_color .'';
		}

		$button_size = '';
		if( $btn_size == 'large' ) {
			$button_size = 'btn-lg';
		} elseif( $btn_size == 'medium' ) {
			$button_size = '';
		} elseif( $btn_size == 'small' ) {
			$button_size = 'btn-sm';
		} elseif( $btn_size == 'xsmall' ) {
			$button_size = 'btn-xs';
		}

		$button_style = '';
		if( $btn_style == 'default' ) {
			$button_style = '';
		} elseif( $btn_style == 'round' ) {
			$button_style = 'btn-rounded';
		} elseif( $btn_style == 'square' ) {
			$button_style = 'btn-squared';
		}

		$button_outlined = '';
		if( $btn_outlined == 'yes' ) {
			$button_outlined = 'btn-outlined';
		}

		$link_rel = ( $link_rel ) ? 'rel="'. $link_rel .'"' : NULL;

		$icon_left = strtolower($icon_left);
		$icon_right = strtolower($icon_right);

		$icon_left_class = '';
		if( $icon_left ) {
			$icon_left_class = 'icon-left';
		}

		$icon_right_class = '';
		if( $icon_right ) {
			$icon_right_class = 'icon-right';
		}

		$output = '';
		$output .= '<a href="'. $btn_url .'" class="btn '. $button_color .' '. $button_size .' '. $button_style .' '. $button_outlined .' '. $icon_left_class .' '. $icon_right_class .'" target="_'. $link_target .'" title="'. $btn_text .'" '. $link_rel .'>';
		if( $icon_left ) {
			$output .= '<i class="fa fa-'. $icon_left .'"></i>';
		}
		$output .= $content;
		if( $icon_right ) {
			$output .= '<i class="fa fa-'. $icon_right .'"></i>';
		}
		$output .= '</a>';
		
		return $output;
	}
}
add_shortcode( 'button', 'themepixels_shortcode_button' );

/**
 * Skillbar
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_skillbar' ) ) {
	function themepixels_shortcode_skillbar( $atts ) {
		extract( shortcode_atts( array(
			'title'				=> 'Title',
			'percentage'		=> '75',
			'color'				=> 'primary',
			'enable_stripe'		=> '',
			'enable_animation'	=> ''
		), $atts ) );

		$skill_color = '';
		if( $color !== '' ) {
			$skill_color = 'skill-bar-'. $color .'';
		} else {
			$skill_color = 'skill-bar-primary';
		}

		$skill_stripes = '';
		if( $enable_stripe == 'yes' ) {
			$skill_stripes = 'skill-bar-striped';
		}

		$skill_animation = '';
		if( $enable_animation == 'yes' ) {
			$skill_animation = 'skill-bar-animated';
		}
		
		$output = '';
		$output .= '<div class="skill-bar-wrapper '. $skill_stripes .' '. $skill_animation .' '. $skill_color .'">';
		$output .= '<div class="skill-bar-content clearfix">';
		$output .= '<span class="skill-bar-title">'. $title .'</span>';
		$output .= '<span class="skill-bar-percent">'. $percentage .'%</span>';
		$output .= '</div>';
		$output .= '<div class="skill-bar clearfix" data-percent="'. $percentage .'%">';
		$output .= '<div class="skill-bar-bar" style=""></div>';
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}
add_shortcode( 'skillbar', 'themepixels_shortcode_skillbar' );

/**
 * Alert
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_alert' ) ) {
	function themepixels_shortcode_alert( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'type'			=> 'success',
			'enable_close'	=> 'yes'
		), $atts ) );

		$alert_type = '';
		if( $type == 'success' ) {
			$alert_type = 'alert-success';
		} elseif( $type == 'info' ) {
			$alert_type = 'alert-info';
		} elseif( $type == 'warning' ) {
			$alert_type = 'alert-warning';
		} elseif( $type == 'danger' ) {
			$alert_type = 'alert-danger';
		}

		$alert_close = '';
		if( $enable_close == 'yes' ) {
			$alert_close = 'alert-dismissible fade in';
		}
		  
		$output = '';
		$output .= '<div class="alert '. $alert_type .' '. $alert_close .'" role="alert">';
		if( $enable_close == 'yes' ) {
			$output .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		}
		$output .= do_shortcode( $content );
		$output .= '</div>';
		
		return $output;
	}
}
add_shortcode( 'alert', 'themepixels_shortcode_alert' );

/**
 * Tooltip
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_tooltip' ) ) {
	function themepixels_shortcode_tooltip( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'title'			=> 'Tooltip',
			'placement'		=> 'top',
			'trigger'		=> 'hover',
		), $atts ) );
		  
		$output = '';
		$output .= '<span class="themepixels-tooltip" data-toggle="tooltip" data-trigger="'. $trigger .'" data-placement="'. $placement .'" title="'. $title .'">';
		$output .= $content;
		$output .= '</span>';
		
		return $output;
	}
}
add_shortcode( 'tooltip', 'themepixels_shortcode_tooltip' );

/**
 * Modal
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_modal' ) ) {
	function themepixels_shortcode_modal( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'btn_color'		=> 'btn-primary',
			'btn_size'		=> '',
			'btn_style'		=> '',
			'btn_outlined'		=> '',
			'btn_text'		=> 'Launch modal',
			'modal_title'		=> '',
			'modal_size'		=> '',
			'enable_animation'		=> 'yes',
			'show_modal_footer'		=> 'yes',
		), $atts ) );

		$modal_id = uniqid();

		$button_color = '';
		if( $btn_color !== '' ) {
			$button_color = 'btn-'. $btn_color .'';
		}

		$button_size = '';
		if( $btn_size == 'large' ) {
			$button_size = 'btn-lg';
		} elseif( $btn_size == 'medium' ) {
			$button_size = '';
		} elseif( $btn_size == 'small' ) {
			$button_size = 'btn-sm';
		} elseif( $btn_size == 'xsmall' ) {
			$button_size = 'btn-xs';
		}

		$button_style = '';
		if( $btn_style == 'default' ) {
			$button_style = '';
		} elseif( $btn_style == 'round' ) {
			$button_style = 'btn-rounded';
		} elseif( $btn_style == 'square' ) {
			$button_style = 'btn-squared';
		}

		$button_outlined = '';
		if( $btn_outlined == 'yes' ) {
			$button_outlined = 'btn-outlined';
		}

		$modal_animation = '';
		if( $enable_animation == 'yes' ) {
			$modal_animation = 'fade';
		}

		$modal_box_size = '';
		if( $modal_size == 'large' ) {
			$modal_box_size = 'modal-lg';
		} elseif( $modal_size == 'medium' ) {
			$modal_box_size = '';
		} elseif( $modal_size == 'small' ) {
			$modal_box_size = 'modal-sm';
		}

		$output = '';
		$output .= '<a href="#" target="_blank" class="btn '. $button_color .' '. $button_size .' '. $button_style .' '. $button_outlined .'" data-toggle="modal" data-target="#modal-'. $modal_id .'">'. $btn_text .'</a>';
		$output .= '<div class="themepixels-modal modal '. $modal_animation .'" id="modal-'. $modal_id .'" tabindex="-1" role="dialog" aria-labelledby="modal-'. $modal_id .'-Label" aria-hidden="true">';
		$output .= '<div class="modal-dialog '. $modal_box_size .'">';
		$output .= '<div class="modal-content">';
		$output .= '<div class="modal-header">';
		$output .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$output .= '<h4 class="modal-title" id="modal-'. $modal_id .'-Label">'. $modal_title .'</h4>';
		$output .= '</div>';
		$output .= '<div class="modal-body">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		if( $show_modal_footer == 'yes' ) {
			$output .= '<div class="modal-footer">';
			$output .= '<a class="btn btn-primary" data-dismiss="modal">Close</a>';
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}
add_shortcode( 'modal', 'themepixels_shortcode_modal' );

/**
 * Google Map
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_googlemap' ) ) {
	function themepixels_shortcode_googlemap( $atts ) {
		extract(shortcode_atts(array(
				'title'			=> '',
				'location'		=> '',
				'width'			=> '',
				'height'		=> '300',
				'zoom'			=> 8
		), $atts));
		
		// load scripts
		wp_enqueue_script('themepixels_googlemap');
		wp_enqueue_script('themepixels_googlemap_api');
		
		
		$googlemap_id = uniqid();
		$output = '';
		$output .= '<div id="map_canvas_'. $googlemap_id .'" class="googlemap clearfix" style="height:'. $height .'px;width:100%">';
			$output .= ( !empty( $title ) ) ? '<input class="title" type="hidden" value="'. $title .'" />' : '';
			$output .= '<input class="location" type="hidden" value="'. $location .'" />';
			$output .= '<input class="zoom" type="hidden" value="'. $zoom .'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	}
}
add_shortcode( 'googlemap', 'themepixels_shortcode_googlemap' );

/**
 * Highlight
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_highlight' ) ) {
	function themepixels_shortcode_highlight( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'yellow'
		),
		$atts ) );

		return '<span class="highlight highlight-'. $color .'">' . do_shortcode( $content ) . '</span>';
	}
}
add_shortcode( 'highlight', 'themepixels_shortcode_highlight' );

/**
 * Heading
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_heading' ) ) {
	function themepixels_shortcode_heading( $atts ) {
		extract( shortcode_atts( array(
			'title'			=> 'Sample Heading',
			'type'			=> 'h2',
			'margin_top'	=> '',
			'margin_bottom'	=> '',
			'font_size'		=> '',
			'color'			=> ''
		),
		$atts ) );

		$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. intval($font_size) .'px;';
		}
		if ( $color ) {
			$style_attr .= 'color: '. $color .';';
		}
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. intval($margin_bottom) .'px;';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. intval($margin_top) .'px;';
		}
		
	 	$output = '<'. $type .' class="section-title" style="'. $style_attr .'"><span>';
			$output .= $title;
		$output .= '</span></'. $type .'>';
		
		return $output;
	}
}
add_shortcode( 'heading', 'themepixels_shortcode_heading' );

/**
 * Spacing
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_spacing' ) ) {
	function themepixels_shortcode_spacing( $atts ) {
		extract( shortcode_atts( array(
			'size'	=> '20px'
		),
		$atts ) );
		
	 return '<hr class="themepixels-spacing" style="height: '. intval($size) .'px" />';
	}
}
add_shortcode( 'spacing', 'themepixels_shortcode_spacing' );

/**
 * Image Lightbox
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_img_lightbox' ) ) {
	function themepixels_shortcode_img_lightbox( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'title'			=> '',
			'full_img_url'			=> ''
		),
		$atts ) );

		return '<a class="img-lightbox" href="'. $full_img_url .'" title="'. $title .'">' . do_shortcode( $content ) . '</a>';
	}
}
add_shortcode( 'image_lightbox', 'themepixels_shortcode_img_lightbox' );

/**
 * Video Lightbox
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_video_lightbox' ) ) {
	function themepixels_shortcode_video_lightbox( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'title'			=> '',
			'video_url'			=> ''
		),
		$atts ) );

		return '<a class="video-lightbox" href="'. $video_url .'" title="'. $title .'">' . do_shortcode( $content ) . '</a>';
	}
}
add_shortcode( 'video_lightbox', 'themepixels_shortcode_video_lightbox' );

/**
 * Video Embed
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_video' ) ) {
	function themepixels_shortcode_video( $atts ) {
		extract( shortcode_atts( array(
			'url'			=> ''
		), $atts ) );

		$video = wp_oembed_get( $url );
		  
		return '<div class="themepixels-video-shortcode responsive-video-wrapper clearfix">'. $video .'</div>';
	}
}
add_shortcode( 'video_embed', 'themepixels_shortcode_video' );

/**
 * Audio Embed
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_audio' ) ) {
	function themepixels_shortcode_audio( $atts ) {
		extract( shortcode_atts( array(
			'url'			=> ''
		), $atts ) );

		$video = wp_oembed_get( $url );
		  
		return '<div class="themepixels-audio-shortcode responsive-audio-wrapper clearfix">'. $video .'</div>';
	}
}
add_shortcode( 'audio_embed', 'themepixels_shortcode_audio' );

/**
 * Code
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_code' ) ) {
	function themepixels_shortcode_code( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'inline'		=> false,
			'scrollable'	=> false
		),
		$atts ) );

		$inline_type = ( $inline == 'true' ) ? 'code' : 'pre';
		$scrollable_class = ( $scrollable == 'true' ) ? 'pre-scrollable' : '';
		
	 	$output = '<'. $inline_type .' class="'. $scrollable_class .'">';
			$output .= do_shortcode( $content );
		$output .= '</'. $inline_type .'>';
		
		return $output;
	}
}
add_shortcode( 'code', 'themepixels_shortcode_code' );

/**
 * Dropcap
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_dropcap' ) ) {
	function themepixels_shortcode_dropcap( $atts , $content = null ) {
		return '<span class="dropcap">'. do_shortcode( $content ) .'</span>';
	}
}
add_shortcode( 'dropcap', 'themepixels_shortcode_dropcap' );

/**
 * Divider
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_divider' ) ) {
	function themepixels_shortcode_divider( $atts ) {
		extract( shortcode_atts( array(
			'style'				=> 'dashed',
			'margin_top'		=> '20px',
			'margin_bottom'		=> '20px'
		),
		$atts ) );

		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {  
			$style_attr = 'style="margin-top: '. intval($margin_top) .'px;margin-bottom: '. intval($margin_bottom) .'px;"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. intval($margin_bottom) .'px;"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. intval($margin_top) .'px;"';
		} else {
			$style_attr = NULL;
		}
		return '<hr class="themepixels-divider '. $style .'" '.$style_attr.' />';
	}
}
add_shortcode( 'divider', 'themepixels_shortcode_divider' );

/**
 * Testimonial
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_testimonial' ) ) {
	function themepixels_shortcode_testimonial( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'author'	=> ''
		), $atts ) );
		  
		$output = '';
		$output .= '<div class="testimonial"><div class="testimonial_content">';
		$output .= $content;
		$output .= '</div><div class="testimonial_author clearfix">'. $author .'</div></div>';
		
		return $output;
	}
}
add_shortcode( 'testimonial', 'themepixels_shortcode_testimonial' );

/**
 * Topbar Info
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_top_bar_info' ) ) {
	function themepixels_shortcode_top_bar_info( $atts , $content = null ) {
		$output = '';
		$output .= '<ul class="top-bar-info">';
			$output .= do_shortcode( $content );
		$output .= '</ul>';
		
		return $output;
	}
}
add_shortcode( 'top_bar_info', 'themepixels_shortcode_top_bar_info' );

/**
 * Topbar Info Item
 *
 * @package Smart Blog
 * @since 1.0
 */
if ( !function_exists( 'themepixels_shortcode_top_bar_info_item' ) ) {
	function themepixels_shortcode_top_bar_info_item( $atts , $content = null ) {
		extract( shortcode_atts( array(
			'icon'		=> ''
		), $atts ) );
		  
		$output = '';
		$output .= '<li class="top-info-box">';
			if( $icon !== '' ) {
				$output .= '<i class="fa fa-'. $icon .'"></i>';
			}
			$output .= do_shortcode( $content );
		$output .= '</li>';
		
		return $output;
	}
}
add_shortcode( 'top_bar_info_item', 'themepixels_shortcode_top_bar_info_item' );