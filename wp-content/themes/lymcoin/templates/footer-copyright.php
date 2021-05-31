<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap<?php
				if (!lymcoin_is_inherit(lymcoin_get_theme_option('copyright_scheme')))
					echo ' scheme_' . esc_attr(lymcoin_get_theme_option('copyright_scheme'));
 				?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				$lymcoin_copyright = lymcoin_get_theme_option('copyright');
				if (!empty($lymcoin_copyright)) {
					// Replace {{Y}} or {Y} with the current year
					$lymcoin_copyright = str_replace(array('{{Y}}', '{Y}'), date('Y'), $lymcoin_copyright);
					// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
					$lymcoin_copyright = lymcoin_prepare_macros($lymcoin_copyright);
					// Display copyright
					echo wp_kses_data(nl2br($lymcoin_copyright));
				}
			?></div>
		</div>
	</div>
</div>
