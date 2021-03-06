<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( !function_exists( 'lymcoin_trx_donations_get_css' ) ) {
	add_filter( 'lymcoin_filter_get_css', 'lymcoin_trx_donations_get_css', 10, 4 );
	function lymcoin_trx_donations_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
.sc_donations_info .sc_donations_supporters_item_amount_value,
.sc_donations_info .sc_donations_supporters_item_name {
	{$fonts['h5_font-family']}
}
CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS
.sc_donations_info .sc_donations_data_number {
	color: {$colors['text_dark']};
}
.sc_donations_info .sc_donations_supporters_item_amount_inner,
.sc_donations_info .sc_donations_supporters_item_info_inner {
	background-color: {$colors['alter_bg_color']};
}
.sc_donations_info .sc_donations_supporters_item:hover .sc_donations_supporters_item_amount_inner,
.sc_donations_info .sc_donations_supporters_item:hover .sc_donations_supporters_item_info_inner {
	background-color: {$colors['alter_bg_hover']};
}
.sc_donations_info .sc_donations_supporters_item_amount_value {
	color: {$colors['alter_link']};
}
.sc_donations_info .sc_donations_supporters_item_name {
	color: {$colors['alter_dark']};
}
.sc_donations_info .sc_donations_supporters_item_amount_date,
.sc_donations_info .sc_donations_supporters_item_message {
	color: {$colors['alter_text']};
}

.post_type_donation.post_item_single .post_footer,
.single-donation .nav-links .nav-previous a,
.single-donation .nav-links .nav-next a {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	color: {$colors['text']};
}
.post_type_donation.post_item_single .post_footer a {
	color: {$colors['alter_link']};
}
.post_type_donation.post_item_single .post_footer a:hover {
	color: {$colors['alter_hover']};
}
.single-donation .nav-links .nav-previous a:hover,
.single-donation .nav-links .nav-next a:hover {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	color: {$colors['text']};
}
.single-donation .nav-links .nav-previous .post-title,
.single-donation .nav-links .nav-next .post-title {
	color: {$colors['text_dark']};
}
.single-donation .nav-links .nav-previous:hover .post-title,
.single-donation .nav-links .nav-next:hover .post-title {
	color: {$colors['text_link']};
}
CSS;
		}
		
		return $css;
	}
}
?>