<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_args = get_query_var('lymcoin_logo_args');

// Site logo
$lymcoin_logo_type   = isset($lymcoin_args['type']) ? $lymcoin_args['type'] : '';
$lymcoin_logo_image  = lymcoin_get_logo_image($lymcoin_logo_type);
$lymcoin_logo_text   = lymcoin_is_on(lymcoin_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$lymcoin_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($lymcoin_logo_image) || !empty($lymcoin_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url(home_url('/')); ?>"><?php
		if (!empty($lymcoin_logo_image)) {
			if (empty($lymcoin_logo_type) && function_exists('the_custom_logo') && (int) $lymcoin_logo_image > 0) {
				the_custom_logo();
			} else {
				$lymcoin_attr = lymcoin_getimagesize($lymcoin_logo_image);
				echo '<img src="'.esc_url($lymcoin_logo_image).'" alt="'.esc_attr($lymcoin_logo_text).'"'.(!empty($lymcoin_attr[3]) ? ' '.wp_kses_data($lymcoin_attr[3]) : '').'>';
			}
		} else {
			lymcoin_show_layout(lymcoin_prepare_macros($lymcoin_logo_text), '<span class="logo_text">', '</span>');
			lymcoin_show_layout(lymcoin_prepare_macros($lymcoin_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>