<?php
/* ThemeREX Addons support functions
------------------------------------------------------------------------------- */

// Add theme-specific functions
//require_once LYMCOIN_THEME_DIR . 'theme-specific/lymcoin_addons.setup.php';

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('lymcoin_addons_support_theme_setup1')) {
	add_action( 'after_setup_theme', 'lymcoin_addons_support_theme_setup1', 1 );
	function lymcoin_addons_support_theme_setup1() {
		if (lymcoin_exists_lymcoin_addons()) {
			add_filter( 'lymcoin_filter_list_posts_types',		'lymcoin_addons_support_list_post_types');
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_addons_support_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_addons_support_theme_setup9', 9 );
	function lymcoin_addons_support_theme_setup9() {

		add_filter( 'lymcoin_filter_merge_styles',				'lymcoin_addons_support_merge_styles');
		add_filter( 'lymcoin_filter_merge_scripts',				'lymcoin_addons_support_merge_scripts');

		if (lymcoin_exists_lymcoin_addons()) {
			add_action( 'wp_enqueue_scripts', 					'lymcoin_addons_support_frontend_scripts', 1100 );
			add_filter( 'lymcoin_filter_post_type_taxonomy',	'lymcoin_addons_support_post_type_taxonomy', 10, 2 );
			if (is_admin()) {
				add_filter( 'lymcoin_filter_allow_override', 	'lymcoin_addons_support_allow_override_options', 10, 2);
			} else {
				add_filter( 'lymcoin_filter_detect_blog_mode',	'lymcoin_addons_support_detect_blog_mode' );
			}
		}
		
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins','lymcoin_addons_support_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_addons_support_tgmpa_required_plugins' ) ) {
	
	function lymcoin_addons_support_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'lymcoin-addons')) {
			$path = lymcoin_get_file_dir('plugins/lymcoin-addons/lymcoin-addons.zip');
			if (!empty($path) || lymcoin_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> lymcoin_storage_get_array('required_plugins', 'lymcoin-addons'),
					'slug' 		=> 'lymcoin-addons',
					'version'	=> '1.0.0',
					'source'	=> !empty($path) ? $path : 'upload://lymcoin-addons.zip',
					'required' 	=> true
				);
			}
		}
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

// Return plugin's specific options for CPT
if (!function_exists('lymcoin_addons_support_get_list_cpt_options')) {
	function lymcoin_addons_support_get_list_cpt_options($cpt) {
		$options = array();
		if ($cpt == 'portfolio')
			$options = lymcoin_addons_cpt_example_get_list_options();
		// Remove parameter 'hidden'
		foreach ($options as $k=>$v) {
			if (!empty($v['hidden']))
				unset($options[$k]['hidden']);
		}
		return $options;
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('lymcoin_addons_support_setup3')) {
	add_action( 'after_setup_theme', 'lymcoin_addons_support_setup3', 3 );
	function lymcoin_addons_support_setup3() {

		// Section 'CPT_Name' - settings to show 'CPT_Name' blog archive and single posts
		if (lymcoin_exists_example()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'example' => array(
						"title" => esc_html__('CPT_Name', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the CPT_Name pages', 'lymcoin') )
									. '<br>'
									. wp_kses_data( __('Attention! Option "Style" apply only after you save the options!', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_addons_support_get_list_cpt_options('example'),
				lymcoin_options_get_list_cpt_options('example'),
				array(
					"single_info_example" => array(
						"title" => esc_html__('Single CPT_Name item', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_example' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related CPT_Name items' on the single CPT_Name page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_example' => array(
						"title" => esc_html__('Related CPT_Name items', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related CPT_Name items should be displayed on the single CPT_Name page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_example' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_example' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related CPT_Name on the single CPT_Name page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_example' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
				)
			));
		}
	}
}



/* Plugin's support utilities
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( !function_exists( 'lymcoin_exists_lymcoin_addons' ) ) {
	function lymcoin_exists_lymcoin_addons() {
		return function_exists('lymcoin_addons_init');
	}
}

// Return true if CPT_Name is supported
if ( !function_exists( 'lymcoin_exists_example' ) ) {
	function lymcoin_exists_example() {
		return defined('LYMCOIN_ADDONS_CPT_EXAMPLE_PT');
	}
}

// Return true if it's CPT_Name page
if ( !function_exists( 'lymcoin_is_example_page' ) ) {
	function lymcoin_is_example_page() {
		return function_exists('trx_addons_is_example_page') && trx_addons_is_example_page();
	}
}

// Detect current blog mode
if ( !function_exists( 'lymcoin_addons_support_detect_blog_mode' ) ) {
	
	function lymcoin_addons_support_detect_blog_mode($mode='') {
		if ( lymcoin_is_portfolio_page() )
			$mode = 'portfolio';
		return $mode;
	}
}

// Add CPT_Name to the supported posts list
if ( !function_exists( 'lymcoin_addons_support_list_post_types' ) ) {
	
	function lymcoin_addons_support_list_post_types($list=array()) {
		if (defined('LYMCOIN_ADDONS_CPT_EXAMPLE_PT')) $list[LYMCOIN_ADDONS_CPT_EXAMPLE_PT] = esc_html__('CPT_Name', 'lymcoin');
		return $list;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'lymcoin_addons_support_post_type_taxonomy' ) ) {
	
	function lymcoin_addons_support_post_type_taxonomy($tax='', $post_type='') {
		if ( defined('LYMCOIN_ADDONS_CPT_EXAMPLE_PT') && $post_type == LYMCOIN_ADDONS_CPT_EXAMPLE_PT )
			$tax = LYMCOIN_ADDONS_CPT_EXAMPLE_TAXONOMY;
		return $tax;
	}
}

// Show categories of the CPT_Name
if ( !function_exists( 'lymcoin_addons_support_get_post_categories' ) ) {
	
	function lymcoin_addons_support_get_post_categories($cats='') {

		if ( defined('LYMCOIN_ADDONS_CPT_EXAMPLE_PT') ) {
			if (get_post_type()==LYMCOIN_ADDONS_CPT_EXAMPLE_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), LYMCOIN_ADDONS_CPT_EXAMPLE_TAXONOMY);
			}
		}
		return $cats;
	}
}


// Check if override options is allowed
if (!function_exists('lymcoin_addons_support_allow_override_options')) {
	
	function lymcoin_addons_support_allow_override_options($allow, $post_type) {
		return $allow || (defined('LYMCOIN_ADDONS_CPT_EXAMPLE_PT') && $post_type==LYMCOIN_ADDONS_CPT_EXAMPLE_PT);
	}
}

// Set related posts and columns for the plugin's output
if (!function_exists('lymcoin_addons_support_args_related')) {
	
	function lymcoin_addons_support_args_related($args) {
		if (!empty($args['template_args_name']) 
			&& in_array($args['template_args_name'], 
				array('trx_addons_args_sc_example'))) {
			$args['posts_per_page'] = (int) lymcoin_get_theme_option('show_related_posts')
												? lymcoin_get_theme_option('related_posts')
												: 0;
			$args['columns'] = lymcoin_get_theme_option('related_columns');
		}
		return $args;
	}
}


// Enqueue custom styles
if ( !function_exists( 'lymcoin_addons_support_frontend_scripts' ) ) {
	
	function lymcoin_addons_support_frontend_scripts() {
		if (lymcoin_exists_lymcoin_addons()) {
			if (lymcoin_is_on(lymcoin_get_theme_option('debug_mode')) && lymcoin_get_file_dir('plugins/lymcoin-addons/lymcoin-addons.js')!='')
				wp_enqueue_script( 'lymcoin-lymcoin-addons', lymcoin_get_file_url('plugins/lymcoin-addons/lymcoin-addons.js'), array('jquery'), null, true );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'lymcoin_addons_support_merge_styles' ) ) {
	
	function lymcoin_addons_support_merge_styles($list) {
		if (lymcoin_exists_lymcoin_addons()) {
			$list[] = 'plugins/lymcoin-addons/_lymcoin-addons.scss';
		}
		return $list;
	}
}
	
// Merge custom scripts
if ( !function_exists( 'lymcoin_addons_support_merge_scripts' ) ) {
	
	function lymcoin_addons_support_merge_scripts($list) {
		if (lymcoin_exists_lymcoin_addons()) {

		}
		return $list;
	}
}



// Plugin API - theme-specific wrappers for plugin functions
//------------------------------------------------------------------------

// Add plugin-specific colors and fonts to the custom CSS
if (lymcoin_exists_lymcoin_addons()) { require_once LYMCOIN_THEME_DIR . 'plugins/lymcoin-addons/lymcoin-addons-styles.php'; }
?>