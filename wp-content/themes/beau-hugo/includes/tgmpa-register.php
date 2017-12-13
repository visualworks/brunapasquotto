<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once(get_template_directory().'/libs/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'hugo_theme_register_required_plugins' );
function hugo_theme_register_required_plugins() {
    $plugins = array(
        array (
            'name' => 'Master Slider WP',
            'slug' => 'masterslider',
            'source' => PLUGINS_PATH.'/general/masterslider-installable.zip',
            'required' =>true,
            'version' => '2.25.3',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'http://codecanyon.net/item/masterslider-pro/7467925?ref=Beautheme'
        ),
        array (
            'name' => 'WPBakery Visual Composer',
            'slug' => 'js_composer',
            'source' => PLUGINS_PATH.'/general/js_composer.zip',
            'required' =>true,
            'version' => '4.12',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Beautheme'
        ),
        array (
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'source' => 'https://downloads.wordpress.org/plugin/woocommerce.2.6.1.zip',
            'required' =>true,
            'version' => '2.6.1',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'https://wordpress.org/plugins/woocommerce/'
        ),
        array (
            'name' => 'Hugo postype and function',
            'slug' => 'plg-hugo-postype',
            'source' => PLUGINS_PATH.'/hugo/plg-hugo-postype.zip',
            'required' =>true,
            'version' => '1.0.5',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => ''
        ),

    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => 'hugo-active-plugins',
        'menu'         => 'beautheme-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}
