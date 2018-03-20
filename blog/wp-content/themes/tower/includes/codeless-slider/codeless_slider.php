<?php

global $cl_redata;

class CodelessSlider {

	private $slider_id;
	private $height;

	var $output = array();

	function __construct($slider_id) {
		$s = get_term_by('id', $slider_id, 'slider');
		
		if(is_object($s)){
			$this->slider_id = $slider_id;
			$this->createSlider();
			$this->getAllSlides();
			$this->closeSlider();
		}else{
			$this->default_func();
		}
		
	}
	

	function createSlider(){
		global $cl_redata;
		if(isset($cl_redata['codeless_slider_height']) && $cl_redata['codeless_slider_height'] != '100%')
			$height = $cl_redata['codeless_slider_height'];
		elseif(! isset($cl_redata['codeless_slider_height']))
			$height = '450';
		else
			$height = 'fullscreen'; 

		$this->height = $height;

		$extra_class = '';
		if($cl_redata['slider_parallax']) 
			$extra_class .= ' parallax_slider';

		$speed = 10000;

		if(isset($cl_redata['codeless_slider_speed']) && !empty($cl_redata['codeless_slider_speed']) )
			$speed = $cl_redata['codeless_slider_speed'];

		$output = '<div class="codeless_slider_swiper '.esc_attr($extra_class).'" style="'.(($height == 'fullscreen')?'':'height:'.$height.'px').'">';
			$output .= '<div class="loading"><i class="moon-spinner icon-spin"></i></div>';
			$output .= '<div class="codeless_slider_wrapper" data-start="transform: translateY(0px);" data-'.(($height == 'fullscreen')?'1440':$height).'="transform: translateY(-250px);">';
				$output .= '<div class="codeless-slider-container swiper-parent swiper_slider codeless_slider" data-speed="'.$speed.'"  data-slidenumber="1" data-height="'.esc_attr($height).'">';
                	$output .= '<div class="pagination-parent nav-'.$cl_redata['slider_pagination_style'].' nav-slider">
                					<a class="prev" href="#">
										<span class="icon-wrap"><i class="icon-angle-left"></i></span>
										<div class="text">'.__('PREV','codeless').'</div>
									</a>
									<a class="next" href="#">
										<span class="icon-wrap"><i class="icon-angle-right"></i></span>
										<div class="text">'.__('NEXT','codeless').'</div>
									</a>
								</div>';
			        $output .= '<div class="swiper-wrapper">';
 
        $this->output[] = $output;
	}

	function closeSlider(){
					$output = '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>'; 
        $this->output[] = $output; 
	}

	function getAllSlides(){
		$term = get_term($this->slider_id, 'slider');
		query_posts(array(
	        'post_type' => 'slide',
			'slider' => $term->slug,
			'posts_per_page' => -1
	    ));

	    if (have_posts()) :

    		while (have_posts()) : the_post();

    			$id = get_the_ID();
    			$title = get_the_title();

    			$this->output[] = $this->renderSlide();

    		endwhile;

    	endif;

    	wp_reset_query();

	}

