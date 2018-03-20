<?php
        global $cl_redata;

		extract(shortcode_atts(array(

            'test_cat' => 0,
            'duration' => 500

    	), $atts));

		$output = ''; 

        $output = '<div class="wpb_content_element testimonial_carousel_element">';

            $output .= '<div class="pagination"><a href="#" class="prev"><i class="icon-chevron-left"></i></a><a href="#" class="next"><i class="icon-chevron-right"></i></a></div>';

            $output .= '<section class="row testimonial_carousel" data-duration="'.esc_attr($duration).'">';      

        if((int) $test_cat == 0)
            $query_post = array('posts_per_page'=> 9999, 'post_type'=> 'testimonial' );                          
        else{
            $query_post = array('posts_per_page'=> 9999, 
                                'post_type'=> 'testimonial',
                                'tax_query' => array(   array(  'taxonomy'  => 'testimonial_entries', 
                                                                                    'field'     => 'id', 
                                                                                    'terms'     => (int) $test_cat,  
                                                                                    'operator'  => 'IN')) );
        }
        $loop = new WP_Query($query_post);

        if($loop->have_posts()){

            while($loop->have_posts()){

                $loop->the_post();  

                            $output .= '<div class="item">';

                                $output .= '<p>'.get_the_content().'</p>';

                                $output .= '<div class="param">';

                                $c = strlen($cl_redata['staff_position']);
                                
                               

                                $output .= '<h6>'.get_the_title().' ';

                                if($c > 0)
                                    $output .= ',';

                                $output .= '</h6>';
                                
                                $output .= '<span class="position"> '.$cl_redata['staff_position'].'</span>';

                                $output .= '</div>';

                            $output .= '</div>';
            }

        }

        wp_reset_query();

            $output .= '</section>';

            $output .= '<div class="pages_el"></div>';

        $output .= '</div>';

        echo $output;

?>