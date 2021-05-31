<?php
/* ThemeREX Addons support functions
------------------------------------------------------------------------------- */

// Add theme-specific functions
require_once LYMCOIN_THEME_DIR . 'theme-specific/trx_addons-setup.php';

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('lymcoin_trx_addons_theme_setup1')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_addons_theme_setup1', 1 );
	function lymcoin_trx_addons_theme_setup1() {
		if (lymcoin_exists_trx_addons()) {
			add_filter( 'lymcoin_filter_list_posts_types',			'lymcoin_trx_addons_list_post_types');
			add_filter( 'lymcoin_filter_list_header_footer_types',	'lymcoin_trx_addons_list_header_footer_types');
			add_filter( 'lymcoin_filter_list_header_styles',		'lymcoin_trx_addons_list_header_styles');
			add_filter( 'lymcoin_filter_list_footer_styles',		'lymcoin_trx_addons_list_footer_styles');
			add_action( 'lymcoin_action_load_options',				'lymcoin_trx_addons_add_link_edit_layout');
			add_filter( 'trx_addons_filter_default_layouts',		'lymcoin_trx_addons_default_layouts');
			add_filter( 'trx_addons_filter_load_options',			'lymcoin_trx_addons_default_components');
			add_filter( 'trx_addons_cpt_list_options',				'lymcoin_trx_addons_cpt_list_options', 10, 2);
			add_filter( 'trx_addons_filter_sass_import',			'lymcoin_trx_addons_sass_import', 10, 2);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_trx_addons_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_addons_theme_setup9', 9 );
	function lymcoin_trx_addons_theme_setup9() {
		if (lymcoin_exists_trx_addons()) {
			add_filter( 'trx_addons_filter_add_thumb_sizes',			'lymcoin_trx_addons_add_thumb_sizes');
			add_filter( 'trx_addons_filter_get_thumb_size',				'lymcoin_trx_addons_get_thumb_size');
			add_filter( 'trx_addons_filter_featured_image',				'lymcoin_trx_addons_featured_image', 10, 2);
			add_filter( 'trx_addons_filter_no_image',					'lymcoin_trx_addons_no_image' );
			add_filter( 'trx_addons_filter_get_list_icons',				'lymcoin_trx_addons_get_list_icons', 10, 2 );
			add_action( 'wp_enqueue_scripts', 							'lymcoin_trx_addons_frontend_scripts', 1100 );
			add_filter( 'lymcoin_filter_query_sort_order',	 			'lymcoin_trx_addons_query_sort_order', 10, 3);
			add_filter( 'lymcoin_filter_merge_scripts',					'lymcoin_trx_addons_merge_scripts');
			add_filter( 'lymcoin_filter_prepare_css',					'lymcoin_trx_addons_prepare_css', 10, 2);
			add_filter( 'lymcoin_filter_prepare_js',					'lymcoin_trx_addons_prepare_js', 10, 2);
			add_filter( 'lymcoin_filter_localize_script',				'lymcoin_trx_addons_localize_script');
			add_filter( 'lymcoin_filter_get_post_categories',		 	'lymcoin_trx_addons_get_post_categories');
			add_filter( 'lymcoin_filter_get_post_date',		 			'lymcoin_trx_addons_get_post_date');
			add_filter( 'trx_addons_filter_get_post_date',		 		'lymcoin_trx_addons_get_post_date_wrap');
			add_filter( 'lymcoin_filter_post_type_taxonomy',			'lymcoin_trx_addons_post_type_taxonomy', 10, 2 );
			add_filter( 'trx_addons_filter_theme_logo',					'lymcoin_trx_addons_theme_logo');
			add_filter( 'trx_addons_filter_show_site_name_as_logo',		'lymcoin_trx_addons_show_site_name_as_logo');
			add_filter( 'trx_addons_filter_post_meta',					'lymcoin_trx_addons_post_meta', 10, 2);
			if (is_admin()) {
				add_filter( 'lymcoin_filter_allow_override', 			'lymcoin_trx_addons_allow_override', 10, 2);
				add_filter( 'lymcoin_filter_allow_theme_icons', 		'lymcoin_trx_addons_allow_theme_icons', 10, 2);
				add_filter( 'trx_addons_filter_export_options',			'lymcoin_trx_addons_export_options');
			} else {
				add_filter( 'trx_addons_filter_inc_views',		 		'lymcoin_trx_addons_inc_views');
				add_filter( 'lymcoin_filter_post_meta_args',			'lymcoin_trx_addons_post_meta_args', 10, 3);
				add_filter( 'trx_addons_filter_args_related',			'lymcoin_trx_addons_args_related');
				add_filter( 'trx_addons_filter_seo_snippets',			'lymcoin_trx_addons_seo_snippets');
				add_action( 'trx_addons_action_before_article',			'lymcoin_trx_addons_before_article', 10, 1);
				add_filter( 'lymcoin_filter_get_mobile_menu',			'lymcoin_trx_addons_get_mobile_menu');
				add_filter( 'lymcoin_filter_detect_blog_mode',			'lymcoin_trx_addons_detect_blog_mode' );
				add_filter( 'lymcoin_filter_get_blog_title', 			'lymcoin_trx_addons_get_blog_title');
				add_action( 'lymcoin_action_login',						'lymcoin_trx_addons_action_login');
				add_action( 'lymcoin_action_cart',						'lymcoin_trx_addons_action_cart');
				add_action( 'lymcoin_action_breadcrumbs',				'lymcoin_trx_addons_action_breadcrumbs');
				add_action( 'lymcoin_action_show_layout',				'lymcoin_trx_addons_action_show_layout', 10, 1);
				add_filter( 'lymcoin_filter_get_translated_layout',		'lymcoin_trx_addons_filter_get_translated_layout', 10, 1);
				add_filter( 'trx_addons_filter_sc_layout_content',		'lymcoin_trx_addons_replace_current_year', 20, 2 );
				add_action( 'lymcoin_action_user_meta',					'lymcoin_trx_addons_action_user_meta');
				add_action( 'lymcoin_action_before_post_meta',			'lymcoin_trx_addons_action_before_post_meta'); 
				add_filter( 'trx_addons_filter_featured_image_override','lymcoin_trx_addons_featured_image_override');
				add_filter( 'trx_addons_filter_get_current_mode_image',	'lymcoin_trx_addons_get_current_mode_image');
				add_filter( 'lymcoin_filter_related_thumb_size',		'lymcoin_trx_addons_related_thumb_size');
			}
		}
		
		// Add this filter any time: if plugin exists - load plugin's styles, if not exists - load layouts.scss instead plugin's styles
		add_action( 'wp_enqueue_scripts', 								'lymcoin_trx_addons_layouts_styles' );
		add_filter( 'lymcoin_filter_merge_styles',						'lymcoin_trx_addons_merge_styles');
		add_filter( 'lymcoin_filter_merge_styles_responsive',			'lymcoin_trx_addons_merge_styles_responsive');
		
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins',		'lymcoin_trx_addons_tgmpa_required_plugins' );
		} else {
			add_action( 'lymcoin_action_search',						'lymcoin_trx_addons_action_search', 10, 3);
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_trx_addons_tgmpa_required_plugins' ) ) {
	
	function lymcoin_trx_addons_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'trx_addons')) {
			$path = lymcoin_get_file_dir('plugins/trx_addons/trx_addons.zip');
			if (!empty($path) || lymcoin_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> lymcoin_storage_get_array('required_plugins', 'trx_addons'),
					'slug' 		=> 'trx_addons',
					'version'	=> '1.6.41.2',
					'source'	=> !empty($path) ? $path : 'upload://trx_addons.zip',
					'required' 	=> true
				);
			}
		}
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

