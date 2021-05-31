<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */

$lymcoin_footer_id = str_replace('footer-custom-', '', lymcoin_get_theme_option("footer_style"));
if ((int) $lymcoin_footer_id == 0) {
	$lymcoin_footer_id = lymcoin_get_post_id(array(
												'name' => $lymcoin_footer_id,
												'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
												)
											);
} else {
	$lymcoin_footer_id = apply_filters('lymcoin_filter_get_translated_layout', $lymcoin_footer_id);
}
$lymcoin_footer_meta = get_post_meta($lymcoin_footer_id, 'trx_addons_options', true);
if (!empty($lymcoin_footer_meta['margin']) != '') 
	lymcoin_add_inline_css(sprintf('.page_content_wrap{padding-bottom:%s}', esc_attr(lymcoin_prepare_css_value($lymcoin_footer_meta['margin']))));
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($lymcoin_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($lymcoin_footer_id))); 
						if (!lymcoin_is_inherit(lymcoin_get_theme_option('footer_scheme')))
							echo ' scheme_' . esc_attr(lymcoin_get_theme_option('footer_scheme'));
						?>">
	<?php
    // Custom footer's layout
    do_action('lymcoin_action_show_layout', $lymcoin_footer_id);
	?>
</footer><!-- /.footer_wrap -->
