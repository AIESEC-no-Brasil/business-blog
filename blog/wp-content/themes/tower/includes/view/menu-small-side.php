
<?php global $cl_redata; $header_class = $cl_redata['header_style']; ?>
<div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left <?php echo esc_attr($header_class) ?>">
                <div class="container">
      
                    <?php if(!isset($css_class)) $css_class=''; ?>
                                <div id="logo" class="<?php echo esc_attr($css_class) ?>">
                                    <?php echo codeless_logo() ?>  
                                </div>

                    <?php //get_template_part('includes/view/menu', 'side'); ?>
                    
                    <div id="navigation" class="nav_top pull-right  <?php echo esc_attr($css_class) ?>">
                        <nav>
                            <?php 
                                $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                wp_nav_menu($args);  
                            ?> 
                        </nav>
                    </div>


                    <?php if($header_class == 'header_6' || $header_class == 'header_7' || $header_class == 'header_12'): ?>
                            <div class="header_widgetized">
                                <?php dynamic_sidebar('Header Widgetized Area'); ?>
                            </div>
                    <?php endif; ?>
           
                </div>
            </div>

            <div class="snap-drawer snap-drawer-right">
                
            </div>

    </div>