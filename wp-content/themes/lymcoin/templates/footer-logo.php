<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.10
 */

// Logo
if (lymcoin_is_on(lymcoin_get_theme_option('logo_in_footer'))) {
	$lymcoin_logo_image = '';
	if (lymcoin_is_on(lymcoin_get_theme_option('logo_retina_enabled')) && lymcoin_get_retina_multiplier() > 1)
		$lymcoin_logo_image = lymcoin_get_theme_option( 'logo_footer_retina' );
	if (empty($lymcoin_logo_image)) 
		$lymcoin_logo_image = lymcoin_get_theme_option( 'logo_footer' );
	$lymcoin_logo_text   = get_bloginfo( 'name' );
	if (!empty($lymcoin_logo_image) || !empty($lymcoin_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($lymcoin_logo_image)) {
					$lymcoin_attr = lymcoin_getimagesize($lymcoin_logo_image);
                    echo '<a href="'.esc_url(home_url('/')).'">'
                        . '<img src="'.esc_url($lymcoin_logo_image).'"'
                        . ' class="logo_footer_image"'
                        . ' alt="'.esc_attr__('Site logo', 'lymcoin').'"'
                        . (!empty($lymcoin_attr[3]) ? ' ' . wp_kses_data($lymcoin_attr[3]) : '')
                        .'>'
                        . '</a>' ;
				} else if (!empty($lymcoin_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($lymcoin_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>