if (!function_exists('lymcoin_trx_addons_cpt_list_options')) {
	
	function lymcoin_trx_addons_cpt_list_options($options, $cpt) {
		if ($cpt == 'layouts' && LYMCOIN_THEME_FREE) {
			$options = array();
		} else if (is_array($options)) {
			foreach ($options as $k=>$v) {
				// Store this option in the external (not theme's) storage
				$options[$k]['options_storage'] = 'trx_addons_options';
				// Hide this option from plugin's options (only for overriden options)
				$options[$k]['hidden'] = in_array($cpt, array('cars', 'cars_agents', 'certificates', 'courses', 'dishes', 'portfolio', 'properties', 'agents', 'resume', 'services', 'sport', 'team', 'testimonials'));
			}
		}
		return $options;
	}
}

// Return plugin's specific options for CPT
if (!function_exists('lymcoin_trx_addons_get_list_cpt_options')) {
	function lymcoin_trx_addons_get_list_cpt_options($cpt) {
		$options = array();
		if ($cpt == 'cars')
			$options = array_merge(
						trx_addons_cpt_cars_get_list_options(),
						trx_addons_cpt_cars_agents_get_list_options()
						);
		else if ($cpt == 'certificates')
			$options = trx_addons_cpt_certificates_get_list_options();
		else if ($cpt == 'courses')
			$options = trx_addons_cpt_courses_get_list_options();
		else if ($cpt == 'dishes')
			$options = trx_addons_cpt_dishes_get_list_options();
		else if ($cpt == 'portfolio')
			$options = trx_addons_cpt_portfolio_get_list_options();
		else if ($cpt == 'resume')
			$options = trx_addons_cpt_resume_get_list_options();
		else if ($cpt == 'services')
			$options = trx_addons_cpt_services_get_list_options();
		else if ($cpt == 'properties')
			$options = array_merge(
						trx_addons_cpt_properties_get_list_options(),
						trx_addons_cpt_agents_get_list_options()
						);
		else if ($cpt == 'sport')
			$options = trx_addons_cpt_sport_get_list_options();
		else if ($cpt == 'team')
			$options = trx_addons_cpt_team_get_list_options();
		else if ($cpt == 'testimonials')
			$options = trx_addons_cpt_testimonials_get_list_options();

		foreach ($options as $k=>$v) {
			// Disable refresh the preview area on change any plugin's option
			$options[$k]['refresh'] = false;
			// Remove parameter 'hidden'
			if (!empty($v['hidden']))
				unset($options[$k]['hidden']);
			// Add description
			if ($v['type'] == 'info')
				$options[$k]['desc'] = wp_kses_data(__('In order to see changes made by settings of this section, click "Save" and refresh the page', 'lymcoin'));
		}
		return $options;
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('lymcoin_trx_addons_setup3')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_addons_setup3', 3 );
	function lymcoin_trx_addons_setup3() {
		
		// Section 'Cars' - settings to show 'Cars' blog archive and single posts
		if (lymcoin_exists_cars()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'cars' => array(
						"title" => esc_html__('Cars', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the cars pages.', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('cars'),
				lymcoin_options_get_list_cpt_options('cars'),
				array(
					"single_info_cars" => array(
						"title" => esc_html__('Single car', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_cars' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related cars' on the single car page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_cars' => array(
						"title" => esc_html__('Related cars', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related cars should be displayed on the single car page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_cars' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_cars' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related cars on the single car page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_cars' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
				)
			));
		}
		
		// Section 'Certificates'
		if (lymcoin_exists_certificates()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'certificates' => array(
						"title" => esc_html__('Certificates', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display "Certificates"', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('certificates')
			));
		}
		
		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if (lymcoin_exists_courses()) {
		
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'courses' => array(
						"title" => esc_html__('Courses', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the courses pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('courses'),
				lymcoin_options_get_list_cpt_options('courses'),
				array(
					"single_info_courses" => array(
						"title" => esc_html__('Single course', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_courses' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related courses' on the single course page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_courses' => array(
						"title" => esc_html__('Related courses', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related courses should be displayed on the single course page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_courses' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_courses' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related courses on the single course page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_courses' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
				)
			));
		}
		
		// Section 'Dishes' - settings to show 'Dishes' blog archive and single posts
		if (lymcoin_exists_dishes()) {

			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'dishes' => array(
						"title" => esc_html__('Dishes', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the dishes pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('dishes'),
				lymcoin_options_get_list_cpt_options('dishes'),
				array(
					"single_info_dishes" => array(
						"title" => esc_html__('Single dish', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_dishes' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related dishes' on the single dish page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_dishes' => array(
						"title" => esc_html__('Related dishes', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related dishes should be displayed on the single dish page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_dishes' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_dishes' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related dishes on the single dish page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_dishes' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
					)
				)
			);
		}
		
		// Section 'Portfolio' - settings to show 'Portfolio' blog archive and single posts
		if (lymcoin_exists_portfolio()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'portfolio' => array(
						"title" => esc_html__('Portfolio', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the portfolio pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('portfolio'),
				lymcoin_options_get_list_cpt_options('portfolio'),
				array(
					"single_info_portfolio" => array(
						"title" => esc_html__('Single portfolio item', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_portfolio' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related portfolio items' on the single portfolio page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_portfolio' => array(
						"title" => esc_html__('Related portfolio items', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related portfolio items should be displayed on the single portfolio page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_portfolio' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_portfolio' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related portfolio on the single portfolio page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_portfolio' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
				)
			));
		}
		
		// Section 'Properties' - settings to show 'Properties' blog archive and single posts
		if (lymcoin_exists_properties()) {
		
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'properties' => array(
						"title" => esc_html__('Properties', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the properties pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('properties'),
				lymcoin_options_get_list_cpt_options('properties'),
				array(
					"single_info_properties" => array(
						"title" => esc_html__('Single property', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_properties' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related properties' on the single property page", 'lymcoin') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_properties' => array(
						"title" => esc_html__('Related properties', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related properties should be displayed on the single property page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_properties' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_properties' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related properties on the single property page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_properties' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
					)
				)
			);
		}
		
		// Section 'Resume'
		if (lymcoin_exists_resume()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'resume' => array(
						"title" => esc_html__('Resume', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display "Resume"', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('resume')
			));
		}
		
		// Section 'Services' - settings to show 'Services' blog archive and single posts
		if (lymcoin_exists_services()) {
		
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'services' => array(
						"title" => esc_html__('Services', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the services pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('services'),
				lymcoin_options_get_list_cpt_options('services'),
				array(
					"single_info_services" => array(
						"title" => esc_html__('Single service item', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					'show_related_posts_services' => array(
						"title" => esc_html__('Show related posts', 'lymcoin'),
						"desc" => wp_kses_data( __("Show section 'Related services' on the single service page", 'lymcoin') ),
						"std" => 0,
						"type" => "checkbox"
						),
					'related_posts_services' => array(
						"title" => esc_html__('Related services', 'lymcoin'),
						"desc" => wp_kses_data( __('How many related services should be displayed on the single service page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_services' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,9),
						"type" => "select"
						),
					'related_columns_services' => array(
						"title" => esc_html__('Related columns', 'lymcoin'),
						"desc" => wp_kses_data( __('How many columns should be used to output related services on the single service page?', 'lymcoin') ),
						"dependency" => array(
							'show_related_posts_services' => array(1)
						),
						"std" => 3,
						"options" => lymcoin_get_list_range(1,4),
						"type" => "select"
						)
				)
			));
		}
		
		// Section 'Sport' - settings to show 'Sport' blog archive and single posts
		if (lymcoin_exists_sport()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'sport' => array(
						"title" => esc_html__('Sport', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the sport pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('sport'),
				lymcoin_options_get_list_cpt_options('sport')
			));
		}
		
		// Section 'Team' - settings to show 'Team' blog archive and single posts
		if (lymcoin_exists_team()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'team' => array(
						"title" => esc_html__('Team', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the team members pages.', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('team'),
				lymcoin_options_get_list_cpt_options('team')
			));
		}
		
		// Section 'Testimonials'
		if (lymcoin_exists_resume()) {
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'testimonials' => array(
						"title" => esc_html__('Testimonials', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display "Testimonials"', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_trx_addons_get_list_cpt_options('testimonials')
			));
		}
	}
}

// Add 'layout edit' link to the 'description' in the 'header_style' and 'footer_style' parameters
if ( !function_exists('lymcoin_trx_addons_add_link_edit_layout') ) {
	
	function lymcoin_trx_addons_add_link_edit_layout() {
		static $added = false;
		if ($added) return;
		$added = true;
		$options = lymcoin_storage_get('options');
		foreach($options as $k=>$v) {
			if (!isset($v['std'])) continue;
			$k1 = substr($k, 0, 12);
			if ($k1=='header_style' || $k1=='footer_style') {
				$layout = lymcoin_get_theme_option($k);
				if (lymcoin_is_inherit($layout))
					$layout = lymcoin_get_theme_option($k1);
				if (!empty($layout)) {
					$layout = explode('-', $layout);
					$layout = $layout[count($layout)-1];
					if ($layout > 0) {
						lymcoin_storage_set_array2('options', $k, 'desc', $v['desc']
												. '<br>'
												. sprintf('<a href="%1$s" class="lymcoin_post_editor'.(intval($layout)==0 ? ' lymcoin_hidden' : '').'" target="_blank">%2$s</a>',
															admin_url( sprintf( "post.php?post=%d&amp;action=edit", $layout ) ),
															__("Open selected layout in a new tab to edit", 'lymcoin')
														)
												);
					}
				}
			}
		}
	}
}


// Setup internal plugin's parameters
if (!function_exists('lymcoin_trx_addons_init_settings')) {
	add_filter( 'trx_addons_init_settings', 'lymcoin_trx_addons_init_settings');
	function lymcoin_trx_addons_init_settings($settings) {
		$settings['socials_type']	= lymcoin_get_theme_setting('socials_type');
		$settings['icons_type']		= lymcoin_get_theme_setting('icons_type');
		$settings['icons_selector']	= lymcoin_get_theme_setting('icons_selector');
		return $settings;
	}
}



/* Plugin's support utilities
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( !function_exists( 'lymcoin_exists_trx_addons' ) ) {
	function lymcoin_exists_trx_addons() {
		return defined('TRX_ADDONS_VERSION');
	}
}

// Return true if cars is supported
if ( !function_exists( 'lymcoin_exists_cars' ) ) {
	function lymcoin_exists_cars() {
		return defined('TRX_ADDONS_CPT_CARS_PT');
	}
}

// Return true if certificates is supported
if ( !function_exists( 'lymcoin_exists_certificates' ) ) {
	function lymcoin_exists_certificates() {
		return defined('TRX_ADDONS_CPT_CERTIFICATES_PT');
	}
}

// Return true if courses is supported
if ( !function_exists( 'lymcoin_exists_courses' ) ) {
	function lymcoin_exists_courses() {
		return defined('TRX_ADDONS_CPT_COURSES_PT');
	}
}

// Return true if dishes is supported
if ( !function_exists( 'lymcoin_exists_dishes' ) ) {
	function lymcoin_exists_dishes() {
		return defined('TRX_ADDONS_CPT_DISHES_PT');
	}
}

// Return true if layouts is supported
if ( !function_exists( 'lymcoin_exists_layouts' ) ) {
	function lymcoin_exists_layouts() {
		return defined('TRX_ADDONS_CPT_LAYOUTS_PT');
	}
}

// Return true if portfolio is supported
if ( !function_exists( 'lymcoin_exists_portfolio' ) ) {
	function lymcoin_exists_portfolio() {
		return defined('TRX_ADDONS_CPT_PORTFOLIO_PT');
	}
}

// Return true if properties is supported
if ( !function_exists( 'lymcoin_exists_properties' ) ) {
	function lymcoin_exists_properties() {
		return defined('TRX_ADDONS_CPT_PROPERTIES_PT');
	}
}

// Return true if resume is supported
if ( !function_exists( 'lymcoin_exists_resume' ) ) {
	function lymcoin_exists_resume() {
		return defined('TRX_ADDONS_CPT_RESUME_PT');
	}
}

// Return true if services is supported
if ( !function_exists( 'lymcoin_exists_services' ) ) {
	function lymcoin_exists_services() {
		return defined('TRX_ADDONS_CPT_SERVICES_PT');
	}
}

// Return true if sport is supported
if ( !function_exists( 'lymcoin_exists_sport' ) ) {
	function lymcoin_exists_sport() {
		return defined('TRX_ADDONS_CPT_COMPETITIONS_PT');
	}
}

// Return true if team is supported
if ( !function_exists( 'lymcoin_exists_team' ) ) {
	function lymcoin_exists_team() {
		return defined('TRX_ADDONS_CPT_TEAM_PT');
	}
}

// Return true if testimonials is supported
if ( !function_exists( 'lymcoin_exists_testimonials' ) ) {
	function lymcoin_exists_testimonials() {
		return defined('TRX_ADDONS_CPT_TESTIMONIALS_PT');
	}
}


// Return true if it's cars page
if ( !function_exists( 'lymcoin_is_cars_page' ) ) {
	function lymcoin_is_cars_page() {
		return function_exists('trx_addons_is_cars_page') && trx_addons_is_cars_page();
	}
}

// Return true if it's courses page
if ( !function_exists( 'lymcoin_is_courses_page' ) ) {
	function lymcoin_is_courses_page() {
		return function_exists('trx_addons_is_courses_page') && trx_addons_is_courses_page();
	}
}

// Return true if it's dishes page
if ( !function_exists( 'lymcoin_is_dishes_page' ) ) {
	function lymcoin_is_dishes_page() {
		return function_exists('trx_addons_is_dishes_page') && trx_addons_is_dishes_page();
	}
}

// Return true if it's properties page
if ( !function_exists( 'lymcoin_is_properties_page' ) ) {
	function lymcoin_is_properties_page() {
		return function_exists('trx_addons_is_properties_page') && trx_addons_is_properties_page();
	}
}

// Return true if it's portfolio page
if ( !function_exists( 'lymcoin_is_portfolio_page' ) ) {
	function lymcoin_is_portfolio_page() {
		return function_exists('trx_addons_is_portfolio_page') && trx_addons_is_portfolio_page();
	}
}

// Return true if it's services page
if ( !function_exists( 'lymcoin_is_services_page' ) ) {
	function lymcoin_is_services_page() {
		return function_exists('trx_addons_is_services_page') && trx_addons_is_services_page();
	}
}

// Return true if it's team page
if ( !function_exists( 'lymcoin_is_team_page' ) ) {
	function lymcoin_is_team_page() {
		return function_exists('trx_addons_is_team_page') && trx_addons_is_team_page();
	}
}

// Return true if it's sport page
if ( !function_exists( 'lymcoin_is_sport_page' ) ) {
	function lymcoin_is_sport_page() {
		return function_exists('trx_addons_is_sport_page') && trx_addons_is_sport_page();
	}
}

// Return true if custom layouts are available
if ( !function_exists( 'lymcoin_is_layouts_available' ) ) {
	function lymcoin_is_layouts_available() {
		return lymcoin_exists_trx_addons() 
										&& (
											function_exists('lymcoin_exists_sop') && lymcoin_exists_sop()
											||
											function_exists('lymcoin_exists_visual_composer') && lymcoin_exists_visual_composer()
											);
	}
}

// Detect current blog mode
if ( !function_exists( 'lymcoin_trx_addons_detect_blog_mode' ) ) {
	
	function lymcoin_trx_addons_detect_blog_mode($mode='') {
		if ( lymcoin_is_cars_page() )
			$mode = 'cars';
		else if ( lymcoin_is_courses_page() )
			$mode = 'courses';
		else if ( lymcoin_is_dishes_page() )
			$mode = 'dishes';
		else if ( lymcoin_is_properties_page() )
			$mode = 'properties';
		else if ( lymcoin_is_portfolio_page() )
			$mode = 'portfolio';
		else if ( lymcoin_is_services_page() )
			$mode = 'services';
		else if ( lymcoin_is_sport_page() )
			$mode = 'sport';
		else if ( lymcoin_is_team_page() )
			$mode = 'team';
		return $mode;
	}
}

// Disallow increment views counter on the blog archive
if ( !function_exists( 'lymcoin_trx_addons_inc_views' ) ) {
	
	function lymcoin_trx_addons_inc_views($allow=false) {
		return $allow && is_page() && lymcoin_storage_isset('blog_archive') ? false : $allow;
	}
}

// Add team, courses, etc. to the supported posts list
if ( !function_exists( 'lymcoin_trx_addons_list_post_types' ) ) {
	
	function lymcoin_trx_addons_list_post_types($list=array()) {
		if (function_exists('trx_addons_get_cpt_list')) {
			$cpt_list = trx_addons_get_cpt_list();
			foreach ($cpt_list as $cpt => $title) {
				if (   
					   (defined('TRX_ADDONS_CPT_CARS_PT') && $cpt == TRX_ADDONS_CPT_CARS_PT)
					|| (defined('TRX_ADDONS_CPT_COURSES_PT') && $cpt == TRX_ADDONS_CPT_COURSES_PT)
					|| (defined('TRX_ADDONS_CPT_DISHES_PT') && $cpt == TRX_ADDONS_CPT_DISHES_PT)
					|| (defined('TRX_ADDONS_CPT_PORTFOLIO_PT') && $cpt == TRX_ADDONS_CPT_PORTFOLIO_PT)
					|| (defined('TRX_ADDONS_CPT_PROPERTIES_PT') && $cpt == TRX_ADDONS_CPT_PROPERTIES_PT)
					|| (defined('TRX_ADDONS_CPT_SERVICES_PT') && $cpt == TRX_ADDONS_CPT_SERVICES_PT)
					|| (defined('TRX_ADDONS_CPT_COMPETITIONS_PT') && $cpt == TRX_ADDONS_CPT_COMPETITIONS_PT)
					|| (defined('TRX_ADDONS_CPT_TEAM_PT') && $cpt == TRX_ADDONS_CPT_TEAM_PT)
					)
					$list[$cpt] = $title;
			}
		}
		return $list;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'lymcoin_trx_addons_post_type_taxonomy' ) ) {
	
	function lymcoin_trx_addons_post_type_taxonomy($tax='', $post_type='') {
		if ( defined('TRX_ADDONS_CPT_CARS_PT') && $post_type == TRX_ADDONS_CPT_CARS_PT )
			$tax = TRX_ADDONS_CPT_CARS_TAXONOMY_MAKER;
		else if ( defined('TRX_ADDONS_CPT_COURSES_PT') && $post_type == TRX_ADDONS_CPT_COURSES_PT )
			$tax = TRX_ADDONS_CPT_COURSES_TAXONOMY;
		else if ( defined('TRX_ADDONS_CPT_DISHES_PT') && $post_type == TRX_ADDONS_CPT_DISHES_PT )
			$tax = TRX_ADDONS_CPT_DISHES_TAXONOMY;
		else if ( defined('TRX_ADDONS_CPT_PORTFOLIO_PT') && $post_type == TRX_ADDONS_CPT_PORTFOLIO_PT )
			$tax = TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY;
		else if ( defined('TRX_ADDONS_CPT_PROPERTIES_PT') && $post_type == TRX_ADDONS_CPT_PROPERTIES_PT )
			$tax = TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE;
		else if ( defined('TRX_ADDONS_CPT_SERVICES_PT') && $post_type == TRX_ADDONS_CPT_SERVICES_PT )
			$tax = TRX_ADDONS_CPT_SERVICES_TAXONOMY;
		else if ( defined('TRX_ADDONS_CPT_COMPETITIONS_PT') && $post_type == TRX_ADDONS_CPT_COMPETITIONS_PT )
			$tax = TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY;
		else if ( defined('TRX_ADDONS_CPT_TEAM_PT') && $post_type == TRX_ADDONS_CPT_TEAM_PT )
			$tax = TRX_ADDONS_CPT_TEAM_TAXONOMY;
		return $tax;
	}
}

// Show categories of the team, courses, etc.
if ( !function_exists( 'lymcoin_trx_addons_get_post_categories' ) ) {
	
	function lymcoin_trx_addons_get_post_categories($cats='') {

		if ( defined('TRX_ADDONS_CPT_CARS_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_CARS_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_CARS_TAXONOMY_TYPE);
			}
		}
		if ( defined('TRX_ADDONS_CPT_COURSES_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_COURSES_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_COURSES_TAXONOMY);
			}
		}
		if ( defined('TRX_ADDONS_CPT_DISHES_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_DISHES_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_DISHES_TAXONOMY);
			}
		}
		if ( defined('TRX_ADDONS_CPT_PORTFOLIO_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_PORTFOLIO_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY);
			}
		}
		if ( defined('TRX_ADDONS_CPT_PROPERTIES_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_PROPERTIES_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE);
			}
		}
		if ( defined('TRX_ADDONS_CPT_SERVICES_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_SERVICES_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_SERVICES_TAXONOMY);
			}
		}
		if ( defined('TRX_ADDONS_CPT_COMPETITIONS_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_COMPETITIONS_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY);
			}
		}
		if ( defined('TRX_ADDONS_CPT_TEAM_PT') ) {
			if (get_post_type()==TRX_ADDONS_CPT_TEAM_PT) {
				$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_TEAM_TAXONOMY);
			}
		}
		return $cats;
	}
}

// Show post's date with the theme-specific format
if ( !function_exists( 'lymcoin_trx_addons_get_post_date_wrap' ) ) {
	
	function lymcoin_trx_addons_get_post_date_wrap($dt='') {
		return apply_filters('lymcoin_filter_get_post_date', $dt);
	}
}

// Show date of the courses
if ( !function_exists( 'lymcoin_trx_addons_get_post_date' ) ) {
	
	function lymcoin_trx_addons_get_post_date($dt='') {

		if ( defined('TRX_ADDONS_CPT_COURSES_PT') && get_post_type()==TRX_ADDONS_CPT_COURSES_PT) {
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
			$dt = $meta['date'];
			// Translators: Add formatted date to the output
			$dt = sprintf($dt < date('Y-m-d') ? esc_html__('Started on %s', 'lymcoin') : esc_html__('Starting %s', 'lymcoin'), 
					date_i18n(get_option('date_format'), strtotime($dt)));

		} else if ( defined('TRX_ADDONS_CPT_COMPETITIONS_PT') && in_array(get_post_type(), array(TRX_ADDONS_CPT_COMPETITIONS_PT, TRX_ADDONS_CPT_ROUNDS_PT, TRX_ADDONS_CPT_MATCHES_PT))) {
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
			$dt = $meta['date_start'];
			// Translators: Add formatted date to the output
			$dt = sprintf($dt < date('Y-m-d').(!empty($meta['time_start']) ? ' H:i' : '') ? esc_html__('Started on %s', 'lymcoin') : esc_html__('Starting %s', 'lymcoin'), 
					date_i18n(get_option('date_format') . (!empty($meta['time_start']) ? ' '.get_option('time_format') : ''), strtotime($dt.(!empty($meta['time_start']) ? ' '.trim($meta['time_start']) : ''))));

		} else if ( defined('TRX_ADDONS_CPT_COMPETITIONS_PT') && get_post_type() == TRX_ADDONS_CPT_PLAYERS_PT) {
			// Uncomment (remove) next line if you want to show player's birthday in the page title block
			if (false) {
				$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
				// Translators: Add formatted date to the output
				$dt = !empty($meta['birthday']) ? sprintf(esc_html__('Birthday: %s', 'lymcoin'), date_i18n(get_option('date_format'), strtotime($meta['birthday']))) : '';
			} else
				$dt = '';
		}
		return $dt;
	}
}

// Check if override options is allowed
if (!function_exists('lymcoin_trx_addons_allow_override')) {
	
	function lymcoin_trx_addons_allow_override($allow, $post_type) {
		return $allow
					|| (defined('TRX_ADDONS_CPT_CARS_PT') && in_array($post_type, array(
																				TRX_ADDONS_CPT_CARS_PT,
																				TRX_ADDONS_CPT_CARS_AGENTS_PT
																				)))
					|| (defined('TRX_ADDONS_CPT_COURSES_PT') && $post_type==TRX_ADDONS_CPT_COURSES_PT)
					|| (defined('TRX_ADDONS_CPT_DISHES_PT') && $post_type==TRX_ADDONS_CPT_DISHES_PT)
					|| (defined('TRX_ADDONS_CPT_PORTFOLIO_PT') && $post_type==TRX_ADDONS_CPT_PORTFOLIO_PT) 
					|| (defined('TRX_ADDONS_CPT_PROPERTIES_PT') && in_array($post_type, array(
																				TRX_ADDONS_CPT_PROPERTIES_PT,
																				TRX_ADDONS_CPT_AGENTS_PT
																				)))
					|| (defined('TRX_ADDONS_CPT_RESUME_PT') && $post_type==TRX_ADDONS_CPT_RESUME_PT) 
					|| (defined('TRX_ADDONS_CPT_SERVICES_PT') && $post_type==TRX_ADDONS_CPT_SERVICES_PT) 
					|| (defined('TRX_ADDONS_CPT_COMPETITIONS_PT') && in_array($post_type, array(
																				TRX_ADDONS_CPT_COMPETITIONS_PT,
																				TRX_ADDONS_CPT_ROUNDS_PT,
																				TRX_ADDONS_CPT_MATCHES_PT
																				)))
					|| (defined('TRX_ADDONS_CPT_TEAM_PT') && $post_type==TRX_ADDONS_CPT_TEAM_PT);
	}
}

// Check if theme icons is allowed
if (!function_exists('lymcoin_trx_addons_allow_theme_icons')) {
	
	function lymcoin_trx_addons_allow_theme_icons($allow, $post_type) {
		$screen = function_exists('get_current_screen') ? get_current_screen() : false;
		return $allow
					|| (defined('TRX_ADDONS_CPT_LAYOUTS_PT') && $post_type==TRX_ADDONS_CPT_LAYOUTS_PT)
					|| (!empty($screen->id) && in_array($screen->id, array(
																		'appearance_page_trx_addons_options',
																		'profile'
																	)
														)
						);
	}
}

// Disable theme-specific fields in the exported options
if (!function_exists('lymcoin_trx_addons_export_options')) {
	
	function lymcoin_trx_addons_export_options($options) {
		// ThemeREX Addons
		if (!empty($options['trx_addons_options'])) {
			$options['trx_addons_options']['debug_mode'] = 0;
			$options['trx_addons_options']['api_google'] = '';
			$options['trx_addons_options']['api_google_analitics'] = '';
			$options['trx_addons_options']['api_google_remarketing'] = '';
			$options['trx_addons_options']['demo_enable'] = 0;
			$options['trx_addons_options']['demo_referer'] = '';
			$options['trx_addons_options']['demo_default_url'] = '';
			$options['trx_addons_options']['demo_logo'] = '';
			$options['trx_addons_options']['demo_post_type'] = '';
			$options['trx_addons_options']['demo_taxonomy'] = '';
			$options['trx_addons_options']['demo_logo'] = '';
			$options['trx_addons_options']['demo_logo'] = '';
			unset($options['trx_addons_options']['themes_market_referals']);
		}
		// ThemeREX Donations
		if (!empty($options['trx_donations_options'])) {
			$options['trx_donations_options']['pp_account'] = '';
		}
		// WooCommerce
		if (!empty($options['woocommerce_paypal_settings'])) {
			$options['woocommerce_paypal_settings']['email'] = '';
			$options['woocommerce_paypal_settings']['receiver_email'] = '';
			$options['woocommerce_paypal_settings']['identity_token'] = '';
		}
		return $options;		
	}
}

// Set related posts and columns for the plugin's output
if (!function_exists('lymcoin_trx_addons_args_related')) {
	
	function lymcoin_trx_addons_args_related($args) {
		if (!empty($args['template_args_name']) 
			&& in_array($args['template_args_name'], 
				array('trx_addons_args_sc_cars', 
					  'trx_addons_args_sc_courses',
					  'trx_addons_args_sc_dishes',
					  'trx_addons_args_sc_portfolio',
					  'trx_addons_args_sc_properties',
  					  'trx_addons_args_sc_services'))) {
			$args['posts_per_page'] = (int) lymcoin_get_theme_option('show_related_posts')
												? lymcoin_get_theme_option('related_posts')
												: 0;
			$args['columns'] = lymcoin_get_theme_option('related_columns');
		}
		return $args;
	}
}
// Add 'custom' to the headers types list
if ( !function_exists( 'lymcoin_trx_addons_list_header_footer_types' ) ) {
	
	function lymcoin_trx_addons_list_header_footer_types($list=array()) {
		if (lymcoin_exists_layouts()) {
			$list['custom'] = esc_html__('Custom', 'lymcoin');
		}
		return $list;
	}
}

// Add layouts to the headers list
if ( !function_exists( 'lymcoin_trx_addons_list_header_styles' ) ) {
	
	function lymcoin_trx_addons_list_header_styles($list=array()) {
		if (lymcoin_exists_layouts()) {
			$layouts = lymcoin_get_list_posts(false, array(
							'post_type' => TRX_ADDONS_CPT_LAYOUTS_PT,
							'meta_key' => 'trx_addons_layout_type',
							'meta_value' => 'header',
							'orderby' => 'ID',
							'order' => 'asc',
							'not_selected' => false
							)
						);
			$new_list = array();
			foreach ($layouts as $id=>$title) {
				if ($id != 'none') $new_list['header-custom-'.intval($id)] = $title;
			}
			$list = lymcoin_array_merge($new_list, $list);
		}
		return $list;
	}
}

// Add layouts to the footers list
if ( !function_exists( 'lymcoin_trx_addons_list_footer_styles' ) ) {
	
	function lymcoin_trx_addons_list_footer_styles($list=array()) {
		if (lymcoin_exists_layouts()) {
			$layouts = lymcoin_get_list_posts(false, array(
							'post_type' => TRX_ADDONS_CPT_LAYOUTS_PT,
							'meta_key' => 'trx_addons_layout_type',
							'meta_value' => 'footer',
							'orderby' => 'ID',
							'order' => 'asc',
							'not_selected' => false
							)
						);
			$new_list = array();
			foreach ($layouts as $id=>$title) {
				if ($id != 'none') $new_list['footer-custom-'.intval($id)] = $title;
			}
			$list = lymcoin_array_merge($new_list, $list);
		}
		return $list;
	}
}


// Replace {{Y}} or {Y} with the current year in the layouts
if ( !function_exists( 'lymcoin_trx_addons_replace_current_year' ) ) {
	
	function lymcoin_trx_addons_replace_current_year($content, $post_id=0) {
		return str_replace(array('{{Y}}', '{Y}'), date('Y'), $content);
	}
}


// Add theme-specific layouts to the list
if (!function_exists('lymcoin_trx_addons_default_layouts')) {
	
	function lymcoin_trx_addons_default_layouts($default_layouts=array()) {
		if (lymcoin_storage_isset('trx_addons_default_layouts')) {
			$layouts = lymcoin_storage_get('trx_addons_default_layouts');
		} else {
			require_once LYMCOIN_THEME_DIR . 'theme-specific/trx_addons-layouts.php';
			if (!isset($layouts) || !is_array($layouts))
				$layouts = array();
			lymcoin_storage_set('trx_addons_default_layouts', $layouts);
		}
		if (count($layouts) > 0)
			$default_layouts = array_merge($default_layouts, $layouts);
		return $default_layouts;
	}
}


// Add theme-specific components to the plugin's options
if (!function_exists('lymcoin_trx_addons_default_components')) {
	
	function lymcoin_trx_addons_default_components($options=array()) {
		if (empty($options['components_present'])) {
			if (lymcoin_storage_isset('trx_addons_default_components')) {
				$components = lymcoin_storage_get('trx_addons_default_components');
			} else {
				require_once LYMCOIN_THEME_DIR . 'theme-specific/trx_addons-components.php';
				if (!isset($components) || !is_array($components))
					$components = array();
				lymcoin_storage_set('trx_addons_default_components', $components);
			}
			$options = is_array($options) && count($components) > 0
									? array_merge($options, $components)
									: $components;
		}
		// Turn on API of the theme required plugins
		$plugins = lymcoin_storage_get('required_plugins');
		foreach ($plugins as $p=>$v) {			
			if (isset($options["components_api_{$p}"]))
				$options["components_api_{$p}"] = 1;
		}
		return $options;
	}
}

// Enqueue custom styles
if ( !function_exists( 'lymcoin_trx_addons_layouts_styles' ) ) {
	
	function lymcoin_trx_addons_layouts_styles() {
		if (!lymcoin_exists_trx_addons()) {
			if (lymcoin_get_file_dir('plugins/trx_addons/layouts/layouts.css')!='') {
				wp_enqueue_style( 'lymcoin-trx-addons-layouts',  lymcoin_get_file_url('plugins/trx_addons/layouts/layouts.css'), array(), null );
			}
			if (lymcoin_get_file_dir('plugins/trx_addons/layouts/layouts.responsive.css')!='') {
				wp_enqueue_style( 'lymcoin-trx-addons-layouts-responsive',  lymcoin_get_file_url('plugins/trx_addons/layouts/layouts.responsive.css'), array(), null );
			}
		}
	}
}

// Enqueue custom styles and scripts
if ( !function_exists( 'lymcoin_trx_addons_frontend_scripts' ) ) {
	
	function lymcoin_trx_addons_frontend_scripts() {
		if (lymcoin_exists_trx_addons()) {
			if (lymcoin_is_on(lymcoin_get_theme_option('debug_mode')) && lymcoin_get_file_dir('plugins/trx_addons/trx_addons.js')!='')
				wp_enqueue_script( 'lymcoin-trx-addons', lymcoin_get_file_url('plugins/trx_addons/trx_addons.js'), array('jquery'), null, true );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'lymcoin_trx_addons_merge_styles' ) ) {
	
	function lymcoin_trx_addons_merge_styles($list) {
		$list[] = 'plugins/trx_addons/_trx_addons.scss';
		return $list;
	}
}

// Merge responsive styles
if ( !function_exists( 'lymcoin_trx_addons_merge_styles_responsive' ) ) {
	
	function lymcoin_trx_addons_merge_styles_responsive($list) {
		$list[] = 'plugins/trx_addons/_trx_addons-responsive.scss';
		return $list;
	}
}

// Add theme-specific vars to the list of responsive files of ThemeREX Addons
if ( !function_exists( 'lymcoin_trx_addons_sass_import' ) ) {
	
	function lymcoin_trx_addons_sass_import($output='', $file='') {
		if (strpos($file, 'vars.scss') !== false)
			$output .= "\n" . lymcoin_fgc(lymcoin_get_file_dir('css/_theme-vars.scss')) . "\n";
		return $output;
	}
}
	
// Merge custom scripts
if ( !function_exists( 'lymcoin_trx_addons_merge_scripts' ) ) {
	
	function lymcoin_trx_addons_merge_scripts($list) {
		$list[] = 'plugins/trx_addons/trx_addons.js';
		return $list;
	}
}



// Plugin API - theme-specific wrappers for plugin functions
//------------------------------------------------------------------------

// Debug functions wrappers
if (!function_exists('ddo')) { function ddo($obj, $level=-1) { return var_dump($obj); } }
if (!function_exists('dcl')) { function dcl($msg, $level=-1) { echo '<br><pre>' . esc_html($msg) . '</pre><br>'; } }
if (!function_exists('dco')) { function dco($obj, $level=-1) { dcl(ddo($obj, $level), $level); } }
if (!function_exists('dcs')) { function dcs($level=-1) { $s = debug_backtrace(); array_shift($s); dco($s, $level); } }

// Check if URL contain specified string
if (!function_exists('lymcoin_check_url')) {
	function lymcoin_check_url($val='', $defa=false) {
		return function_exists('trx_addons_check_url') 
					? trx_addons_check_url($val) 
					: $defa;
	}
}

// Check if layouts components are showed or set new state
if (!function_exists('lymcoin_sc_layouts_showed')) {
	function lymcoin_sc_layouts_showed($name, $val=null) {
		if (function_exists('trx_addons_sc_layouts_showed')) {
			if ($val!==null)
				trx_addons_sc_layouts_showed($name, $val);
			else
				return trx_addons_sc_layouts_showed($name);
		} else {
			if ($val!==null)
				return lymcoin_storage_set_array('sc_layouts_components', $name, $val);
			else
				return lymcoin_storage_get_array('sc_layouts_components', $name);
		}
	}
}

// Return image size multiplier
if (!function_exists('lymcoin_get_retina_multiplier')) {
	function lymcoin_get_retina_multiplier($force_retina=0) {
		$mult = function_exists('trx_addons_get_retina_multiplier') ? trx_addons_get_retina_multiplier($force_retina) : 1;
		return max(1, $mult);
	}
}

// Return slider layout
if (!function_exists('lymcoin_get_slider_layout')) {
	function lymcoin_get_slider_layout($args) {
		return function_exists('trx_addons_get_slider_layout') 
					? trx_addons_get_slider_layout($args) 
					: '';
	}
}

// Return video player layout
if (!function_exists('lymcoin_get_video_layout')) {
	function lymcoin_get_video_layout($args) {
		return function_exists('trx_addons_get_video_layout') 
					? trx_addons_get_video_layout($args) 
					: '';
	}
}

// Return theme specific layout of the featured image block
if ( !function_exists( 'lymcoin_trx_addons_featured_image' ) ) {
	
	function lymcoin_trx_addons_featured_image($processed=false, $args=array()) {
		$args['show_no_image'] = true;
		$args['singular'] = false;
		$args['hover'] = isset($args['hover']) && $args['hover']=='' ? '' : lymcoin_get_theme_option('image_hover');
		lymcoin_show_post_featured($args);
		return true;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( !function_exists( 'lymcoin_trx_addons_add_thumb_sizes' ) ) {
	
	function lymcoin_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			$thumb_sizes = lymcoin_storage_get('theme_thumbs');
			foreach ($thumb_sizes as $v) {
				if (!empty($v['subst']) && isset($list[$v['subst']]))
					unset($list[$v['subst']]);
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( !function_exists( 'lymcoin_trx_addons_get_thumb_size' ) ) {
	
	function lymcoin_trx_addons_get_thumb_size($thumb_size='') {
		$thumb_sizes = lymcoin_storage_get('theme_thumbs');
		foreach ($thumb_sizes as $k => $v) {
			if (strpos($thumb_size, $v['subst']) !== false) {
				$thumb_size = str_replace($thumb_size, $v['subst'], $k);
				break;
			}
		}
		return $thumb_size;
	}
}

// Return theme specific 'no-image' picture
if ( !function_exists( 'lymcoin_trx_addons_no_image' ) ) {
	
	function lymcoin_trx_addons_no_image($no_image='') {
		return lymcoin_get_no_image($no_image);
	}
}

// Return theme-specific icons
if ( !function_exists( 'lymcoin_trx_addons_get_list_icons' ) ) {
	
	function lymcoin_trx_addons_get_list_icons($list, $prepend_inherit) {
		return lymcoin_get_list_icons($prepend_inherit);
	}
}

// Return links to the social profiles
if (!function_exists('lymcoin_get_socials_links')) {
	function lymcoin_get_socials_links($style='icons') {
		return function_exists('trx_addons_get_socials_links') 
					? trx_addons_get_socials_links($style)
					: '';
	}
}

// Return links to share post
if (!function_exists('lymcoin_get_share_links')) {
	function lymcoin_get_share_links($args=array()) {
		return function_exists('trx_addons_get_share_links') 
					? trx_addons_get_share_links($args)
					: '';
	}
}

// Display links to share post
if (!function_exists('lymcoin_show_share_links')) {
	function lymcoin_show_share_links($args=array()) {
		if (function_exists('trx_addons_get_share_links')) {
			$args['echo'] = true;
			trx_addons_get_share_links($args);
		}
	}
}

// Return post icon
if (!function_exists('lymcoin_get_post_icon')) {
	function lymcoin_get_post_icon($post_id=0) {
		return function_exists('trx_addons_get_post_icon') 
					? trx_addons_get_post_icon($post_id)
					: '';
	}
}

// Show reactions in the single posts
if (!function_exists('lymcoin_trx_addons_action_before_post_meta')) {
	
	function lymcoin_trx_addons_action_before_post_meta() {
		if (trx_addons_is_on(trx_addons_get_option('emotions_allowed')) && is_single() && !is_attachment())
			trx_addons_get_post_reactions(true);
	}
}


// Return image from the category
if (!function_exists('lymcoin_get_category_image')) {
	function lymcoin_get_category_image($term_id=0) {
		return function_exists('trx_addons_get_category_image') 
					? trx_addons_get_category_image($term_id)
					: '';
	}
}

// Return small image (icon) from the category
if (!function_exists('lymcoin_get_category_icon')) {
	function lymcoin_get_category_icon($term_id=0) {
		return function_exists('trx_addons_get_category_icon') 
					? trx_addons_get_category_icon($term_id)
					: '';
	}
}

// Return string with counters items
if (!function_exists('lymcoin_get_post_counters')) {
	function lymcoin_get_post_counters($counters='views') {
		return function_exists('trx_addons_get_post_counters')
					? str_replace('post_counters_item', 'post_meta_item post_counters_item', trx_addons_get_post_counters($counters))
					: '';
	}
}

// Return list with animation effects
if (!function_exists('lymcoin_get_list_animations_in')) {
	function lymcoin_get_list_animations_in() {
		return function_exists('trx_addons_get_list_animations_in') 
					? trx_addons_get_list_animations_in()
					: array();
	}
}

// Return classes list for the specified animation
if (!function_exists('lymcoin_get_animation_classes')) {
	function lymcoin_get_animation_classes($animation, $speed='normal', $loop='none') {
		return function_exists('trx_addons_get_animation_classes') 
					? trx_addons_get_animation_classes($animation, $speed, $loop)
					: '';
	}
}

// Return string with the likes counter for the specified comment
if (!function_exists('lymcoin_get_comment_counters')) {
	function lymcoin_get_comment_counters($counters = 'likes') {
		return function_exists('trx_addons_get_comment_counters') 
					? trx_addons_get_comment_counters($counters)
					: '';
	}
}

// Display likes counter for the specified comment
if (!function_exists('lymcoin_show_comment_counters')) {
	function lymcoin_show_comment_counters($counters = 'likes') {
		if (function_exists('trx_addons_get_comment_counters'))
			trx_addons_get_comment_counters($counters, true);
	}
}

// Add query params to sort posts by views or likes
if (!function_exists('lymcoin_trx_addons_query_sort_order')) {
	
	function lymcoin_trx_addons_query_sort_order($q=array(), $orderby='date', $order='desc') {
		if ($orderby == 'views') {
			$q['orderby'] = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_views_count';
		} else if ($orderby == 'likes') {
			$q['orderby'] = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_likes_count';
		}
		return $q;
	}
}

// Return theme-specific logo to the plugin
if ( !function_exists( 'lymcoin_trx_addons_theme_logo' ) ) {
	
	function lymcoin_trx_addons_theme_logo($logo) {
		return lymcoin_get_logo_image();
	}
}

// Return true, if theme allow use site name as logo
if ( !function_exists( 'lymcoin_trx_addons_show_site_name_as_logo' ) ) {
	
	function lymcoin_trx_addons_show_site_name_as_logo($allow=true) {
		return $allow && lymcoin_is_on(lymcoin_get_theme_option('logo_text'));
	}
}

// Return theme-specific post meta to the plugin
if ( !function_exists( 'lymcoin_trx_addons_post_meta' ) ) {
	
	function lymcoin_trx_addons_post_meta($meta, $args=array()) {
		return lymcoin_show_post_meta(apply_filters('lymcoin_filter_post_meta_args', $args, 'trx_addons', 1));
	}
}

// Return theme-specific post meta args
if ( !function_exists( 'lymcoin_trx_addons_post_meta_args' ) ) {
	
	function lymcoin_trx_addons_post_meta_args($args=array(), $from='', $columns=1) {
		if (is_single() && $from=='trx_addons') {
			$args['components'] = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('meta_parts'));
			$args['counters'] = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('counters'));
			$args['seo'] = lymcoin_is_on(lymcoin_get_theme_option('seo_snippets'));
		}
		return $args;
	}
}

// Check if featured image override is allowed
if ( !function_exists( 'lymcoin_trx_addons_featured_image_override' ) ) {
	
	function lymcoin_trx_addons_featured_image_override($flag=false) {
		if ($flag) {
			$flag = lymcoin_is_on(lymcoin_get_theme_option('header_image_override')) 
					&& apply_filters('lymcoin_filter_allow_override_header_image', true);
		}
		return $flag;
	}
}

// Return featured image for current mode (post/page/category/blog template ...)
if ( !function_exists( 'lymcoin_trx_addons_get_current_mode_image' ) ) {
	
	function lymcoin_trx_addons_get_current_mode_image($img='') {
		return lymcoin_get_current_mode_image($img);
	}
}

// Return featured image size for related posts
if ( !function_exists( 'lymcoin_trx_addons_related_thumb_size' ) ) {
	
	function lymcoin_trx_addons_related_thumb_size($size='') {
		if (defined('TRX_ADDONS_CPT_CERTIFICATES_PT') && get_post_type() == TRX_ADDONS_CPT_CERTIFICATES_PT)
			$size = lymcoin_get_thumb_size( 'masonry-big' );
		return $size;
	}
}
	
// Redirect action 'get_mobile_menu' to the plugin
// Return stored items as mobile menu
if ( !function_exists( 'lymcoin_trx_addons_get_mobile_menu' ) ) {
	
	function lymcoin_trx_addons_get_mobile_menu($menu) {
		return apply_filters('trx_addons_filter_get_mobile_menu', $menu);
	}
}

// Redirect action 'login' to the plugin
if (!function_exists('lymcoin_trx_addons_action_login')) {
	
	function lymcoin_trx_addons_action_login($args=array()) {
		do_action( 'trx_addons_action_login', $args );
	}
}

// Redirect action 'cart' to the plugin
if (!function_exists('lymcoin_trx_addons_action_cart')) {
	
	function lymcoin_trx_addons_action_cart($args=array()) {
		do_action( 'trx_addons_action_cart', $args );
	}
}

// Redirect action 'search' to the plugin
if (!function_exists('lymcoin_trx_addons_action_search')) {
	
	function lymcoin_trx_addons_action_search($style, $class, $ajax) {
		if (lymcoin_exists_trx_addons())
			do_action( 'trx_addons_action_search', $style, $class, $ajax );
		else {
			set_query_var('lymcoin_search_args', compact('style', 'class', 'ajax'));
			get_template_part('templates/search-form');
			set_query_var('lymcoin_search_args', array());
		}
	}
}

// Redirect action 'breadcrumbs' to the plugin
if (!function_exists('lymcoin_trx_addons_action_breadcrumbs')) {
	
	function lymcoin_trx_addons_action_breadcrumbs() {
		do_action( 'trx_addons_action_breadcrumbs' );
	}
}

// Redirect action 'show_layout' to the plugin
if (!function_exists('lymcoin_trx_addons_action_show_layout')) {
	
	function lymcoin_trx_addons_action_show_layout($layout_id='') {
		do_action( 'trx_addons_action_show_layout', $layout_id );
	}
}

// Redirect filter 'get_translated_layout' to the plugin
if (!function_exists('lymcoin_trx_addons_filter_get_translated_layout')) {
	
	function lymcoin_trx_addons_filter_get_translated_layout($layout_id='') {
		return apply_filters( 'trx_addons_filter_get_translated_layout', $layout_id );
	}
}

// Show user meta (socials)
if (!function_exists('lymcoin_trx_addons_action_user_meta')) {
	
	function lymcoin_trx_addons_action_user_meta() {
		do_action( 'trx_addons_action_user_meta' );
	}
}

// Redirect filter 'get_blog_title' to the plugin
if ( !function_exists( 'lymcoin_trx_addons_get_blog_title' ) ) {
	
	function lymcoin_trx_addons_get_blog_title($title='') {
		return apply_filters('trx_addons_filter_get_blog_title', $title);
	}
}

// Return true, if theme need a SEO snippets
if (!function_exists('lymcoin_trx_addons_seo_snippets')) {
	
	function lymcoin_trx_addons_seo_snippets($enable=false) {
		return lymcoin_is_on(lymcoin_get_theme_option('seo_snippets'));
	}
}

// Show user meta (socials)
if (!function_exists('lymcoin_trx_addons_before_article')) {
	
	function lymcoin_trx_addons_before_article($page='') {
		if (lymcoin_is_on(lymcoin_get_theme_option('seo_snippets')))
			get_template_part('templates/seo');
	}
}

// Redirect filter 'prepare_css' to the plugin
if (!function_exists('lymcoin_trx_addons_prepare_css')) {
	
	function lymcoin_trx_addons_prepare_css($css='', $remove_spaces=true) {
		return apply_filters( 'trx_addons_filter_prepare_css', $css, $remove_spaces );
	}
}

// Redirect filter 'prepare_js' to the plugin
if (!function_exists('lymcoin_trx_addons_prepare_js')) {
	
	function lymcoin_trx_addons_prepare_js($js='', $remove_spaces=true) {
		return apply_filters( 'trx_addons_filter_prepare_js', $js, $remove_spaces );
	}
}

// Add plugin's specific variables to the scripts
if (!function_exists('lymcoin_trx_addons_localize_script')) {
	
	function lymcoin_trx_addons_localize_script($arr) {
		$arr['trx_addons_exists'] = lymcoin_exists_trx_addons();
		return $arr;
	}
}

// Add theme-specific options to the post's options
if (!function_exists('lymcoin_trx_addons_override_options')) {
    add_filter( 'trx_addons_filter_override_options', 'lymcoin_trx_addons_override_options');
    function lymcoin_trx_addons_override_options($options=array()) {
   	 return apply_filters('lymcoin_filter_override_options', $options);
    }
}



// Add plugin-specific colors and fonts to the custom CSS
if (lymcoin_exists_trx_addons()) { require_once LYMCOIN_THEME_DIR . 'plugins/trx_addons/trx_addons-styles.php'; }

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'lymcoin_trx_addons_privacy_text' ) ) {
    add_filter( 'trx_addons_filter_privacy_text', 'lymcoin_trx_addons_privacy_text' );
    function lymcoin_trx_addons_privacy_text( $text='' ) {
        return lymcoin_get_privacy_text();
    }
}
?>