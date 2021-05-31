<?php
/* M Chart support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_m_chart_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_m_chart_theme_setup9', 9 );
	function lymcoin_m_chart_theme_setup9() {
		if (lymcoin_exists_m_chart()) {
			add_filter( 'lymcoin_filter_merge_styles',					'lymcoin_m_chart_merge_styles');
		}
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins',		'lymcoin_m_chart_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_m_chart_tgmpa_required_plugins' ) ) {
	
	function lymcoin_m_chart_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'm-chart')) {
			$list[] = array(
				'name' 		=> lymcoin_storage_get_array('required_plugins', 'm-chart'),
				'slug' 		=> 'm-chart',
                'version'	=> '1.7.6',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lymcoin_exists_m_chart' ) ) {
	function lymcoin_exists_m_chart() {
		return function_exists('__m_chart_load_plugin') || defined('MCHART_VERSION');
	}
}