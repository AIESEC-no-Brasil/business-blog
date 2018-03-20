<?php global $cl_redata; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="css3transitions">
 
<head>

    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>" />

    <?php  if (function_exists('codeless_favicon'))    { echo codeless_favicon($cl_redata['favicon']['url']); } ?>

    <!-- Title -->
    <?php
    if ( ! function_exists( '_wp_render_title_tag' ) ) :
        function theme_slug_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
        }
        add_action( 'wp_head', 'theme_slug_render_title' );
    endif;
    ?>

    <!-- Responsive Meta -->
    <?php if($cl_redata['responsive_bool']): ?> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> <?php endif; ?>

    <!-- Pingback URL -->
    <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

    <?php
    
    //Generated css from options
    include('includes/register/register_styles.php'); 
    
    // Loaded all others styles and scripts.
     	
    ?>


    <?php 

    // Loaded all others styles and scripts.
    wp_head(); 

    ?>
    <script><?php echo $cl_redata['tracking_code'] ?></script>
    <script><?php echo $cl_redata['custom_js'] ?></script>
</head>

<!-- End of Header -->

<body  <?php body_class(); ?>>

<?php if($cl_redata['show_search']): ?>
    <div class="search_bar"><div class="container"><?php get_search_form() ?></div></div>
<?php endif; ?>


<?php if($cl_redata['extra_navigation']): ?>
    <div class="extra_navigation <?php echo esc_attr($cl_redata['extra_navigation_position']) ?>">
        <a href="#" class="close"></a>
        <div class="content"><?php dynamic_sidebar( "Extra Side Navigation" ); ?></div>
    </div>
<?php endif; ?>


<?php if($cl_redata['outter_padding']): ?>
    <div class="top_space"></div>
    <div class="bottom_space"></div>
<?php endif; ?>


<?php $header_class = $cl_redata['header_style']; ?>

<?php $bgCheck = esc_attr( codeless_header_bgCheck() ); ?>
    

<!-- check if siden menu in responsive is selected-->
<?php if($cl_redata['responsive_menu_dropdown'] && $cl_redata['responsive_menu_style'] == 'sidemenu'): ?>

    <?php get_template_part('includes/view/menu', 'small-side'); ?>

    <div id="snapcontent" class="snap-content">

<?php endif; ?>


<div class="viewport <?php echo esc_attr( codeless_header_transitions('class') ) ?>" <?php echo codeless_header_transitions('attr') ?> >

