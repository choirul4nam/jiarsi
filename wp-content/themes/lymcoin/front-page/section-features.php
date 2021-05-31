<div class="front_page_section front_page_section_features<?php
			$lymcoin_scheme = lymcoin_get_theme_option('front_page_features_scheme');
			if (!lymcoin_is_inherit($lymcoin_scheme)) echo ' scheme_'.esc_attr($lymcoin_scheme);
			echo ' front_page_section_paddings_'.esc_attr(lymcoin_get_theme_option('front_page_features_paddings'));
		?>"<?php
		$lymcoin_css = '';
		$lymcoin_bg_image = lymcoin_get_theme_option('front_page_features_bg_image');
		if (!empty($lymcoin_bg_image)) 
			$lymcoin_css .= 'background-image: url('.esc_url(lymcoin_get_attachment_url($lymcoin_bg_image)).');';
		if (!empty($lymcoin_css))
			echo ' style="' . esc_attr($lymcoin_css) . '"';
?>><?php
	// Add anchor
	$lymcoin_anchor_icon = lymcoin_get_theme_option('front_page_features_anchor_icon');	
	$lymcoin_anchor_text = lymcoin_get_theme_option('front_page_features_anchor_text');	
	if ((!empty($lymcoin_anchor_icon) || !empty($lymcoin_anchor_text)) && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="front_page_section_features"'
										. (!empty($lymcoin_anchor_icon) ? ' icon="'.esc_attr($lymcoin_anchor_icon).'"' : '')
										. (!empty($lymcoin_anchor_text) ? ' title="'.esc_attr($lymcoin_anchor_text).'"' : '')
										. ']');
	}
	?>
	<div class="front_page_section_inner front_page_section_features_inner<?php
			if (lymcoin_get_theme_option('front_page_features_fullheight'))
				echo ' lymcoin-full-height sc_layouts_flex sc_layouts_columns_middle';
			?>"<?php
			$lymcoin_css = '';
			$lymcoin_bg_mask = lymcoin_get_theme_option('front_page_features_bg_mask');
			$lymcoin_bg_color = lymcoin_get_theme_option('front_page_features_bg_color');
			if (!empty($lymcoin_bg_color) && $lymcoin_bg_mask > 0)
				$lymcoin_css .= 'background-color: '.esc_attr($lymcoin_bg_mask==1
																	? $lymcoin_bg_color
																	: lymcoin_hex2rgba($lymcoin_bg_color, $lymcoin_bg_mask)
																).';';
			if (!empty($lymcoin_css))
				echo ' style="' . esc_attr($lymcoin_css) . '"';
	?>>
		<div class="front_page_section_content_wrap front_page_section_features_content_wrap content_wrap">
			<?php
			// Caption
			$lymcoin_caption = lymcoin_get_theme_option('front_page_features_caption');
			if (!empty($lymcoin_caption) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><h2 class="front_page_section_caption front_page_section_features_caption front_page_block_<?php echo !empty($lymcoin_caption) ? 'filled' : 'empty'; ?>"><?php echo wp_kses($lymcoin_caption, 'lymcoin_kses_content'); ?></h2><?php
			}
		
			// Description (text)
			$lymcoin_description = lymcoin_get_theme_option('front_page_features_description');
			if (!empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><div class="front_page_section_description front_page_section_features_description front_page_block_<?php echo !empty($lymcoin_description) ? 'filled' : 'empty'; ?>"><?php echo wp_kses(wpautop($lymcoin_description), 'lymcoin_kses_content'); ?></div><?php
			}
		
			// Content (widgets)
			?><div class="front_page_section_output front_page_section_features_output"><?php 
				if (is_active_sidebar('front_page_features_widgets')) {
					dynamic_sidebar( 'front_page_features_widgets' );
				} else if (current_user_can( 'edit_theme_options' )) {
					if (!lymcoin_exists_trx_addons())
						lymcoin_customizer_need_trx_addons_message();
					else
						lymcoin_customizer_need_widgets_message('front_page_features_caption', 'ThemeREX Addons - Services');
				}
			?></div>
		</div>
	</div>
</div>