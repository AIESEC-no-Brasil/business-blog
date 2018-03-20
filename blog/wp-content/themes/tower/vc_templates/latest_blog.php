<?php 
    /**
 * Shortcode attributes
 * @var $atts
 * @var $dynamic_from_where
 * @var $carousel
 * @var $post_selected
 * @var $dynamic_cat
 * @var $style
 * @var $posts_per_page
 * Shortcode class
 * @var  WPBakeryShortCode_Latest_blog
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
        

        $output = '<div class="latest_blog wpb_content_element '.esc_attr($style).'">';


        if($style == 'simple')
            $text_limit = 23;
        else
            $text_limit = 20;

       if($dynamic_from_where == 'all_cat'){
            $query_post = array('posts_per_page'=> $all_posts, 'post_type'=> 'post'  );    

        }elseif($dynamic_from_where == 'one_post'){
           $query_post = array('p'=> $post_selected);   

        }else{
           $query_post = array('posts_per_page'=> $all_posts, 'post_type'=> 'post', 'cat' => $dynamic_cat ); 
        }
        
        query_posts($query_post);

        if(have_posts()){
            global $wp_query; 
          
            if($carousel == 'yes'){
                $output .= '<div class="blog_slider owl-carousel"  data-slidenr="'.(((int)$wp_query->found_posts > (int)$posts_per_page)?$posts_per_page:$wp_query->found_posts).'">'; 
                    
            }else{
                $output .= '<div class="row no_carousel">';
            }
            while (have_posts()) : the_post();
                        
                        $post_format = get_post_format(get_the_ID());
                        
                        $post_categories = wp_get_post_categories( get_the_ID() );
                        $cats = '';
                        foreach($post_categories as $c){
                            $cat = get_category( $c );
                            $cats .= ' '.$cat->name.',';
                        }

                        $cats = substr(trim($cats), 0, -1);

                        $output .= '<div class="'.( ($carousel == 'yes')?'':'' ).' blog-article grid-style blog-item  '.(($dynamic_from_where == 'one_post')?'single':'').'">'; 
                            $output .= '<div class="gridbox">';
                                $output .= '<div class="media">';
                                
                                $link = redux_post_meta('cl_redata',get_the_ID() ,'media_post_link');
                                if($post_format == 'audio'){

                                    $output .= do_shortcode('[soundcloud]'.$link.'[/soundcloud]');

                                }elseif(get_post_thumbnail_id()){
                                    
                                    $output .= '<img src="'.esc_url(codeless_image_by_id(get_post_thumbnail_id(), '', 'url')).'" alt="">';
                                                                    
                                }elseif($post_format == 'gallery'){

                                        $slider = new codeless_slideshow(get_the_ID(), 'flexslider');

                                        if($slider && $slider->slide_number > 0){
                                            
                                            $slider->img_size = 'blog_grid';
                                            $sliderHtml = $slider->render_slideshow();
                                            $output .= $sliderHtml;

                                        }

                                }elseif($post_format == 'video'){

                                        $video = ""; 

                                        

                                        if(codeless_backend_is_file( $link, 'html5video')){

                                            $video = codeless_html5_video_embed($link);

                                        }
                                        else if(strpos($link,'<iframe') !== false)
                                        {
                                            $video = $link;
                                        }
                                        else
                                        {
                                            global $wp_embed;
                                            $video = $wp_embed->run_shortcode("[embed]".trim($link)."[/embed]");
                                        }

                                        if(strpos($video, '<a') === 0)
                                        {
                                            $video = '<iframe src="'.esc_url($link).'"></iframe>';
                                        } 

                                        $output .= $video;

                                }
                            
                                $output .= '</div>';
                                $output .= '<div class="content">';
                                    $output .= '<ul class="info">';
                                        $output .= '<li>'.get_the_date().'</li>';
                                        $output .= '<li>/</li>';  
                                        $output .= '<li>'.$cats.'</li>';                             
                                    $output .= '</ul>';
                                    $output .= '<h1><a href="'.get_permalink().'">'.esc_html(get_the_title()).'</a></h1>';
                    

                                    $output .= '<div class="text">';
                                        $output .= codeless_text_limit(get_the_excerpt(), 22);
                                    $output .= '</div>';

                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
            endwhile;
            if($carousel == 'yes'){
                $output .= '</div>';
            
            }else{
                $output .= '</div>';
            }
        }

        $output .= '</div>';

        wp_reset_query();

        echo $output;
?>