<!-- Used for boxed layout -->
<?php if($cl_redata['site_layout'] == 'boxed'): ?>
<!-- Boxed Layout Wrapper --> 
<div class="boxed_layout">
<?php endif; ?>
    
    <?php if($cl_redata['slider_ontop']) get_template_part('includes/view/sliders_output'); ?>

    <!-- Start Top Navigation -->
    <?php if($cl_redata['top_navigation'] && !$cl_redata['top_navigation_transparency']): ?>
    <div class="top_nav">
        
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <div class="pull-left">
                        <?php dynamic_sidebar( "Top Header Left" ); ?>
                    </div>
                </div>
                <div class="span6">
                    <div class="pull-right">
                        <?php dynamic_sidebar( "Top Header Right" ); ?>
                    </div>
                </div>
               
            </div>
        </div>

    </div>
    <?php endif; ?>

    <!-- End of Top Navigation -->


    <?php if($cl_redata['header_6_transparent'] && $header_class == 'header_6'): ?>    
    
    <!-- Header 6 Wrapper -->
    <div class="header_6_wrapper">
     
    <?php endif; ?> 

    <!-- Header BEGIN -->
    <div  class="header_wrapper <?php echo esc_attr($header_class) ?> <?php echo esc_attr($bgCheck) ?> <?php if($header_class == 'header_7') echo 'pos--'.esc_attr($cl_redata['header_7_position']) ?> <?php if($cl_redata['slider_ontop']) echo 'slider_on_top'; ?>">
        
        <!-- Start Top Navigation -->
        <?php codeless_header_topnav_transparent(); ?>
        <!-- End of Top Navigation -->

        <header id="header" class="">

            <?php if(!$cl_redata['header_container_full']): ?>
            <div class="container">
            <?php endif; ?>

        	   <div class="row-fluid">

                    <div class="span12">
                        

                        <?php codeless_header_centered_logo('left'); ?>

                        <!-- Logo -->
                        <?php if(!isset($css_class)) $css_class=''; ?>
                        <div id="logo" class="<?php echo esc_attr($css_class) ?>">
                            <?php echo codeless_logo() ?>  
                        </div>
                        <!-- #logo END -->

                        <?php codeless_header_centered_logo('right'); ?>

                        <?php codeless_header_tools(); ?>

                        <?php codeless_header_menu_button(); ?>
                        

                        <!-- Navigation -->

                        <?php if($cl_redata['header_style'] == 'header_5'): ?>

                            <!-- Fullscreen Overlay -->
                                <?php get_template_part('includes/view/menu', 'fullscreen-overlay'); ?> 
                            <!-- End Fullscreen Overlay --> 

                        <?php endif; ?>

                        <?php if(codeless_header_main_navigation_style()): ?>	
                        
                            <?php if($header_class == 'header_7') $css_class .= ' pos_'.$cl_redata['header_7_position'].' ' ?>

                            <div id="navigation" class="nav_top pull-right  <?php echo esc_attr($css_class) ?>">
                                <nav>
                                <?php 
                                    $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                    wp_nav_menu($args);  
                                ?> 
                                </nav>
                            </div>

                        <?php endif; ?> 

                        <!-- #navigation -->

                        <!-- Responsive Menu Icon -->
                        <?php codeless_header_responsive_menu_icon(); ?>

                        <?php if($header_class == 'header_6' || $header_class == 'header_7' || $header_class == 'header_12' || $header_class == 'header_3'): ?>
                            
                            <div class="header_widgetized">
                                
                                <?php dynamic_sidebar('Header Widgetized Area'); ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>
                <?php if($header_class == 'header_3'): ?>

                    <?php if($cl_redata['responsive_menu_dropdown'] && $cl_redata['responsive_menu_style'] == 'normal'): ?>

                      <!-- Responsive Menu -->
                        <?php get_template_part('includes/view/menu', 'small'); ?> 
                      <!-- End Responsive Menu -->  

                    <?php endif; ?>

                <?php endif; ?>
                
            <?php if(!$cl_redata['header_container_full']): ?>
                
                </div>  

            <?php endif; ?>

            <?php if($header_class != 'header_3'): ?>
            
                <?php if($cl_redata['responsive_menu_dropdown'] && $cl_redata['responsive_menu_style'] == 'normal'): ?>

                      <!-- Responsive Menu -->
                        <?php get_template_part('includes/view/menu', 'small'); ?> 
                      <!-- End Responsive Menu -->  

                <?php endif; ?>

            <?php endif; ?>
        </header>

    </div>
    
    <?php if(codeless_header_check_fullwidth_menu()): ?>

        <!-- Fullwidth Menu -->
            <?php get_template_part('includes/view/menu', 'fullwidth'); ?> 
        <!-- Fulldiwth Menu End --> 

    <?php endif; ?>
    <?php if($cl_redata['extra_navigation']): ?>
                                    <a class="extra_navigation_button" href="#">
                                        <i class="icon-bars"></i>
                                    </a>  
                                    <?php endif; ?> 


    <?php if($cl_redata['header_6_transparent'] && $header_class == 'header_6'): ?>    
    </div>
    <!-- Close Header 6 Wrapper -->
    <?php endif; ?> 

    <?php if( (int) codeless_get_post_id() != 0 && !redux_post_meta('cl_redata',(int) codeless_get_post_id(), 'fullscreen_post_style')): ?>
    
    <div class="top_wrapper">
    <?php endif; ?>

        <?php if(!$cl_redata['slider_ontop']) get_template_part('includes/view/sliders_output'); ?>

<!-- .header -->