<?php

if(function_exists('register_sidebar')){
    
    function codeless_register_sidebars_init(){
        global $cl_redata;
        
        register_sidebar(array(
            'name' => __('Sidebar Blog', 'codeless'),
            'id' => 'sidebar-blog',
            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h5 class="widget-title">', 
            'after_title' => '</h5>'
        ));
      
        register_sidebar(array(
                'name' => __('Sidebar Pages', 'codeless'),
                'id' => 'sidebar-pages',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
        ));
        register_sidebar(array(
                'name' => __('Sidebar Portfolio', 'codeless'),
                'id' => 'sidebar-portfolio',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
        ));

        register_sidebar(array( 
                'name' => __('Top Header Left', 'codeless'),
                'id' => 'top-header-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));

        register_sidebar(array(
                'name' => __('Top Header Right', 'codeless'),
                'id' => 'top-header-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));

        if(isset($cl_redata['footer_columns'])):
            $footer_columns = $cl_redata['footer_columns'];
            
            for ($i = 1; $i <= $footer_columns; $i++)
            {
                register_sidebar(array(
                    'name' => 'Footer - column'.$i,
                    'id' => 'footer-column-'.$i,
                    'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                    'after_widget' => '</div>', 
                    'before_title' => '<h5 class="widget-title">', 
                    'after_title' => '</h5>', 
                ));
            }
        endif;

        register_sidebar(array(
                'name' => __('Copyright Footer Sidebar', 'codeless'),
                'id' => 'copyright',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));
        
            

        if(isset($cl_redata['pages_sidebar'])):    
            $id_array = $cl_redata['pages_sidebar'];
                if(isset($id_array[0]))
                {
                    foreach ($id_array as $page_id)
                    {   
                        
                        if($page_id != "")
                        register_sidebar(array(
                            'name' => __('Page','codeless').': '.get_the_title($page_id).'',
                            'id' => 'page-'.get_the_title($page_id),
                            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                            'after_widget' => '</div>', 
                            'before_title' => '<h6 class="widget-title">', 
                    'after_title' => '</h6>'
                        ));
                    
                    
                    }
                }
        endif;
                
            
            
        if(isset($cl_redata['categories_sidebar'])):       
            $id_array = $cl_redata['categories_sidebar'];
        
            if(isset($id_array[0]))
            {
                foreach ($id_array as $cat_id)
                {   
                    
                    if($cat_id != "")
                    register_sidebar(array(
                        'name' => __('Category','codeless').': '.get_the_category_by_ID($cat_id).'',
                        'id' => 'category-'.get_the_category_by_ID($cat_id),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                        'after_widget' => '</div>', 
                        'before_title' => '<h6 class="widget-title">', 
                        'after_title' => '</h6>'        )); 
                
                
              }
           }
        endif;




        if(isset($cl_redata['extra_navigation']) && $cl_redata['extra_navigation']){
            register_sidebar(array(
                'name' => __('Extra Side Navigation', 'codeless'),
                'id' => 'sidenav',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
            ));
        }

        if(class_exists('Woocommerce')){
            register_sidebar(array(
                'name' => __('Sidebar Woocommerce', 'codeless'),
                'id' => 'woocommerce',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

        if(isset($cl_redata['header_style']) && ($cl_redata['header_style'] == 'header_6' || $cl_redata['header_style'] == 'header_7' || $cl_redata['header_style'] == 'header_12') || 1 == 1 ){
            register_sidebar(array(
                'name' => __('Header Widgetized Area', 'codeless'),
                'id' => 'header-widgetized-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

        if(isset($cl_redata['header_style']) && ($cl_redata['header_style'] == 'header_12') ){
            register_sidebar(array(
                'name' => __('After Navigation Area', 'codeless'),
                'id' => 'after-navigation-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

    }
	add_action( 'widgets_init', 'codeless_register_sidebars_init' );
		
}

?>