<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('lymcoin_mailchimp_get_css')) {
	add_filter('lymcoin_filter_get_css', 'lymcoin_mailchimp_get_css', 10, 4);
	function lymcoin_mailchimp_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
form.mc4wp-form .mc4wp-form-fields input[type="email"] {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}
form.mc4wp-form .mc4wp-form-fields input[type="submit"] {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

CSS;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

form.mc4wp-form .mc4wp-alert {
	background-color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
	color: {$colors['inverse_text']};
}
form.mc4wp-form .mc4wp-alert a{
	color: {$colors['inverse_text']};
}
form.mc4wp-form .mc4wp-alert a:hover{
	color: {$colors['text_link']};
}

CSS;
		}

		return $css;
	}
}
?>