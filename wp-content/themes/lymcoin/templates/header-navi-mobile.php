<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr(lymcoin_get_theme_option('menu_mobile_fullscreen') > 0 ? 'fullscreen' : 'narrow'); ?>">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a><?php

		// Logo
		set_query_var('lymcoin_logo_args', array('type' => 'mobile'));
		get_template_part( 'templates/header-logo' );
		set_query_var('lymcoin_logo_args', array());

		// Mobile menu
		$lymcoin_menu_mobile = lymcoin_get_nav_menu('menu_mobile');
		if (empty($lymcoin_menu_mobile)) {
			$lymcoin_menu_mobile = apply_filters('lymcoin_filter_get_mobile_menu', '');
			if (empty($lymcoin_menu_mobile)) $lymcoin_menu_mobile = lymcoin_get_nav_menu('menu_main');
			if (empty($lymcoin_menu_mobile)) $lymcoin_menu_mobile = lymcoin_get_nav_menu();
		}
		if (!empty($lymcoin_menu_mobile)) {
			if (!empty($lymcoin_menu_mobile))
				$lymcoin_menu_mobile = str_replace(
					array('menu_main', 'id="menu-', 'sc_layouts_menu_nav', 'sc_layouts_hide_on_mobile', 'hide_on_mobile'),
					array('menu_mobile', 'id="menu_mobile-', '', '', ''),
					$lymcoin_menu_mobile
					);
			if (strpos($lymcoin_menu_mobile, '<nav ')===false)
				$lymcoin_menu_mobile = sprintf('<nav class="menu_mobile_nav_area">%s</nav>', $lymcoin_menu_mobile);
			lymcoin_show_layout(apply_filters('lymcoin_filter_menu_mobile_layout', $lymcoin_menu_mobile));
		}

		// Search field
		do_action('lymcoin_action_search', 'normal', 'search_mobile', false);
		
		// Social icons
		lymcoin_show_layout(lymcoin_get_socials_links(), '<div class="socials_mobile">', '</div>');
		?>
	</div>
</div>
