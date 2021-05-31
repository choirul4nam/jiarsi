<?php
/*
Plugin Name: Lymcoin Addons
Plugin URI: http://themerex.net
Description: Add theme-specific widgets, shortcodes and custom post types. Use this plugin only with theme "Lymcoin"
Version: 1.0.0
Author: ThemeREX
Author URI: http://themerex.net
*/

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

// Plugin's storage
if (!defined('LYMCOIN_ADDONS_PLUGIN_DIR'))				define('LYMCOIN_ADDONS_PLUGIN_DIR', plugin_dir_path(__FILE__));
if (!defined('LYMCOIN_ADDONS_PLUGIN_URL'))				define('LYMCOIN_ADDONS_PLUGIN_URL', plugin_dir_url(__FILE__));
if (!defined('LYMCOIN_ADDONS_PLUGIN_BASE'))				define('LYMCOIN_ADDONS_PLUGIN_BASE',dirname(plugin_basename(__FILE__)));

if (!defined('LYMCOIN_ADDONS_PLUGIN_SHORTCODES'))		    define('LYMCOIN_ADDONS_PLUGIN_SHORTCODES', 'shortcodes/');
if (!defined('LYMCOIN_ADDONS_PLUGIN_DIR_SHORTCODES'))	    define('LYMCOIN_ADDONS_PLUGIN_DIR_SHORTCODES', LYMCOIN_ADDONS_PLUGIN_DIR.LYMCOIN_ADDONS_PLUGIN_SHORTCODES);


//-------------------------------------------------------
//-- Plugin init
//-------------------------------------------------------

// Check if current theme is "Lymcoin" and plugin "ThemeREX Addons" is active
if (!function_exists('lymcoin_addons_is_allowed')) {
	function lymcoin_addons_is_allowed() {
//        return str_replace('-', '_', sanitize_title(wp_get_theme()->get('Name'))) ==  'lymcoin''lymcoin_child'
//				&& defined('TRX_ADDONS_VERSION');
        return in_array( str_replace('-', '_', sanitize_title(wp_get_theme()->get('Name'))),array('lymcoin','lymcoin_child'))
				&& defined('TRX_ADDONS_VERSION');
	}
}

// Plugin activate hook
if (!function_exists('lymcoin_addons_activate')) {
	register_activation_hook(__FILE__, 'lymcoin_addons_activate');
	function lymcoin_addons_activate() {
		update_option('lymcoin_addons_just_activated', 'yes');
	}
}

// Check if this is first run - flush rewrite rules
if ( !function_exists('lymcoin_addons_init') ) {
	add_action( 'init', 'lymcoin_addons_init', 11 );
	function lymcoin_addons_init() {
		if (lymcoin_addons_is_allowed() && get_option('lymcoin_addons_just_activated')=='yes') {
			update_option('lymcoin_addons_just_activated', 'no');
			flush_rewrite_rules();			
		}
	}
}

// Load plugin's translation file
// Attention! It must be loaded before the first call of any translation function
if ( !function_exists( 'lymcoin_addons_load_plugin_textdomain' ) ) {
	add_action( 'plugins_loaded', 'lymcoin_addons_load_plugin_textdomain');
	function lymcoin_addons_load_plugin_textdomain() {
		static $loaded = false;
		if ( $loaded ) return true;
		$domain = 'lymcoin-addons';
		if ( is_textdomain_loaded( $domain ) && !is_a( $GLOBALS['l10n'][ $domain ], 'NOOP_Translations' ) ) return true;
		$loaded = true;
		load_plugin_textdomain( $domain, false, LYMCOIN_ADDONS_PLUGIN_BASE . '/languages' );
	}
}

// Include files with CPT, Shortcodes and Widgets
if (!function_exists('lymcoin_addons_load')) {
	add_action( 'after_setup_theme', 'lymcoin_addons_load', 2 );
	add_action( 'trx_addons_action_save_options', 'lymcoin_addons_load', 2 );
	function lymcoin_addons_load() {
        if (lymcoin_addons_is_allowed()) {
			static $loaded = false;
			if ($loaded) return;
			$loaded = true;
			// Load theme-specific Shortcodes
			if (($fdir = LYMCOIN_ADDONS_PLUGIN_DIR_SHORTCODES . "roadmap/roadmap.php") && file_exists($fdir)) include_once $fdir;
        }
	}
}
	
// Load required styles and scripts in the admin mode
if ( !function_exists( 'lymcoin_addons_load_scripts_admin' ) ) {
	add_action("admin_enqueue_scripts", 'lymcoin_addons_load_scripts_admin');
	function lymcoin_addons_load_scripts_admin() {
		if (lymcoin_addons_is_allowed()) {
			wp_enqueue_style( 'lymcoin_addons-admin', lymcoin_addons_get_file_url('lymcoin-addons.admin.css'), array(), null );
		}
	}
}



//-------------------------------------------------------
//-- Plugin's utilities
//-------------------------------------------------------

/* Check if file/folder present in the child theme and return path (url) to it. 
   Else - path (url) to file in the main theme dir
------------------------------------------------------------------------------------- */
if (!function_exists('lymcoin_addons_get_file_dir')) {
	function lymcoin_addons_get_file_dir($file, $return_url=false) {
		if ($file[0]=='/') $file = substr($file, 1);
		$theme_dir = get_template_directory().'/'.LYMCOIN_ADDONS_PLUGIN_BASE.'/';
		$theme_url = get_template_directory_uri().'/'.LYMCOIN_ADDONS_PLUGIN_BASE.'/';
		$child_dir = get_stylesheet_directory().'/'.LYMCOIN_ADDONS_PLUGIN_BASE.'/';
		$child_url = get_stylesheet_directory_uri().'/'.LYMCOIN_ADDONS_PLUGIN_BASE.'/';
		$dir = '';
		if (file_exists(($child_dir).($file)))
			$dir = ($return_url ? $child_url : $child_dir) . ($file);
		else if (file_exists(($theme_dir).($file)))
			$dir = ($return_url ? $theme_url : $theme_dir) . ($file);
		else if (file_exists(LYMCOIN_ADDONS_PLUGIN_DIR . ($file)))
			$dir = ($return_url ? LYMCOIN_ADDONS_PLUGIN_URL : LYMCOIN_ADDONS_PLUGIN_DIR) . ($file);
		return apply_filters( $return_url ? 'lymcoin_addons_get_file_url' : 'lymcoin_addons_get_file_dir', $dir, $file );
	}
}

if (!function_exists('lymcoin_addons_get_file_url')) {
	function lymcoin_addons_get_file_url($file) {
		return lymcoin_addons_get_file_dir($file, true);
	}
}

// Include part of template with specified parameters
if (!function_exists('lymcoin_addons_get_template_part')) {
	function lymcoin_addons_get_template_part($file, $args_name='', $args=array()) {
		static $fdirs = array();
		if (!is_array($file))
			$file = array($file);
		foreach ($file as $f) {
			if (!empty($fdirs[$f]) || ($fdirs[$f] = lymcoin_addons_get_file_dir($f)) != '') {
				if (!empty($args_name) && !empty($args))
					set_query_var($args_name, $args);
				include $fdirs[$f];
				break;
			}
		}
	}
}
?>