<?php
 /**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $percentage
 * @var $color
 * Shortcode class
 * @var  WPBakeryShortCode_Skill
 */
$output = '';
global $cl_redata;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );



		if(!isset($color))
            $color = 'base';

        if($color == 'base'){

            $color = $cl_redata['primary_color'];
        }    

        $output .= '<h6 class="skill_title">'.esc_html($title).'</h6>';

        $output .= '<div class="skill animate_onoffset" data-percentage="'.esc_attr($percentage).'">';

 		$output .= '<div class="prog" style="width:0%; background:'.esc_attr($color).';"><span class="skill_tooltip">'.$percentage.'%</span></div>';

    	$output .= '</div>'; 

    	echo $output;

?>