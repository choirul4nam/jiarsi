<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_revslider_theme_setup9', 9 );
	function lymcoin_revslider_theme_setup9() {

		add_filter( 'lymcoin_filter_merge_styles',				'lymcoin_revslider_merge_styles' );
		
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins','lymcoin_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_revslider_tgmpa_required_plugins' ) ) {
	
	function lymcoin_revslider_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'revslider')) {
			$path = lymcoin_get_file_dir('plugins/revslider/revslider.zip');
			if (!empty($path) || lymcoin_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> lymcoin_storage_get_array('required_plugins', 'revslider'),
					'slug' 		=> 'revslider',
                    'version'	=> '6.2.22',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'lymcoin_exists_revslider' ) ) {
	function lymcoin_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}
	
// Merge custom styles
if ( !function_exists( 'lymcoin_revslider_merge_styles' ) ) {
	
	function lymcoin_revslider_merge_styles($list) {
		if (lymcoin_exists_revslider()) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}
?>