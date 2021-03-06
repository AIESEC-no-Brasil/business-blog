<?php
global $cl_redata;
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $icon
 * @var $button_bool
 * @var $button_title
 * @var $button_link
 * @var $style
 * Shortcode class
 * @var  WPBakeryShortCode_Textbar
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
        $extra_class = '';
        if($second_title_bool == 'yes')
            $extra_class .= 'with_two_titles';
        if($button_bool == 'no')
            $extra_class .= ' without_button';
        $output = '<div class="textbar '.esc_attr($style).' wpb_content_element '.esc_attr($extra_class).'">';
        if($second_title_bool == 'yes')
            $output .= '<div class="titles">';
        
        $output .= '<h2>'.do_shortcode($content).'</h2>';

        if($second_title_bool == 'yes' && !empty($second_title))
            $output .= '<h6>'.do_shortcode($second_title).'</h6>';

        if($second_title_bool == 'yes')
            $output .= '</div>';
        if(isset($button_bool) && $button_bool == 'yes')
            $output .= '<a href="'.esc_url($button_link).'" class="btn-bt '.esc_attr($cl_redata['overall_button_style'][0]).'"><span>'.esc_attr($button_title).'</span><i class="'.esc_attr($icon).'"></i></a>';
        $output .= '</div>';
        echo $output;

?>