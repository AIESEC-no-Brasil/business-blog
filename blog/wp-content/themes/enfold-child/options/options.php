<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {
    //if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
        wp_enqueue_media();
    //}
}

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 're_options', 're_opt', 'theme_options_validate' );
	register_setting( 're_gettext_options', 're_opt_gettext' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'mktheme' ), __( 'Theme Options', 'mktheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Да', 'pptheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'Нет', 'pptheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'pptheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'pptheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;




	?>

	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'pptheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'pptheme' ); ?></strong></p></div>
		<?php endif; ?>



		<form method="post" action="options.php">
			<?php settings_fields( 're_options' ); ?>
			<?php $options = get_option( 're_opt' ); ?>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'pptheme' ); ?>" />
			</p>

			<div class="tabs">
				<div class="tab-menu">
					<ul><?php 

							if (function_exists('icl_get_languages')) {
						        //get list of used languages from WPML
						        $langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
						        //Set current language for language based variables in theme.

						        //print_r( $langs );

						        if( !empty($langs) ){
									$langarr = $langs;
						        }else{
						        	$langarr = array('en');	
						        }
						        
						        
						    }

							
							$i = 1;
							foreach($langarr as $lang => $lng){
								echo '<li><a href="#tab'. $i . '">' . $lang . '</a></li>';
								$i++;
							}
						?></ul><div class="clear"></div>
				</div><!-- .tab-menu (end) -->
				<div class="tab-wrapper"><?php 
					$i = 1;
					foreach($langarr as $lang => $lng){ 
						echo '<div class="tab" id="tab' . $i . '" style="display: block;"> ';
							?>


<h2>Social footer</h2>	
	<div class="row clearfix">
		<label>Select page where footer is set up</label>
		<?php
			$option_name = 'socialfooter' . '_'; 
			$value = esc_attr( $options[ $option_name . $lang ] );
			if(empty($value)) $value = '1'; // default
		?>
		<select name="re_opt[<?php echo $option_name . $lang ?>]"> 
			<option value="">
		   	<?php echo esc_attr( __( '-- Select page --' ) ); ?></option> 
			<?php 
				
				 $pages = get_pages(); 
				 foreach ( $pages as $page ) {
					$sel = '';
					if($value == $page->ID)  $sel = 'selected';
					   $option = '<option value="' . $page->ID . '" '. $sel .'>';
					   $option .= $page->post_title;
					   $option .= '</option>';
					   echo $option;
				 }
				
			?>
		</select>
	</div>



<h2></h2>
	<div class="row clearfix">
		<label></label>
		<?php
			$option_name = 'order_email' . '_'; 
			$value = esc_attr( $options[ $option_name . $lang ] );
			if(empty($value)) $value = ''; // default
		?>
		<?php //<input id="re_opt[<?php echo $option_name . $lang ? >]" name="re_opt[< ?php echo $option_name . $lang ? >]" value="< ?php echo $value; ? >" class="regular-text" type="text"  />	?>
	</div>	



							
						<?php echo '</div>';
						$i++;
					}
					?></div><!-- .tab-wrapper (end) -->
			</div>	

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'pptheme' ); ?>" />
			</p>


		</form>
		
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/