<?php
/* M Chart Highcharts Library support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_m_chart_highcharts_library_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_m_chart_highcharts_library_theme_setup9', 9 );
	function lymcoin_m_chart_highcharts_library_theme_setup9() {
		if (lymcoin_exists_m_chart_highcharts_library()) {
			add_filter( 'lymcoin_filter_merge_styles',					'lymcoin_m_chart_highcharts_library_merge_styles');
		}
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins',		'lymcoin_m_chart_highcharts_library_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_m_chart_highcharts_library_tgmpa_required_plugins' ) ) {
	
	function lymcoin_m_chart_highcharts_library_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'm-chart-highcharts-library')) {
			$path = lymcoin_get_file_dir('plugins/m-chart-highcharts-library/m-chart-highcharts-library.zip');

			$list[] = array(
				'name' 		=> lymcoin_storage_get_array('required_plugins', 'm-chart-highcharts-library'),
				'slug' 		=> 'm-chart-highcharts-library',
                'version'	=> '1.1',
				'source'	=> !empty($path) ? $path : 'upload://m-chart-highcharts-library.zip',
				'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'lymcoin_exists_m_chart_highcharts_library' ) ) {
	function lymcoin_exists_m_chart_highcharts_library() {
		return function_exists('__m_chart_highcharts_library_load_plugin') || defined('MCHARTHL_VERSION');
	}
}
