<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */


// Socials
if ( lymcoin_is_on(lymcoin_get_theme_option('socials_in_footer')) && ($lymcoin_output = lymcoin_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php lymcoin_show_layout($lymcoin_output); ?>
		</div>
	</div>
	<?php
}
?>