<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

// Header sidebar
$lymcoin_header_name = lymcoin_get_theme_option('header_widgets');
$lymcoin_header_present = !lymcoin_is_off($lymcoin_header_name) && is_active_sidebar($lymcoin_header_name);
if ($lymcoin_header_present) { 
	lymcoin_storage_set('current_sidebar', 'header');
	$lymcoin_header_wide = lymcoin_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($lymcoin_header_name) ) {
		dynamic_sidebar($lymcoin_header_name);
	}
	$lymcoin_widgets_output = ob_get_contents();
	ob_end_clean();
	if (!empty($lymcoin_widgets_output)) {
		$lymcoin_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $lymcoin_widgets_output);
		$lymcoin_need_columns = strpos($lymcoin_widgets_output, 'columns_wrap')===false;
		if ($lymcoin_need_columns) {
			$lymcoin_columns = max(0, (int) lymcoin_get_theme_option('header_columns'));
			if ($lymcoin_columns == 0) $lymcoin_columns = min(6, max(1, substr_count($lymcoin_widgets_output, '<aside ')));
			if ($lymcoin_columns > 1)
				$lymcoin_widgets_output = preg_replace("/<aside([^>]*)class=\"widget/", "<aside$1class=\"column-1_".esc_attr($lymcoin_columns).' widget', $lymcoin_widgets_output);
			else
				$lymcoin_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($lymcoin_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$lymcoin_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($lymcoin_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'lymcoin_action_before_sidebar' );
				lymcoin_show_layout($lymcoin_widgets_output);
				do_action( 'lymcoin_action_after_sidebar' );
				if ($lymcoin_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$lymcoin_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>