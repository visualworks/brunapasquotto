<?php
/*
Plugin Name: Hugo postype and function
Plugin URI: http://beautheme.com
Description: This plugin create all postype and function of Hugo theme.
Version: 1.0.5
Author: BeauTheme
Author URI: http://beautheme.com
Copyright: BeauTheme
*/
if ( ! defined( 'ABSPATH' ) ) die( '-1' );
define( 'ACF_LITE', true );
if(!defined('BEAU_PLUGIN_URL')){
	define('BEAU_PLUGIN_URL',untrailingslashit( plugins_url( '/', __FILE__ ) ));
}
if(!defined('BEAU_PLUGIN_DIR')){
	define('BEAU_PLUGIN_DIR',untrailingslashit( plugin_dir_path( __FILE__ ) ));
}
define('BEAU_PLUGIN_VER','1.0.4');
define('BEAU_INCLUDE', BEAU_PLUGIN_DIR.'/includes/');
define('BEAU_ASSET', BEAU_PLUGIN_DIR.'/asset/');
define('BEAU_ASSET_URL', BEAU_PLUGIN_URL.'/asset/');
define('BEAU_ASSET_IMG', BEAU_PLUGIN_URL.'/asset/images/');
function hugo_theme_plugin_init() {
	$plugin_dir = basename(dirname(__FILE__));
	load_plugin_textdomain( 'beautheme', false, $plugin_dir.'/languages' );
}
add_action('plugins_loaded', 'hugo_theme_plugin_init');
/**
 * Check system before import demo
 */
function checkSystem(){
    $check_items = array(
        'max_execution_time' => '3600' ,
        'max_input_time' => '3600',
        'memory_limit' => '256M',
        'post_max_size' => '64M',
        'upload_max_filesize' => '64M',
        'max_input_vars' => '3000',
    );
    $error = array();
    foreach($check_items as $k => $v) {
        $current_value = ini_get($k);
        $tmp_current = (int) trim($current_value ,'M');
        $tmp_value = (int)trim($v , 'M');
        if($tmp_current == 0 || $tmp_current >= $tmp_value) {
            continue;
        } else {
            $error[] = '"'.$k.'" should be set to '.$v .' (the current value is '.$current_value.')';
        }
    }
    return $error;
}
if (!class_exists('hugo_ThemePlugin')) {
	class hugo_ThemePlugin {
		public function __construct(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/widgets/','php');
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/postypes/','php');
            add_action('admin_head', array( $this, 'hugo_print_styles' ));
            add_action('admin_head', array( $this, 'hugo_print_scripts' ));
            add_action('after_setup_theme', array( $this, 'beau_getShortcode' ));
            add_action('after_setup_theme', array( $this, 'beau_getFunction' ));
            add_action('after_setup_theme', array( $this, 'beau_Visualcomposer' ));
            add_action('wp_loaded', array( $this, 'beau_getApi' ));
            add_action('wp_loaded', array( $this, 'beau_getAjaxs' ));
		}
        public function beau_Visualcomposer(){
            if (class_exists('WPBakeryShortCode')) {
                $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/visualcomposer/','php');
            }
        }
        public function beau_getFunction(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/functions/','php');
        }
        public function beau_getApi(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/apis/','php');
        }
         public function beau_getAjaxs(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/ajaxs/','php');
        }
        public function beau_getShortcode(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/shortcode/','php');
        }
        public function beau_getWidgets(){
            $this -> hugo_getMultipleFile(BEAU_INCLUDE.'/widgets/','php');
        }
		public function hugo_print_styles(){
			$this -> hugo_getMultipleFile(BEAU_ASSET,'css');
		}
		public function hugo_print_scripts(){
			$this -> hugo_getMultipleFile(BEAU_ASSET,'js');
		}
		public function hugo_getMultipleFile($path, $ext){
			if ($ext == 'css' || $ext == 'js') {
				$files = scandir($path.$ext.'/');
			}else{
				$files = scandir($path.'/');
			}
			$i = rand(10000,99999);
			foreach ($files as $key => $file) {
				if (preg_match("/\.(".$ext.")$/", $file)) {
					$file_id = $ext.'beau-theme'.$i;
					if ($ext == 'css') {
					 	wp_enqueue_style($file_id, BEAU_ASSET_URL.$ext.'/'.$file, array(), BEAU_PLUGIN_VER);
					}
					if ($ext == 'js') {
					 	wp_enqueue_script($file_id, BEAU_ASSET_URL.$ext.'/'.$file, array(), BEAU_PLUGIN_VER);
					}
					if ($ext == 'php') {
					 	require_once($path.$file);
					}
					$i++;
				}
			}
		}
	}
	new hugo_ThemePlugin;
}