	function renderSlide(){
		global $cl_redata;
		$extra_style = $extra_class = ' ';
		if($cl_redata['slide_background_type'] == 'image'){ 
			$extra_style .= $this->createBackgroundStyle(); 
		} 

		$title_style = $this->createTitleStyle();
		$subtitle_style = $this->createSubTitleStyle();
		$description_style = $this->createDescriptionStyle();
		$image_style = $this->createImageStyle();
		$content_position = $this->contentPosition();
		

		$output = '<div class="swiper-slide" style="'.$extra_style.'" data-color="'.esc_attr($cl_redata['slider_menu_nav_colors']).'">';
			
			if(!isset($cl_redata['remove_container']) || !$cl_redata['remove_container'])
			$output .= '<div class="container">';  
				$output .= '<div class="content '.esc_attr($content_position['class']).'" style="'.$content_position['style'].'" data-start="opacity:1;" data-'.(($this->height == 'fullscreen')?'1000':$this->height-200).'="opacity: 0;">'; 
					
					if($cl_redata['slide_image_switch'])
						$output .= '<img style="'.$image_style.'" src="'.$cl_redata['slide_image_top']['url'].'" alt="" class="'.$cl_redata['slide_image_alignment'].'" />';


					$output .= '<h5 class="animated with_animation" data-maxfont="'.esc_attr($cl_redata['slide_subtitle_style']['font-size']).'" data-animation="'.esc_attr($cl_redata['slide_subtitle_animation']).'" style="'.$subtitle_style.'">'.$cl_redata['slide_subtitle'].'</h5>';
 
					$output .= '<h1 class="animated with_animation" data-maxfont="'.esc_attr($cl_redata['slide_title_style']['font-size']).'" data-animation="'.esc_attr($cl_redata['slide_title_animation']).'" style="'.$title_style.'">'.$cl_redata['slide_title'].'</h1>';
					
					if(!empty($cl_redata['slide_description']))
						$output .= '<p class="animated with_animation" data-maxfont="'.esc_attr($cl_redata['slide_description_style']['font-size']).'" data-animation="'.esc_attr($cl_redata['slide_description_animation']).'"  style="'.$description_style.'">'.$cl_redata['slide_description'].'</p>';
					if(!empty($cl_redata['slide_button1']) || !empty($cl_redata['slide_button2']) ):
						$output .= '<div class="buttons animated with_animation colors-'.esc_attr($cl_redata['slide_buttons_colors']).' align-'.esc_attr($cl_redata['slide_description_style']['text-align']).'" data-animation="fadeIn">';
							if(!empty($cl_redata['slide_button1']))
								$output .= '<a class="btn-bt '.esc_attr($cl_redata['overall_button_style'][0]).' '.esc_attr($cl_redata['slide_button1_style']).'" href="'.esc_url($cl_redata['slide_button1_link']).'"><span>'.$cl_redata['slide_button1'].'</span><i class="moon-arrow-right-5"></i></a>';
							if(!empty($cl_redata['slide_button2']))
								$output .= '<a class="btn-bt '.esc_attr($cl_redata['overall_button_style'][0]).' '.esc_attr($cl_redata['slide_button2_style']).'" href="'.esc_url($cl_redata['slide_button2_link']).'"><span>'.$cl_redata['slide_button2'].'</span><i class="moon-arrow-right-5"></i></a>';
						$output .= '</div>';
					endif;
				$output .= '</div>';
			if(!isset($cl_redata['remove_container']) || !$cl_redata['remove_container'])
			$output .= '</div>';

			if($cl_redata['slide_background_type'] == 'video')
				$output .= $this->createVideoMarkup();
			if(!empty($cl_redata['slide_bg_overlay']) )
				$output .= '<div class="bg-overlay" style="background:'.esc_attr($cl_redata['slide_bg_overlay']['color']).'; opacity:'.esc_attr($cl_redata['slide_bg_overlay']['alpha']).';"></div>';

		$output .= '</div>';

		return $output;
	}

	function createBackgroundStyle(){
		global $cl_redata;
		$extra_style = '';
		foreach($cl_redata['slide_background_image'] as $key => $value){
			if($key != 'media' && $key != 'background-image')
				$extra_style .= ' '. $key . ': '.$value.'; ';
		}

		if(!empty($cl_redata['slide_background_image']['background-image'])){
			$extra_style .= " background-image: url('".esc_url($cl_redata['slide_background_image']['background-image'])."'); ";
		}

		return $extra_style;
	}

