<?php
/**
 * Register the required plugins for this theme
 *
 * @package Smart Blog
 * @since 1.0
 */

require_once ( get_template_directory() . '/framework/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'themepixels_required_plugins' );
if ( ! function_exists( 'themepixels_required_plugins' ) ) {
    function themepixels_required_plugins() {

        $plugins = array(

            array(
                'name'                  => 'Themepixels Shortcodes',
                'slug'                  => 'themepixels-shortcodes',
                'source'                => get_template_directory() . '/framework/plugins/themepixels-shortcodes.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),

            array(
                'name'                  => 'Envato Wordpress Toolkit',
                'slug'                  => 'envato-wordpress-toolkit-master',
                'source'                => get_template_directory() . '/framework/plugins/envato-wordpress-toolkit-master.zip',
                'required'              => false,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),

            array(
                'name'                  => 'Regenerate Thumbnails',
                'slug'                  => 'regenerate-thumbnails',
                'required'              => false,
                'force_deactivation'    => false,
            ),

            array(
                'name'                  => 'Contact Form 7',
                'slug'                  => 'contact-form-7',
                'required'              => false,
                'force_deactivation'    => false,
            ),

            array(
                'name'                  => 'Woo Sidebars',
                'slug'                  => 'woosidebars',
                'required'              => false,
                'force_deactivation'    => false,
            ),

            array(
                'name'                  => 'Recent Tweets',
                'slug'                  => 'recent-tweets-widget',
                'required'              => false,
                'force_deactivation'    => false,
            ),

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );

    }
}