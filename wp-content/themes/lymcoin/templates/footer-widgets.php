<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */

// Footer sidebar
$lymcoin_footer_name = lymcoin_get_theme_option('footer_widgets');
$lymcoin_footer_present = !lymcoin_is_off($lymcoin_footer_name) && is_active_sidebar($lymcoin_footer_name);
if ($lymcoin_footer_present) { 
	lymcoin_storage_set('current_sidebar', 'footer');
	$lymcoin_footer_wide = lymcoin_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($lymcoin_footer_name) ) {
		dynamic_sidebar($lymcoin_footer_name);
	}
	$lymcoin_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($lymcoin_out)) {
		$lymcoin_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $lymcoin_out);
		$lymcoin_need_columns = true;
		if ($lymcoin_need_columns) {
			$lymcoin_columns = max(0, (int) lymcoin_get_theme_option('footer_columns'));
			if ($lymcoin_columns == 0) $lymcoin_columns = min(4, max(1, substr_count($lymcoin_out, '<aside ')));
			if ($lymcoin_columns > 1)
				$lymcoin_out = preg_replace("/<aside([^>]*)class=\"widget/", "<aside$1class=\"column-1_".esc_attr($lymcoin_columns).' widget', $lymcoin_out);
			else
				$lymcoin_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($lymcoin_footer_wide) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$lymcoin_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($lymcoin_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'lymcoin_action_before_sidebar' );
				lymcoin_show_layout($lymcoin_out);
				do_action( 'lymcoin_action_after_sidebar' );
				if ($lymcoin_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$lymcoin_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>