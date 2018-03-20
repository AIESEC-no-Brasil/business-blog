<?php
    global $cl_redata;

    $header_class = $cl_redata['header_style']; 
?>
        
        <div class="full_nav_menu">  
            <div class="container">
                <div id="navigation" class="nav_top pull-right">
                    <nav>
                        <?php 
                            $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                            wp_nav_menu($args);  
                        ?> 
                    </nav>
                </div>
                <?php if($header_class == 'header_12'): ?>
                    <div class="after_navigation_widgetized">
                        <?php dynamic_sidebar('After Navigation Area'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
