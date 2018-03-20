<?php global $cl_redata; ?>
<div class="open-switcher-style">
  
  <i class="icon-lightbulb-o"></i>

</div>

<div id="style-switcher">
        
        
        <div id="switcher-content">

          <p><span style="color:#fff;">Style Switcher!</span> Only a small part of options you can get with Specular. All demos has various options to try online.</p>
          <form action="#">
              <div class="overall_op">
                
                <div id="reset">Reset All</div>
                <div id="export">Export Options</div>

              </div>
              <?php $remove_array = array('site_layout', 'boxed_container_width', 'body_background', 'page_content_background') ?>
              <div class="el " id="layout" data-name="site_layout"  data-remove="<?php echo base64_encode( json_encode($remove_array) ); ?>">
                    <div class="head">Overall Layout Styling</div>
                    <div class="options">
                        <?php $opt = array(); $opt['site_layout'] = 'fullwidth';  ?>
                        <?php $active = ''; if($cl_redata['site_layout'] == 'fullwidth') $active = 'active'; ?>
                        <a href="#" class="switch_button default <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Wide</a>
                        <?php 
                          $opt = array(); 
                          $opt['site_layout'] = 'boxed';
                          $opt['boxed_container_width'] = array('width' => '1200px', 'units' => 'px');
                          $opt['body_background'] = array('background-color' => '#e7e7e7');
                          $opt['page_content_background_overall'] = '#ffffff'; 
                        ?>
                        <?php $active = ''; if($cl_redata['site_layout'] == 'boxed') $active = 'active'; ?>
                        <a href="#" class="switch_button <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Boxed</a>
                    </div>
              </div>
              <?php $remove_array = array('header_style', 'header_background', 'menu_padding', 'menu_font_style', 'background_dropdown', 'dropdown_font', 'dropdown_border_color', 'menu_margin', 'header_navigation', 'sticky', 'header_7_position', 'header_7_padding', 'header_7_margin', 'page_content_background_overall', 'show_search') ?>
              <div class="el open" id="header_style" data-name="header_style" data-remove="<?php echo base64_encode( json_encode($remove_array) ); ?>">
                    <div class="head">Header Style</div>
                    <div class="options">
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_1';
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_1') $active = 'active'; ?>
                        <a href="#" class="select_field default <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Simple style</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_2';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00');
                          $opt['menu_padding'] = array('padding-left' => '14px', 'padding-right' => '14px');
                          $opt['menu_font_style'] = array('line-height' => '17px');
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_2') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">With border top</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_3';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00');
                          $opt['menu_padding'] = array('padding-left' => '18px', 'padding-right' => '18px'); 
                          $opt['menu_font_style'] = array('line-height' => '17px');
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_3') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Modern Style</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_4';
                          $opt['header_shadow'] = 'no_shadow';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '0.00');
                          $opt['menu_padding'] = array('padding-left' => '18px', 'padding-right' => '18px'); 
                          $opt['menu_font_style'] = array('line-height' => '17px');

                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_4') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Menu Item with BG</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_5';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '0.00');
                          $opt['background_dropdown'] = '';
                          $opt['dropdown_font'] = array('color' => '#aaa', 'font-size' => '13px');
                          $opt['dropdown_border_color'] = '#000';
                          $opt['menu_padding'] = array('padding-left' => '0px', 'padding-right' => '0px'); 
                          $opt['menu_font_style'] = array('line-height' => '30px', 'font-size' => '24px', 'color' => '#fff'); 

                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_5') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Fullscreen Overlay</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_6';
                          $opt['header_background'] = array('color' => '#fff', 'alpha' => '0.85');
                          $opt['menu_padding'] = array('padding-left' => '20px', 'padding-right' => '20px'); 
                          $opt['menu_margin'] = array('margin-left' => '8px', 'margin-right' => '8px');
                          $opt['menu_font_style'] = array('line-height' => '22px', 'font-size' => '13px'); 
                          $opt['header_navigation'] = array('color' => '#f5f5f5', 'alpha' => '1');
                          $opt['sticky'] = 0;
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_6') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Below the logo navigation with bg</a>
                        <?php 
                          $opt = array(); 
                          $opt['header_style'] = 'header_7';
                          $opt['header_7_position'] = 'left';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1');
                          $opt['menu_padding'] = array('padding-left' => '0px', 'padding-right' => '0px'); 
                          $opt['header_7_padding'] = array('padding-top' => '60px');
                          $opt['header_7_margin'] = array('margin-top' => '80px');
                          $opt['menu_font_style'] = array('line-height' => '44px', 'font-size' => '14px'); 
                          $opt['sticky'] = 0;
                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_7' && $cl_redata['header_7_position'] == 'left') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Left Side Header</a>
                        <?php 
                          $opt = array(); 
                          $opt = array(); 
                          $opt['header_style'] = 'header_7';
                          $opt['header_7_position'] = 'right';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1');
                          $opt['menu_padding'] = array('padding-left' => '0px', 'padding-right' => '0px'); 
                          $opt['header_7_padding'] = array('padding-top' => '60px', 'padding-left' => '0px');
                          $opt['header_7_margin'] = array('margin-top' => '80px');
                          $opt['menu_font_style'] = array('line-height' => '44px', 'font-size' => '14px'); 
                          $opt['sticky'] = 0;

                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_7' && $cl_redata['header_7_position'] == 'right') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Right Side Header</a>
                        <?php 
                        
                          $opt = array(); 
                          $opt['header_style'] = 'header_8';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00');
                          $opt['menu_padding'] = array('padding-left' => '14px', 'padding-right' => '14px');
                          $opt['menu_font_style'] = array('line-height' => '17px');
                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_8') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Menu Item with border bottom</a>
                        <?php 
                        
                          $opt = array();  
                          $opt['header_style'] = 'header_9';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00');
                          $opt['menu_padding'] = array('padding-left' => '14px', 'padding-right' => '14px');
                          $opt['menu_font_style'] = array('line-height' => '22px');
                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_9') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Menu link underline</a>
                        <?php 
                        
                          $opt = array();  
                          $opt['header_style'] = 'header_10';
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00');
                          $opt['menu_padding'] = array('padding-left' => '14px', 'padding-right' => '14px');
                          $opt['menu_font_style'] = array('line-height' => '44px');
                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_10') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Centered Logo and Navigation</a>
                        <?php 
                          $opt['header_style'] = 'header_11'; 
                          $opt['header_background'] = array('color' => '#ffffff', 'alpha' => '1.00'); 
                          $opt['menu_padding'] = array('padding-left' => '20px', 'padding-right' => '20px');
                          $opt['menu_font_style'] = array('line-height' => '20px', 'font-size' => '14px');
                          $opt['show_search'] = 0;
                  
                        ?>
                        <?php $active = ''; if($cl_redata['header_style'] == 'header_11') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Logo in center and 2 navigations in sides</a>

                    </div>
              </div> 

              <div class="el" id="dropdown" data-name="dropdown">
                  <div class="head">Dropdown Style</div> 
                  <div class="options">
                      <?php 
                          $opt = array();
                          $opt['background_dropdown'] = $cl_redata['background_dropdown'];
                          $opt['dropdown_font']['color'] = $cl_redata['dropdown_font']['color'];
                          $opt['dropdown_border_color'] = $cl_redata['dropdown_border_color'];
                          $opt['megamenu_title']['color'] = $cl_redata['megamenu_title']['color'];
                      ?>
                      <div class="color_picker"><span>Dropdown BG color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['background_dropdown'], "#") ?>" id="background_dropdown" style="border-color:<?php echo $cl_redata['background_dropdown'] ?>;" /></div>
                      <div class="color_picker"><span>Dropdown Font Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['dropdown_font']['color'], "#") ?>" id="dropdown_font___color" style="border-color:<?php echo $cl_redata['dropdown_font']['color'] ?>;" /></div>
                      <div class="color_picker"><span>Dropdown Border Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['dropdown_border_color'], "#") ?>" id="dropdown_border_color" style="border-color:<?php echo $cl_redata['dropdown_border_color'] ?>;" /></div>
                      <div class="color_picker"><span>Dropdown Megamenu Title</span><input type="text" class="picker" value="<?php echo trim($cl_redata['megamenu_title']['color'], "#") ?>" id="megamenu_title___color" style="border-color:<?php echo $cl_redata['megamenu_title']['color'] ?>;" /></div>
                      <div class="submit" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Apply</div>
                      <div class="reset" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Reset</div>
                  </div> 
              </div>
              <div class="el open" id="styling" data-name="styling">
                  <div class="head">Styling Options</div> 
                  <div class="options">
                      <?php 
                          $opt = array();
                          $opt['primary_color'] = $cl_redata['primary_color'];
                          $opt['body_font_color'] = $cl_redata['body_font_color'];
                          $opt['headings_font_color'] = $cl_redata['headings_font_color'];
                          $opt['highlighted_background_main'] = $cl_redata['highlighted_background_main']; 
                          $opt['body_typography']['font-family'] = $cl_redata['body_typography']['font-family'];
                          $opt['headings_font_type']['font-family'] = $cl_redata['headings_font_type']['font-family']
                      ?>
                      <div class="color_picker"><span>Primary Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['primary_color'], "#") ?>" id="primary_color" style="border-color:<?php echo $cl_redata['primary_color'] ?>;" /></div>
                      <div class="color_picker"><span>Body Font Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['body_font_color'], "#") ?>" id="body_font_color" style="border-color:<?php echo $cl_redata['body_font_color'] ?>;" />></div>
                      <div class="color_picker"><span>Headings Font Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['headings_font_color'], "#") ?>" id="headings_font_color" style="border-color:<?php echo $cl_redata['headings_font_color'] ?>;" /></div>
                      <div class="color_picker"><span>Highlighted Bg Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['highlighted_background_main'], "#") ?>" id="highlighted_background_main" style="border-color:<?php echo $cl_redata['highlighted_background_main'] ?>;" /></div>
                      <div class="color_picker"><span>Body Font Family</span>
                        <select class="" data-default="<?php echo trim($cl_redata['body_typography']['font-family']) ?>" id="body_typography___font-family">
                            <option value="Open Sans">Open Sans</option>
                            <option value="Roboto">Roboto</option>
                            <option value="Oswald">Oswald</option>
                            <option value="Lato">Lato</option>
                            <option value="Source Sans Pro">Source Sans Pro</option>
                            <option value="PT Sans">PT Sans</option>
                            <option value="Roboto Condensed">Roboto Condensed</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Open Sans Condensed">Open Sans Condensed</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Ubuntu">Ubuntu</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="PT Sans Narrow">PT Sans Narrow</option>
                            <option value="Roboto Slab">Roboto Slab</option>
                            <option value="Lobster">Lobster</option>
                            <option value="Lora">Lora</option>
                            <option value="Merriweather">Merriweather</option>
                            <option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
                            <option value="Bitter">Bitter</option>
                            <option value="Arvo">Arvo</option>
                            <option value="Oxygen">Oxygen</option>
                            <option value="Indie Flower">Indie Flower</option>
                        </select>
                        
                      </div>

                      <div class="color_picker"><span>Headings Font Family</span>
                        <select class="" data-default="<?php echo trim($cl_redata['headings_font_type']['font-family']) ?>" id="headings_font_type___font-family">
                            <option value="Open Sans">Open Sans</option>
                            <option value="Roboto">Roboto</option>
                            <option value="Oswald">Oswald</option>  
                            <option value="Lato">Lato</option>
                            <option value="Source Sans Pro">Source Sans Pro</option>
                            <option value="PT Sans">PT Sans</option>
                            <option value="Roboto Condensed">Roboto Condensed</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Open Sans Condensed">Open Sans Condensed</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Ubuntu">Ubuntu</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="PT Sans Narrow">PT Sans Narrow</option>
                            <option value="Roboto Slab">Roboto Slab</option>
                            <option value="Lobster">Lobster</option>
                            <option value="Lora">Lora</option>
                            <option value="Merriweather">Merriweather</option>
                            <option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
                            <option value="Bitter">Bitter</option>
                            <option value="Arvo">Arvo</option>
                            <option value="Oxygen">Oxygen</option>
                            <option value="Indie Flower">Indie Flower</option>
                        </select>
                        
                      </div>
                      

                      <p>Here are listed the most used google fonts. You can get Hundreds of others from our Theme Options. </p>
                      <div class="submit" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Apply</div>
                      <div class="reset" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Reset</div>
                  </div> 
              </div>
              <?php $remove_array = array('overall_button_style', 'button_typography', 'button_background_color', 'button_border_color', 'button_hover_font_color', 'button_hover_font_color', 'button_hover_background', 'button_hover_border') ?>
              <div class="el" id="buttons" data-name="site_layout"  data-remove="<?php echo base64_encode( json_encode($remove_array) ); ?>">
                    <div class="head">Button Styles</div>
                    <div class="options">
                        <?php 
                          $opt = array(); 
                          $opt['overall_button_style'][0] = 'default';
                          $opt['button_typography'] = array('color' => '#222222');
                          $opt['button_background_color'] = array('color' => '#ffffff', 'alpha' => '0.00');
                          $opt['button_border_color'] = array('color' => '#444444', 'alpha' => '0.20');
                          $opt['button_hover_font_color'] = '#222222';
                          $opt['button_hover_background'] = array('color' => '#ffffff', 'alpha' => '0.00');
                          $opt['button_hover_border'] = array('color' => '#444444', 'alpha' => '1.00');
                        ?>
                        <?php $active = ''; if($cl_redata['overall_button_style'][0] == 'default') $active = 'active'; ?>
                        <a href="#" class="select_field default <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Border and Effect</a>
                        <?php 
                          $opt = array(); 
                          $opt['overall_button_style'][0] = 'business';
                          $opt['button_typography'] = array('color' => '#ffffff');
                          $opt['button_background_color'] = array('color' => $cl_redata['primary_color'], 'alpha' => '0.8');
                          $opt['button_border_color'] = array('color' => '#444444', 'alpha' => '0.00');
                          $opt['button_hover_font_color'] = '#fff';
                          $opt['button_hover_background'] = array('color' => $cl_redata['primary_color'], 'alpha' => '1.00');
                          $opt['button_hover_border'] = array('color' => '#444444', 'alpha' => '0.00');
                        ?>
                        <?php $active = ''; if($cl_redata['overall_button_style'][0] == 'business') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Business</a>
                        <?php 
                          $opt = array(); 
                          $opt['overall_button_style'][0] = 'rounded';
                          $opt['button_typography'] = array('color' => '#ffffff');
                          $opt['button_background_color'] = array('color' => $cl_redata['primary_color'], 'alpha' => '0.8');
                          $opt['button_border_color'] = array('color' => '#444444', 'alpha' => '0.00');
                          $opt['button_hover_font_color'] = '#fff';
                          $opt['button_hover_background'] = array('color' => $cl_redata['primary_color'], 'alpha' => '1.00');
                          $opt['button_hover_border'] = array('color' => '#444444', 'alpha' => '0.00');
                        ?>
                        <?php $active = ''; if($cl_redata['overall_button_style'][0] == 'rounded') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Rounded</a>
                        <?php 
                          $opt = array(); 
                          $opt['overall_button_style'][0] = 'big';
                          $opt['button_typography'] = array('color' => '#ffffff');
                          $opt['button_background_color'] = array('color' => $cl_redata['primary_color'], 'alpha' => '0.8');
                          $opt['button_border_color'] = array('color' => '#444444', 'alpha' => '0.00');
                          $opt['button_hover_font_color'] = '#fff';
                          $opt['button_hover_background'] = array('color' => $cl_redata['primary_color'], 'alpha' => '1.00');
                          $opt['button_hover_border'] = array('color' => '#444444', 'alpha' => '0.00');
                        ?>
                        <?php $active = ''; if($cl_redata['overall_button_style'][0] == 'big') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>Big with Shadow</a>
                        <?php 
                          $opt = array(); 
                          $opt['overall_button_style'][0] = 'gradient';
                          $opt['button_typography'] = array('color' => '#ffffff');
                          $opt['button_background_color'] = array('color' => $cl_redata['primary_color'], 'alpha' => '0.8');
                          $opt['button_border_color'] = array('color' => '#444444', 'alpha' => '0.00');
                          $opt['button_hover_font_color'] = '#fff';
                          $opt['button_hover_background'] = array('color' => $cl_redata['primary_color'], 'alpha' => '1.00');
                          $opt['button_hover_border'] = array('color' => '#444444', 'alpha' => '0.00');
                        ?>
                        <?php $active = ''; if($cl_redata['overall_button_style'][0] == 'gradient') $active = 'active'; ?>
                        <a href="#" class="select_field <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>With Gradient</a>
                        <p>You can change the color in Styling Options -> Primary Color</p>
                    </div>
              </div>
              <div class="el" id="bg" data-name="bg">
                  <div class="head">Background</div> 
                  <div class="options">
                      <?php 
                          $opt = array();
                          $opt['body_background']['background-color'] = $cl_redata['body_background']['background-color'];
                          $opt['page_content_background_overall'] = $cl_redata['page_content_background_overall'];
                          
                      ?>
                      <div class="color_picker"><span>Body Background</span><input type="text" class="picker" value="<?php echo trim($cl_redata['body_background']['background-color'], "#") ?>" id="body_background___background-color" style="border-color:<?php echo $cl_redata['body_background']['background-color'] ?>;" /></div>
                      <div class="color_picker"><span>Page Content BG</span><input type="text" class="picker" value="<?php echo trim($cl_redata['page_content_background_overall'], "#") ?>" id="page_content_background_overall" style="border-color:<?php echo $cl_redata['page_content_background_overall'] ?>;" /></div>
                      
                      <div class="submit" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Apply</div>
                      <div class="reset" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Reset</div>
                  </div> 
              </div> 

              <div class="el" id="footer_style" data-name="footer">
                  <div class="head">Footer Styling</div> 
                  <div class="options">
                      <?php 
                          $opt = array();
                          $opt['fppter_headings_typography']['color'] = $cl_redata['fppter_headings_typography']['color'];
                          $opt['footer_body_color'] = $cl_redata['footer_body_color'];
                          $opt['footer_links_color'] = $cl_redata['footer_links_color'];
                          $opt['footer_background_color'] = $cl_redata['footer_background_color'];
                          $opt['copyright_background_color'] = $cl_redata['copyright_background_color'];
                          
                      ?>
                      <div class="color_picker"><span>Headings Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['fppter_headings_typography']['color'], "#") ?>" id="fppter_headings_typography___color" style="border-color:<?php echo $cl_redata['fppter_headings_typography']['color'] ?>;" /></div>
                      <div class="color_picker"><span>Body Font Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['footer_body_color'], "#") ?>" id="footer_body_color" style="border-color:<?php echo $cl_redata['footer_body_color'] ?>;" /></div>
                      <div class="color_picker"><span>Links Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['footer_links_color'], "#") ?>" id="footer_links_color" style="border-color:<?php echo $cl_redata['footer_links_color'] ?>;" /></div>
                      <div class="color_picker"><span>Background Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['footer_background_color'], "#") ?>" id="footer_background_color" style="border-color:<?php echo $cl_redata['footer_background_color'] ?>;" /></div>
                      <div class="color_picker"><span>Copyright BG Color</span><input type="text" class="picker" value="<?php echo trim($cl_redata['copyright_background_color'], "#") ?>" id="copyright_background_color" style="border-color:<?php echo $cl_redata['copyright_background_color'] ?>;" /></div>
                      
                      <div class="submit" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Apply</div>
                      <div class="reset" data-value="<?php echo base64_encode( json_encode($opt) ); ?>">Reset</div>
                  </div> 
              </div> 
              <?php $remove_array = array('top_navigation') ?>
              <div class="el" id="top_navigation" data-name="top_navigation"  data-remove="<?php echo base64_encode( json_encode($remove_array) ); ?>">
                    <div class="head">Top Widgetized Area</div>
                    <div class="options">
                        <?php $opt = array(); $opt['top_navigation'] = 1;  ?>
                        <?php $active = ''; if($cl_redata['top_navigation'] == 1) $active = 'active'; ?>
                        <a href="#" class="switch_button default <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>ON</a>
                        <?php $opt = array(); $opt['top_navigation'] = 0;  ?>
                        <?php $active = ''; if($cl_redata['top_navigation'] == 0) $active = 'active'; ?>
                        <a href="#" class="switch_button <?php echo $active ?>" data-value='<?php echo base64_encode( json_encode($opt) ); ?>'>OFF</a>
                    </div>
              </div>


          
            </form>
        </div>
    </div>