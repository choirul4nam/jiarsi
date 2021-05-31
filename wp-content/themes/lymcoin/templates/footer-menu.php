<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */

// Footer menu
$lymcoin_menu_footer = lymcoin_get_nav_menu(array(
											'location' => 'menu_footer',
											'class' => 'sc_layouts_menu sc_layouts_menu_default'
											));
if (!empty($lymcoin_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php lymcoin_show_layout($lymcoin_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>