	function createTitleStyle(){
		global $cl_redata;

		$title_style = ' font-family: '. esc_attr($cl_redata['slide_title_style']['font-family']).'; ';
		$title_style .= ' font-weight: '. esc_attr($cl_redata['slide_title_style']['font-weight']).'; ';
		$title_style .= ' font-size: '. esc_attr($cl_redata['slide_title_style']['font-size']).'; ';
		$title_style .= ' text-align: '. esc_attr($cl_redata['slide_title_style']['text-align']).'; ';
		$title_style .= ' line-height: '. esc_attr($cl_redata['slide_title_style']['line-height']).'; ';
		$title_style .= ' letter-spacing: '.esc_attr($cl_redata['slide_title_style']['letter-spacing']).'; ';
		$title_style .= ' text-transform: '. esc_attr($cl_redata['slide_title_style']['text-transform']).'; ';
		$title_style .= ' color: '. esc_attr($cl_redata['slide_title_style']['color']).'; '; 
		$title_style .= ' background-color: '.(is_array($cl_redata['slide_title_bg'])?'rgba('.implode(',', codeless_hexToRgb($cl_redata['slide_title_bg']['color'])).', '.$cl_redata['slide_title_bg']['alpha'].')':$cl_redata['slide_title_bg'] ).'; ';
		$title_style .= ' padding-left: '. esc_attr($cl_redata['slide_title_padding']['padding-left']).'; '; 
		$title_style .= ' padding-right: '. esc_attr($cl_redata['slide_title_padding']['padding-right']).'; ';
		$title_style .= ' padding-top: '. esc_attr($cl_redata['slide_title_padding']['padding-top']).'; '; 
		$title_style .= ' padding-bottom: '. esc_attr($cl_redata['slide_title_padding']['padding-bottom']).'; '; 
		wp_enqueue_style('codeless-slider-'.$this->slider_id.'-'.get_the_ID().'-title', $this->enqueue_default_fonts($cl_redata['slide_title_style']) , array(), '1.0.0');
		return $title_style;
	}

	function enqueue_default_fonts($font){
		$font_url = add_query_arg( 'family', urlencode( $font['font-family'].':100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' ), "//fonts.googleapis.com/css" );
    	return $font_url;
	}

	function createSubTitleStyle(){
		global $cl_redata;

		$subtitle_style = ' font-family: '. esc_attr($cl_redata['slide_subtitle_style']['font-family']).'; ';
		$subtitle_style .= ' font-weight: '. esc_attr($cl_redata['slide_subtitle_style']['font-weight']).'; ';
		$subtitle_style .= ' font-size: '. esc_attr($cl_redata['slide_subtitle_style']['font-size']).'; ';
		$subtitle_style .= ' text-align: '. esc_attr($cl_redata['slide_subtitle_style']['text-align']).'; ';
		$subtitle_style .= ' line-height: '. esc_attr($cl_redata['slide_subtitle_style']['line-height']).'; ';
		$subtitle_style .= ' letter-spacing: '.esc_attr($cl_redata['slide_subtitle_style']['letter-spacing']).'; ';
		$subtitle_style .= ' text-transform: '. esc_attr($cl_redata['slide_subtitle_style']['text-transform']).'; ';
		$subtitle_style .= ' color: '. esc_attr($cl_redata['slide_subtitle_style']['color']).'; '; 
		
		$subtitle_style .= ' display:inline-block;width:100%;';
		wp_enqueue_style('codeless-slider-'.$this->slider_id.'-'.get_the_ID().'-subtitle', $this->enqueue_default_fonts($cl_redata['slide_title_style']) , array(), '1.0.0');
		return $subtitle_style;
	}

	function createDescriptionStyle(){
		global $cl_redata;
		
		$title_style = ' font-family: '. esc_attr($cl_redata['slide_description_style']['font-family']).'; ';
		$title_style .= ' font-weight: '. esc_attr($cl_redata['slide_description_style']['font-weight']).'; ';
		$title_style .= ' font-size: '. esc_attr($cl_redata['slide_description_style']['font-size']).'; ';
		$title_style .= ' text-align: '. esc_attr($cl_redata['slide_description_style']['text-align']).'; ';
		$title_style .= ' line-height: '. esc_attr($cl_redata['slide_description_style']['line-height']).'; ';
		$title_style .= ' text-transform: '. esc_attr($cl_redata['slide_description_style']['text-transform']).'; ';
		$title_style .= ' color: '. esc_attr($cl_redata['slide_description_style']['color']).'; ';
		wp_enqueue_style('codeless-slider-'.$this->slider_id.'-'.get_the_ID().'-desc', $this->enqueue_default_fonts($cl_redata['slide_title_style']) , array(), '1.0.0');

		return $title_style;
	}

