<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_gdpr_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_gdpr_theme_setup9', 9 );
	function lymcoin_gdpr_theme_setup9() {
		if (lymcoin_exists_gdpr()) {
			add_filter( 'lymcoin_filter_merge_styles',					'lymcoin_gdpr_merge_styles');
		}
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins',		'lymcoin_gdpr_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_gdpr_tgmpa_required_plugins' ) ) {
	
	function lymcoin_gdpr_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'gdpr-framework')) {
			$list[] = array(
				'name' 		=> lymcoin_storage_get_array('required_plugins', 'gdpr-framework'),
				'slug' 		=> 'gdpr-framework',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lymcoin_exists_gdpr' ) ) {
	function lymcoin_exists_gdpr() {
		return function_exists('__gdpr_load_plugin') || defined('GDPR_VERSION');
	}
}


