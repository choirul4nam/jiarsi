<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.06
 */

$lymcoin_header_id = str_replace('header-custom-', '', lymcoin_get_theme_option("header_style"));
if ((int) $lymcoin_header_id == 0) {
    $lymcoin_header_id = lymcoin_get_post_id(array(
            'name' => $lymcoin_header_id,
            'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
        )
    );
} else {
    $lymcoin_header_id = apply_filters('lymcoin_filter_get_translated_layout', $lymcoin_header_id);
}

$lymcoin_header_css = '';
$lymcoin_header_image = get_header_image();
$lymcoin_header_video = lymcoin_get_header_video();
if (false === $lymcoin_header_image)
    $lymcoin_header_image = get_the_post_thumbnail_url($lymcoin_header_id, 'full');
if (!empty($lymcoin_header_image) && lymcoin_trx_addons_featured_image_override(is_singular() || lymcoin_storage_isset('blog_archive') || is_category())) {
	$lymcoin_header_image = lymcoin_get_current_mode_image($lymcoin_header_image);
}

$lymcoin_header_meta = get_post_meta($lymcoin_header_id, 'trx_addons_options', true);
if (!empty($lymcoin_header_meta['margin']) != '') 
	lymcoin_add_inline_css(sprintf('.page_content_wrap{padding-top:%s}', esc_attr(lymcoin_prepare_css_value($lymcoin_header_meta['margin']))));

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($lymcoin_header_id); 
				?> top_panel_custom_<?php echo esc_attr(sanitize_title(get_the_title($lymcoin_header_id)));
				echo !empty($lymcoin_header_image) || !empty($lymcoin_header_video) 
					? ' with_bg_image' 
					: ' without_bg_image';
				if ($lymcoin_header_video!='') 
					echo ' with_bg_video';
				if ($lymcoin_header_image!='') 
					echo ' '.esc_attr(lymcoin_add_inline_css_class('background-image: url('.esc_url($lymcoin_header_image).');'));
				if (is_single() && has_post_thumbnail()) 
					echo ' with_featured_image';
				if (lymcoin_is_on(lymcoin_get_theme_option('header_fullheight'))) 
					echo ' header_fullheight lymcoin-full-height';
				if (!lymcoin_is_inherit(lymcoin_get_theme_option('header_scheme')))
					echo ' scheme_' . esc_attr(lymcoin_get_theme_option('header_scheme'));
				?>"><?php

	// Background video
	if (!empty($lymcoin_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('lymcoin_action_show_layout', $lymcoin_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );
		
?></header>