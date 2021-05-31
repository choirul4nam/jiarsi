<?php
/* WPBakery Page Builder support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_vc_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_vc_theme_setup9', 9 );
	function lymcoin_vc_theme_setup9() {
		
		add_filter( 'lymcoin_filter_merge_styles',		'lymcoin_vc_merge_styles' );

		if (lymcoin_exists_visual_composer()) {
	
			// Add/Remove params in the standard VC shortcodes
			//-----------------------------------------------------
			add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,	'lymcoin_vc_add_params_classes', 10, 3 );
			add_filter( 'vc_iconpicker-type-fontawesome',	'lymcoin_vc_iconpicker_type_fontawesome' );
			
			// Color scheme
			$scheme = array(
				"param_name" => "scheme",
				"heading" => esc_html__("Color scheme", 'lymcoin'),
				"description" => wp_kses_data( __("Select color scheme to decorate this block", 'lymcoin') ),
				"group" => esc_html__('Colors', 'lymcoin'),
				"admin_label" => true,
				"value" => array_flip(lymcoin_get_list_schemes(true)),
				"type" => "dropdown"
			);
			$sc_list = apply_filters('lymcoin_filter_add_scheme_in_vc', array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text'));
			foreach ($sc_list as $sc)
				vc_add_param($sc, $scheme);

            // Special class name
            $param = array(
				"param_name" => "special_classes_vc_row",
				"heading" => esc_html__("Special class name", 'lymcoin'),
				"description" => wp_kses_data( __("Select special class name", 'lymcoin') ),
                'edit_field_class' => 'vc_col-sm-4',
                "admin_label" => true,
                "std" => "",
                "value" => array(
                    esc_html__("None", 'lymcoin')                                   => "",
                    esc_html__("Special class for Round background", 'lymcoin')    => "vc_row_round_bottom_bg",
                    esc_html__("Special class for Background 1", 'lymcoin')        => "sc_background_1",
                    esc_html__("Special class for Background 2", 'lymcoin')        => "sc_background_2",
                    esc_html__("Special class for Background 3", 'lymcoin')        => "sc_background_3",
                    esc_html__("Special class for Last element", 'lymcoin')        => "cs-last-vc_row",
                    esc_html__("Special class for Last element 2", 'lymcoin')      => "cs-last-vc_row-15"
                ),
                "type" => "dropdown"
			);
            vc_add_param("vc_row", $param);

            $param = array(
				"param_name" => "special_classes_vc_column_text",
				"heading" => esc_html__("Special class name", 'lymcoin'),
				"description" => wp_kses_data( __("Select special class name", 'lymcoin') ),
                'edit_field_class' => 'vc_col-sm-4',
                "admin_label" => true,
                "std" => "",
                "value" => array(
                    esc_html__("None", 'lymcoin') => "",
                    esc_html__("Current Price", 'lymcoin') => "sc_current_price"
                ),
                "type" => "dropdown"
			);
            vc_add_param("vc_column_text", $param);

            $param = array(
				"param_name" => "sc_vc_column_inner",
				"heading" => esc_html__("Special class name", 'lymcoin'),
				"description" => wp_kses_data( __("Select special class name", 'lymcoin') ),
                'edit_field_class' => 'vc_col-sm-4',
                "admin_label" => true,
                "std" => "",
                "value" => array(
                    esc_html__("None", 'lymcoin') => "",
                    esc_html__("For Responsive", 'lymcoin') => "sc_from_responsive"
                ),
                "type" => "dropdown"
			);
            vc_add_param("vc_column_inner", $param);
		}
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins', 'lymcoin_vc_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_vc_tgmpa_required_plugins' ) ) {
	
	function lymcoin_vc_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'js_composer')) {
			$path = lymcoin_get_file_dir('plugins/js_composer/js_composer.zip');
			if (!empty($path) || lymcoin_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> lymcoin_storage_get_array('required_plugins', 'js_composer'),
					'slug' 		=> 'js_composer',
                    'version'	=> '6.4.0',
					'source'	=> !empty($path) ? $path : 'upload://js_composer.zip',
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}

// Check if WPBakery Page Builder installed and activated
if ( !function_exists( 'lymcoin_exists_visual_composer' ) ) {
	function lymcoin_exists_visual_composer() {
		return class_exists('Vc_Manager');
	}
}

// Check if WPBakery Page Builder in frontend editor mode
if ( !function_exists( 'lymcoin_vc_is_frontend' ) ) {
	function lymcoin_vc_is_frontend() {
		return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
			|| (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');

	}
}
	
// Merge custom styles
if ( !function_exists( 'lymcoin_vc_merge_styles' ) ) {
	
	function lymcoin_vc_merge_styles($list) {
		if (lymcoin_exists_visual_composer()) {
			$list[] = 'plugins/js_composer/_js_composer.scss';
		}
		return $list;
	}
}

// Merge responsive styles
if ( !function_exists( 'lymcoin_vc_merge_styles_responsive' ) ) {
	
	function lymcoin_vc_merge_styles_responsive($list) {
		if (lymcoin_exists_visual_composer()) {
			$list[] = 'plugins/js_composer/_js_composer-responsive.scss';
		}
		return $list;
	}
}



// Shortcodes support
//------------------------------------------------------------------------

// Add params to the standard VC shortcodes
if ( !function_exists( 'lymcoin_vc_add_params_classes' ) ) {
	
	function lymcoin_vc_add_params_classes($classes, $sc, $atts) {
		// Add color scheme
		if (in_array($sc, apply_filters('lymcoin_filter_add_scheme_in_vc', array('vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text')))) {
			if (!empty($atts['scheme']) && !lymcoin_is_inherit($atts['scheme']))
				$classes .= ($classes ? ' ' : '') . 'scheme_' . $atts['scheme'];
		}
        // Special class name
		if (in_array($sc, array('vc_row'))) {
			if (!empty($atts['special_classes_vc_row']))
				$classes .= ($classes ? ' ' : '') . $atts['special_classes_vc_row'];
		}
		if (in_array($sc, array('vc_column_text'))) {
			if (!empty($atts['special_classes_vc_column_text']))
				$classes .= ($classes ? ' ' : '') . $atts['special_classes_vc_column_text'];
		}
		if (in_array($sc, array('vc_column_inner'))) {
			if (!empty($atts['sc_vc_column_inner']))
				$classes .= ($classes ? ' ' : '') . $atts['sc_vc_column_inner'];
		}
		return $classes;
	}
}
	
// Add theme icons to the VC iconpicker list
if ( !function_exists( 'lymcoin_vc_iconpicker_type_fontawesome' ) ) {
	
	function lymcoin_vc_iconpicker_type_fontawesome($icons) {
		$list = lymcoin_get_list_icons();
		if (!is_array($list) || count($list) == 0) return $icons;
		$rez = array();
		foreach ($list as $icon)
			$rez[] = array($icon => str_replace('icon-', '', $icon));
		return array_merge( $icons, array(esc_html__('Theme Icons', 'lymcoin') => $rez) );
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (lymcoin_exists_visual_composer()) { require_once LYMCOIN_THEME_DIR . 'plugins/js_composer/js_composer-styles.php'; }
?>