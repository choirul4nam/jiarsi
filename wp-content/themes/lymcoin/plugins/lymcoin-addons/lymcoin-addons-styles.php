<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('lymcoin_addons_get_css')) {
	add_filter('lymcoin_filter_get_css', 'lymcoin_addons_get_css', 10, 4);
	function lymcoin_addons_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;

			$rad = lymcoin_get_border_radius();
			$rad4 = ' '.$rad != ' 0' ? '4px' : 0;
			$rad50 = ' '.$rad != ' 0' ? '50%' : 0;
			$css['fonts'] .= <<<CSS


CSS;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS


CSS;
		}

		return $css;
	}
}
?>