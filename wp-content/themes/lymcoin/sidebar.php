<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

if (lymcoin_sidebar_present()) {
	ob_start();
	$lymcoin_sidebar_name = lymcoin_get_theme_option('sidebar_widgets');
	lymcoin_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($lymcoin_sidebar_name) ) {
		dynamic_sidebar($lymcoin_sidebar_name);
	}
	$lymcoin_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($lymcoin_out)) {
		$lymcoin_sidebar_position = lymcoin_get_theme_option('sidebar_position');
		?>
		<div class="sidebar <?php echo esc_attr($lymcoin_sidebar_position); ?> widget_area<?php if (!lymcoin_is_inherit(lymcoin_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(lymcoin_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'lymcoin_action_before_sidebar' );
				lymcoin_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $lymcoin_out));
				do_action( 'lymcoin_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>