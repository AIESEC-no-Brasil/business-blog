<?php        
global $cl_redata;
 /**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $icon_bool
 * @var $icon
 * @var $image
 * @var $icon_color
 * @var $bg_color
 * @var $title_color
 * @var $text_color
 * @var $link
 * Shortcode class
 * @var  WPBakeryShortCode_Services_Block
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

    $extra_class = '';
    if($icon_bool == 'icon' || $icon_bool == 'yes' && !empty($icon))
        $extra_class = 'with_icon';
    $output = '<div class="'.$extra_class.' services_block wpb_content_element" style="background:'.$bg_color.';">'; 
        $output .= '<a href="'.esc_url($link).'" class="link_overall"></a>';
        $icon_class = (($icon_bool == 'yes')?'with_icon':'no_icon');
        $output .= '<span class="image_container">';
        
        if($icon_bool == 'icon' || $icon_bool == 'yes' && !empty($icon)):  
            $output .= '<i class="'.$icon.'" style="color:'.$icon_color.';"></i>';
        endif;

        if($icon_bool == 'image' && !empty($image)):
            $output .= '<img src="'.esc_url(codeless_image_by_id($image, '', 'url')).'" alt="" />';
        endif;
        
        $output .= '</span>';

        $output .= '<div class="content">';
            $output .= '<h4 style="color:'.$title_color.';"><a href="'.esc_url($link).'">'.esc_html($title).'</a></h4>';
            $output .= '<p  style="color:'.$text_color.';">'.do_shortcode($content).'</p>';
        $output .= '</div>';    
        
    $output .= '</div>';
    echo $output;
?>