<?php

function codeless_create_online_demo(){
	global $cl_redata;
    if(!session_id())
        session_start();
    $pages = array(1059,1250, 1271, 1309, 1367, 1490);

	$page_id = get_the_ID(); 

    if(!isset($_SESSION['tower_loaded_style_default']))
        $_SESSION['tower_loaded_style_default'] = 0;


    if($_SESSION['tower_loaded_style_default'] != 0 && !in_array($page_id, $pages) )
        $page_id = $_SESSION['tower_loaded_style_default'] ;

    if($page_id == 1059){
        $_SESSION['tower_loaded_style_default'] = 1059;
        $cl_redata['header_background'] = array('color' => '#ffffff', 'alpha' => '0.16');
    }

	if($page_id == 1250){
        $_SESSION['tower_loaded_style_default'] = 1250;
        $cl_redata['header_shadow'] = 'no_shadow';
    }

    if($page_id == 1271){
        $_SESSION['tower_loaded_style_default'] =  1271;
        $cl_redata['header_transparency'] = 0;

    }
    
    if($page_id == 1309){
        $_SESSION['tower_loaded_style_default'] = 1309;
        $cl_redata['header_style'] = 'header_11';
        $locations = get_theme_mod('nav_menu_locations');
        $locations['left'] = 24;
        $locations['right'] = 25;
        set_theme_mod('nav_menu_locations', $locations);
        $cl_redata['header_container_full'] = '1';

    }



    if($page_id == 1367){
        $_SESSION['tower_loaded_style_default'] = 1367;
        $cl_redata['sticky'] = 0;
        $cl_redata['header_container_full'] = '1';
    }

    if($page_id == 1490){
        $_SESSION['tower_loaded_style_default'] = 1490;
        $cl_redata['header_style'] = 'header_7';
        $cl_redata['header_7_position'] = 'left'; 
        $cl_redata['header_background']['color'] = '#ffffff';
        $cl_redata['header_background']['alpha'] = '1';
        $cl_redata['menu_padding']['padding-left'] = '0px';
        $cl_redata['menu_padding']['padding-right'] = '0px';
        $cl_redata['menu_margin']['margin-left'] = '0px';
        $cl_redata['menu_margin']['margin-right'] = '0px';
        $cl_redata['header_7_padding']['padding-top'] = '60px';
        $cl_redata['header_7_padding']['padding-left'] = '60px';
        $cl_redata['header_7_padding']['padding-right'] = '60px';
        $cl_redata['header_7_border'] = 1;
        $cl_redata['header_7_margin']['margin-top'] = '60px';
        $cl_redata['menu_font_style']['line-height'] = '45px';
        $cl_redata['menu_font_style']['text-align'] = 'left';
        $cl_redata['menu_font_style']['font-size'] = '12px';
        $cl_redata['menu_font_style']['font-weight'] = '700';
        $cl_redata['sticky'] = 0;
    }
}

add_action('get_header', 'codeless_create_online_demo',10);


function codeless_styleswitch_opt_online_demo($options){
    $page_id = get_the_ID();
    
    $pages = array(1059 ,1250, 1271, 1309, 1367, 1490);
    if($_SESSION['tower_loaded_style_default'] != 0 && !in_array($page_id, $pages))
        $page_id = $_SESSION['tower_loaded_style_default'];


    if($page_id == 1059){
        $options['header_background'] = array('color' => '#ffffff', 'alpha' => '0.16');
    }

    /* Home Agency 2 */
    if($page_id == 1250){
        
        $options['header_background'] = 'transparent';
        $options['header_border_bottom']['border-bottom'] = '1px';
        $options['header_border_bottom']['border-style'] = 'solid';
        $options['header_border_bottom']['border-color'] = 'rgba(255,255,255,0.2)'; 
       
    }

    if($page_id == 1271){
        $options['header_background']['color'] = '#ffffff';
        $options['header_transparency'] = 0;
    }
    
    if($page_id == 1309){

        $options['header_style'] = 'header_11'; 
        
        $options['menu_padding']['padding-left'] = '10px';
        $options['menu_padding']['padding-right'] = '10px';
        $options['menu_margin']['margin-left'] = '5px';
        $options['menu_margin']['margin-right'] = '5px';
        $options['header_container_full'] = '1';
        $options['header_background'] = 'transparent';
        $options['header_border_bottom']['border-bottom'] = '1px';
        $options['header_border_bottom']['border-style'] = 'solid';
        $options['header_border_bottom']['border-color'] = 'rgba(255,255,255,0.2)'; 



        $options['menu_font_style']['font-family'] = 'Montserrat';
        $options['headings_font_type']['font-family'] = 'Montserrat';
        $options['body_typography']['font-family'] = 'Raleway';
       
    }

   

    if($page_id == 1367){
        $options['sticky'] = 0;
        $options['header_container_full'] = '1';
    }

    if($page_id == 1490){
        $options['header_style'] = 'header_7';
        $options['header_7_position'] = 'left'; 
        $options['header_background']['color'] = '#ffffff';
        $options['header_background']['alpha'] = '1';
        $options['menu_padding']['padding-left'] = '0px';
        $options['menu_padding']['padding-right'] = '0px';
        $options['menu_margin']['margin-left'] = '0px';
        $options['menu_margin']['margin-right'] = '0px';
        $options['header_7_padding']['padding-top'] = '60px';
        $options['header_7_padding']['padding-left'] = '80px';
        $options['header_7_margin']['margin-top'] = '80px';
        $options['menu_font_style']['line-height'] = '40px';
        $options['menu_font_style']['text-align'] = 'left';
        $options['menu_font_style']['font-size'] = '12px';
        $options['menu_font_style']['font-weight'] = '700';
        $options['sticky'] = 0;
        $options['logo_height']['height'] = '40px';
        $options['footer_social_icons_bg'] = '#1bc09f';
        $options['footer_social_icons_icon'] = '#ffffff';
    }

    return $options;
}