	function createImageStyle(){
		global $cl_redata;
		
		$image_style = ' width: '. esc_attr($cl_redata['slide_image_dimension']['width']).'; ';
		$image_style .= ' height: '. esc_attr($cl_redata['slide_image_dimension']['height']).'; ';

		return $image_style;
	}

	function contentPosition(){
		global $cl_redata;

		$extra = array();
		$extra['style'] = '';
		$extra['class'] = '';

		if($cl_redata['slide_content_position'] == 'none'){
			$extra['style'] = 'position:absolute; top:'.esc_attr($cl_redata['slide_content_position_absolute']['top']).'; ';
			$extra['style'] .= 'left:'.esc_attr($cl_redata['slide_content_position_absolute']['left']).'; ';
			$extra['style'] .= 'right:'.esc_attr($cl_redata['slide_content_position_absolute']['right']).'; ';
			$extra['style'] .= 'bottom:'.esc_attr($cl_redata['slide_content_position_absolute']['bottom']).'; ';
		}

		if($cl_redata['slide_content_position'] == 'vertical_centered'){
			$extra['class'] = ' vertical_centered ';
			$extra['style'] .= ' position:absolute;left:'.esc_attr($cl_redata['slide_content_position_absolute']['left']).'; ';
			$extra['style'] .= ' right:'.esc_attr($cl_redata['slide_content_position_absolute']['right']).'; ';
		}

		if($cl_redata['slide_content_position'] == 'horizontal_centered'){
			$extra['class'] = ' horizontal_centered ';
			$extra['style'] .= ' top:'.esc_attr($cl_redata['slide_content_position_absolute']['top']).'; ';
			$extra['style'] .= ' bottom:'.esc_attr($cl_redata['slide_content_position_absolute']['bottom']).'; ';
		}

		$width = 'auto';

		if(strpos($cl_redata['slide_content_width'], 'px' ) !== false )
			$width = substr($cl_redata['slide_content_width'], 0, -2);

		if($cl_redata['slide_content_position'] == 'in_middle'){
			$extra['class'] = ' vertical_centered horizontal_centered_two';
			$extra['style'] .= 'position:absolute; left:50%; margin-left: -'.($width/2).'px; ';
		}

		$extra['style'] .= ' width:'.esc_attr($cl_redata['slide_content_width']).'; ';

		return $extra;
	}

	function createVideoMarkup(){
		global $cl_redata;
		$video_markup = '<div class="video-wrap">';
		$extra_mobile_cl = '';
			if(!empty($cl_redata['slide_mobile_video']['url']) ):
				$video_markup .= '<span class="video_replace_mobile" style="background-image:url('.esc_url($cl_redata['slide_mobile_video']['url']).' );"></span>';
				$extra_mobile_cl = 'remove_on_mobile';
			endif;
			$video_markup .= '<video  webkit-playsinline="true" playsinline="true" class="'.$extra_mobile_cl.'" id="video_background" preload="auto" autoplay loop="loop" muted="muted" controls="controls" volume="0"> ';
				
				if(!empty($cl_redata['slide_webm_video']))
	        		$video_markup .= '<source src="'.esc_url($cl_redata['slide_webm_video']).'" type="video/webm">'; 
	            
	            if(!empty($cl_redata['slide_mp4_video']))
	            	$video_markup .= '<source src="'.esc_url($cl_redata['slide_mp4_video']).'" type="video/mp4">';
	            
	            if(!empty($cl_redata['slide_ogg_video']))
	            	$video_markup .= '<source src="'.esc_url($cl_redata['slide_ogg_video']).'" type="video/ogg">';  

	            $video_markup .= 'Video not supported';
	        $video_markup .= '</video>';
        $video_markup .= '</div>';

        return $video_markup;
	}

	function default_func(){
		$output = '<div class="default">Please select a Codeless Slider before. Click Edit Page -> Slider Options (at the bottom of page options)</div>';
		$this->output[] = $output;
	}

	function output(){
		echo implode("\n\n", $this->output);
	}

}

?>