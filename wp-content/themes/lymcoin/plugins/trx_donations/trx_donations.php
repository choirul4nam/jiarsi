<?php
/* ThemeREX Donations support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('lymcoin_trx_donations_theme_setup1')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_donations_theme_setup1', 1 );
	function lymcoin_trx_donations_theme_setup1() {
		add_filter( 'lymcoin_filter_list_posts_types',	'lymcoin_trx_donations_list_post_types');
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('lymcoin_trx_donations_theme_setup3')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_donations_theme_setup3', 3 );
	function lymcoin_trx_donations_theme_setup3() {
		if (lymcoin_exists_trx_donations()) {
		
			// Section 'Donations'
			lymcoin_storage_merge_array('options', '', array_merge(
				array(
					'donations' => array(
						"title" => esc_html__('Donations', 'lymcoin'),
						"desc" => wp_kses_data( __('Select parameters to display the donations pages', 'lymcoin') ),
						"type" => "section"
						)
				),
				lymcoin_options_get_list_cpt_options('donations')
			));
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('lymcoin_trx_donations_theme_setup9')) {
	add_action( 'after_setup_theme', 'lymcoin_trx_donations_theme_setup9', 9 );
	function lymcoin_trx_donations_theme_setup9() {
		
		add_filter( 'lymcoin_filter_merge_styles',							'lymcoin_trx_donations_merge_styles' );

		if (lymcoin_exists_trx_donations()) {
			add_filter( 'lymcoin_filter_get_post_info',		 				'lymcoin_trx_donations_get_post_info');
			add_filter( 'lymcoin_filter_post_type_taxonomy',				'lymcoin_trx_donations_post_type_taxonomy', 10, 2 );
			if (!is_admin()) {
				add_filter( 'lymcoin_filter_detect_blog_mode',				'lymcoin_trx_donations_detect_blog_mode' );
				add_filter( 'lymcoin_filter_get_post_categories', 			'lymcoin_trx_donations_get_post_categories');
				add_action( 'lymcoin_action_before_post_meta',				'lymcoin_trx_donations_action_before_post_meta');
			}
		}
		if (is_admin()) {
			add_filter( 'lymcoin_filter_tgmpa_required_plugins',			'lymcoin_trx_donations_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_trx_donations_tgmpa_required_plugins' ) ) {
	
	function lymcoin_trx_donations_tgmpa_required_plugins($list=array()) {
		if (lymcoin_storage_isset('required_plugins', 'trx_donations')) {
			$path = lymcoin_get_file_dir('plugins/trx_donations/trx_donations.zip');
			if (!empty($path) || lymcoin_get_theme_setting('tgmpa_upload')) {
				$list[] = array(
					'name' 		=> lymcoin_storage_get_array('required_plugins', 'trx_donations'),
					'slug' 		=> 'trx_donations',
					'version'	=> '1.7',
					'source'	=> !empty($path) ? $path : 'upload://trx_donations.zip',
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}



// Check if trx_donations installed and activated
if ( !function_exists( 'lymcoin_exists_trx_donations' ) ) {
	function lymcoin_exists_trx_donations() {
		return class_exists('TRX_DONATIONS');
	}
}

// Return true, if current page is any trx_donations page
if ( !function_exists( 'lymcoin_is_trx_donations_page' ) ) {
	function lymcoin_is_trx_donations_page() {
		$rez = false;
		if (lymcoin_exists_trx_donations()) {
			$rez = (is_single() && get_query_var('post_type') == TRX_DONATIONS::POST_TYPE) 
					|| is_post_type_archive(TRX_DONATIONS::POST_TYPE) 
					|| is_tax(TRX_DONATIONS::TAXONOMY);
		}
		return $rez;
	}
}

// Detect current blog mode
if ( !function_exists( 'lymcoin_trx_donations_detect_blog_mode' ) ) {
	
	function lymcoin_trx_donations_detect_blog_mode($mode='') {
		if (lymcoin_is_trx_donations_page())
			$mode = 'donations';
		return $mode;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'lymcoin_trx_donations_post_type_taxonomy' ) ) {
	
	function lymcoin_trx_donations_post_type_taxonomy($tax='', $post_type='') {
		if (lymcoin_exists_trx_donations() && $post_type == TRX_DONATIONS::POST_TYPE)
			$tax = TRX_DONATIONS::TAXONOMY;
		return $tax;
	}
}

// Show categories of the current product
if ( !function_exists( 'lymcoin_trx_donations_get_post_categories' ) ) {
	
	function lymcoin_trx_donations_get_post_categories($cats='') {
		if ( lymcoin_exists_trx_donations() && get_post_type()==TRX_DONATIONS::POST_TYPE ) {
			$cats = lymcoin_get_post_terms(', ', get_the_ID(), TRX_DONATIONS::TAXONOMY);
		}
		return $cats;
	}
}

// Add 'donation' to the list of the supported post-types
if ( !function_exists( 'lymcoin_trx_donations_list_post_types' ) ) {
	
	function lymcoin_trx_donations_list_post_types($list=array()) {
		if (lymcoin_exists_trx_donations())
			$list[TRX_DONATIONS::POST_TYPE] = esc_html__('Donations', 'lymcoin');
		return $list;
	}
}

// Show price of the current product in the widgets and search results
if ( !function_exists( 'lymcoin_trx_donations_get_post_info' ) ) {
	
	function lymcoin_trx_donations_get_post_info($post_info='') {
		if (lymcoin_exists_trx_donations()) {
			if (get_post_type()==TRX_DONATIONS::POST_TYPE) {
				// Goal and raised
				$goal = get_post_meta( get_the_ID(), 'trx_donations_goal', true );
				if (!empty($goal)) {
					$raised = get_post_meta( get_the_ID(), 'trx_donations_raised', true );
					if (empty($raised)) $raised = 0;
					$manual = get_post_meta( get_the_ID(), 'trx_donations_manual', true );
					$plugin = TRX_DONATIONS::get_instance();
					$post_info .= '<div class="post_info post_meta post_donation_info">'
										. '<span class="post_info_item post_meta_item post_donation_item post_donation_goal">'
											. '<span class="post_info_label post_meta_label post_donation_label">' . esc_html__('Group goal:', 'lymcoin') . '</span>'
											. ' ' 
											. '<span class="post_info_number post_meta_number post_donation_number">' . trim($plugin->get_money($goal)) . '</span>'
										. '</span>'
										. '<span class="post_info_item post_meta_item post_donation_item post_donation_raised">'
											. '<span class="post_info_label post_meta_label post_donation_label">' . esc_html__('Raised:', 'lymcoin') . '</span>'
											. ' '
											. '<span class="post_info_number post_meta_number post_donation_number">' . trim($plugin->get_money($raised+$manual)) . ' (' . round(($raised+$manual)*100/$goal, 2) . '%)' . '</span>'
										. '</span>'
									. '</div>';
				}
			}
		}
		return $post_info;
	}
}

// Show price of the current product in the search results streampage
if ( !function_exists( 'lymcoin_trx_donations_action_before_post_meta' ) ) {
	
	function lymcoin_trx_donations_action_before_post_meta() {
		if (!is_single() && get_post_type()==TRX_DONATIONS::POST_TYPE) {
			lymcoin_show_layout(lymcoin_trx_donations_get_post_info());
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'lymcoin_trx_donations_merge_styles' ) ) {
	
	function lymcoin_trx_donations_merge_styles($list) {
		if (lymcoin_exists_trx_donations()) {
			$list[] = 'plugins/trx_donations/_trx_donations.scss';
		}
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (lymcoin_exists_trx_donations()) { require_once LYMCOIN_THEME_DIR . 'plugins/trx_donations/trx_donations-styles.php'; }

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'lymcoin_trx_donations_privacy_text' ) ) {
    
    function lymcoin_trx_donations_privacy_text( $text='' ) {
        return lymcoin_get_privacy_text();
    }
}
?>