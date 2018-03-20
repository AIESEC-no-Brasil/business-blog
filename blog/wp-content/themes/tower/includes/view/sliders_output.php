<?php 

/* ---------- Slider ---------------- */

wp_reset_postdata();

global $cl_redata;

if(( is_home() || is_page()) && !is_single() ){
    $extra_class = '';
    $extra_style = '';
    if($cl_redata['slider_fixed'])
        $extra_class = 'fixed_parallax';

    $slider = new codeless_slideshow(codeless_get_post_id());

      ?><!-- check if side menu in responsive is enabled-->
    <?php if($cl_redata['responsive_menu_dropdown'] && $cl_redata['responsive_menu_style']=='sidemenu')
        $ignore_drag="data-snap-ignore='true'";
            else
        $ignore_drag='';
    ?>
    <?php

    if($slider && $slider->slide_number > 0 && $slider->slide_type != '' && $slider->slide_type != 'none'){

        if($slider->options['slideshow_layout'] == 'boxed'){

            $slider->img_size = 'portfolio_bottom';

    ?>
  

    <section id="slider-fixed" class="slider <?php echo esc_attr($extra_class) ?>" <?php echo $ignore_drag; ?> style="<?php echo $extra_style ?>">

        <div class="container">

            <div class="row">

                <div class="span12">

    <?php

    }elseif($slider->options['slideshow_layout'] == 'fullwidth'){

    ?>


    <section id="slider-fullwidth" <?php echo $ignore_drag; ?> class="slider <?php echo esc_attr($extra_class) ?>">
                                       
    <?php }  ?>

        <?php echo $slider->display(); 

        if($slider->options['slideshow_layout'] == 'boxed'){ ?>


                </div>    
            </div>
        </div>
    </section>

     <?php }else{ ?>

    </section>


    <?php }

    }else{ ?>
        <?php if(has_post_thumbnail(codeless_get_post_id()) && $cl_redata['use_featured_image_as_photo']): ?>
        
            <span class="slider-img" style="background-image:url('<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(codeless_get_post_id()), '', 'url')) ?>');"></span>
        
        <?php endif; ?>
    <?php }

}
/* ---------- End Slider -------------- */
?>   