function codeless_styleswitch_opt($options){
    $page_id = get_the_ID();
    if(!session_id())
        session_start();
    $pages = array(1059 ,1250, 1271, 1309, 1367, 1490);
    
    if(!isset($_SESSION['cl_template_builder_default']))
        $_SESSION['cl_template_builder_default'] = 0;

            if(!empty($_COOKIE) && is_array($_COOKIE) && ( (cl_is_ready() && $_SESSION['cl_template_builder_default'] == 0) || !cl_is_ready() )){
                $_SESSION['cl_template_builder_default'] = 0;
                foreach($_COOKIE as $opt_key => $value){
                    $opt_key = explode('-__-', $opt_key);
                    if($opt_key[1] == 'default' && $opt_key[0] == 'tower'){
                        $opt_key = $opt_key[2];
                        if(isset($options[$opt_key])){
                            $value = json_decode( base64_decode($value), true );
                            if(is_array($value)){
                                foreach($value as $k => $v){

                                    if(isset($options[$opt_key][$k]))
                                        $options[$opt_key][$k] = $v;
                                    
                                } 
                               
                            }else{
                                $options[$opt_key] = $value;
                                
                            }
                            if($_SESSION['cl_template_builder_default'] == 0) 
                                $_SESSION['cl_template_builder_default'] = $page_id;
                        }
                    }
                    
                }
                

            }

    return $options;
}


function codeless_styleswitch_redata(){
    
    
    global $cl_redata;
    if(!empty($_COOKIE) && is_array($_COOKIE) && ( (cl_is_ready() && $_SESSION['cl_template_builder_default'] == 0) || !cl_is_ready() ))
                
                foreach($_COOKIE as $opt_key => $value){
                    $opt_key = explode('-__-', $opt_key);
                    if($opt_key[1] == 'default' && $opt_key[0] == 'tower'){
                        $opt_key = $opt_key[2];
                        if(isset($cl_redata[$opt_key])){
                            $value = json_decode( base64_decode($value), true );
                            if(is_array($value)){
                                foreach($value as $k => $v){
                                    if(isset($cl_redata[$opt_key][$k]))
                                        $cl_redata[$opt_key][$k] = $v; 
                                    
                                } 
                            }else{
                                $cl_redata[$opt_key] = $value;
                            }

                        }
                    }
                }
    
}

add_action('get_header', 'codeless_styleswitch_redata',11);


function cl_is_ready(){
    $page_id = get_the_ID();
    if(!session_id())
        session_start();
    $pages = array(1059 ,1250, 1271, 1309, 1367, 1490);
    if($page_id != $_SESSION['cl_template_builder_default'] && in_array($page_id, $pages))
        return true;

    return false;
}

function cl_delete_cookies(){
    if(!session_id())
        session_start();
    if(cl_is_ready() && $_SESSION['cl_template_builder_default'] != 0)
        if (isset($_SERVER['HTTP_COOKIE'])) 
        { 
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']); 
            foreach ($cookies as $cookie) 
            {  
                $parts = explode('=', $cookie); 
                $name = trim($parts[0]); 
                
                if(strpos($name, 'tower') !== false){
                    setcookie($name, '', time() - 3600); 
                    setcookie($name, '', time() - 3600, '/'); 
                }
                $_SESSION['cl_template_builder_default'] = 0;
                
            } 
        }
}

add_action('get_header', 'cl_delete_cookies', 12);

?>