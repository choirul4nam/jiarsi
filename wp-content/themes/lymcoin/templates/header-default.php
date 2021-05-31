<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_header_css = '';
$lymcoin_header_image = get_header_image();
$lymcoin_header_video = lymcoin_get_header_video();
if (!empty($lymcoin_header_image) && lymcoin_trx_addons_featured_image_override(is_singular() || lymcoin_storage_isset('blog_archive') || is_category())) {
	$lymcoin_header_image = lymcoin_get_current_mode_image($lymcoin_header_image);
}

?><header class="top_panel top_panel_default<?php
					echo !empty($lymcoin_header_image) || !empty($lymcoin_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($lymcoin_header_video!='') echo ' with_bg_video';
					if ($lymcoin_header_image!='') echo ' '.esc_attr(lymcoin_add_inline_css_class('background-image: url('.esc_url($lymcoin_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (lymcoin_is_on(lymcoin_get_theme_option('header_fullheight'))) echo ' header_fullheight lymcoin-full-height';
					if (!lymcoin_is_inherit(lymcoin_get_theme_option('header_scheme')))
						echo ' scheme_' . esc_attr(lymcoin_get_theme_option('header_scheme'));
					?>"><?php

	// Background video
	if (!empty($lymcoin_header_video)) {
		get_template_part( 'templates/header-video' );
	}
	
	// Main menu
	if (lymcoin_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Mobile header
	if (lymcoin_is_on(lymcoin_get_theme_option("header_mobile_enabled"))) {
		get_template_part( 'templates/header-mobile' );
	}
	
	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( 'templates/header-single' );

?></header>